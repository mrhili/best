<?php

namespace Helldar\Vk\Controllers\Account;

use Helldar\Vk\Controllers\Controller;

/**
 * Gets settings of the user in this application.
 *
 * @see     https://vk.com/dev/account.getAppPermissions
 */
class GetAppPermissionsController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['user_id'];
}
