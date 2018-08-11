<?php

namespace Helldar\Vk\Controllers;

use Carbon\Carbon;
use Helldar\Vk\Models\VkUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var string
     */
    protected $url_auth = 'https://oauth.vk.com/authorize';

    /**
     * @var string
     */
    protected $url_access_token = 'https://oauth.vk.com/access_token';

    /**
     * Authenticate user access.
     *
     * @return mixed
     */
    public function auth()
    {
        return redirect()->to(str_finish($this->url_auth, '?').http_build_query([
                'client_id' => env('VK_CLIENT_ID'),
                'redirect_uri' => route('vk::auth'),
                'display' => config('vk.display'),
                'response_type' => 'code',
                'scope' => implode(',', config('vk.scope', [])),
                'v' => config('vk.version', 5.63),
            ]));
    }

    /**
     * Get an access token.
     *
     * @param Request $request
     *
     * @return array|mixed
     */
    public function getAccessToken(Request $request)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $this->url_access_token, [
                'form_params' => [
                    'client_id' => env('VK_CLIENT_ID'),
                    'client_secret' => env('VK_CLIENT_SECRET'),
                    'secret_key' => env('VK_SECRET_KEY'),
                    'redirect_uri' => route('vk::auth'),
                    'code' => $request->code,
                ],
            ]);

            $data = collect(json_decode($response->getBody()));

            return $this->saveToken($data);
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     * Save access token into file.
     *
     * @param $data
     *
     * @return mixed
     */
    protected function saveToken($data)
    {
        $validator = \Validator::make($data->all(), [
            'access_token' => 'required|string|max:255',
            'expires_in' => 'numeric',
            'user_id' => 'numeric',
            'email' => 'email',
        ]);

        if ($validator->fails()) {
            return redirect()->to(config('vk.redirect_error', '/'));
        }

        $item = VkUser::withTrashed()->firstOrNew([
            'user_id' => $this->user->id,
            'vk_user_id' => $data->get('user_id'),
        ]);

        $item->access_token = $data->get('access_token');
        $item->content = json_encode($data->all());
        $item->expired_at = $data->get('expires_in') ? Carbon::now()->addSeconds($data->get('expires_in')) : Carbon::now()->addYears(10);
        $item->deleted_at = null;
        $item->save();

        return redirect()->to(config('vk.redirect_success', '/'));
    }
}
