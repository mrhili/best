<?php

namespace Helldar\Vk\Controllers\Account;

use Helldar\Vk\Controllers\Controller;

/**
 * Deletes user from the blacklist.
 *
 * @see     https://vk.com/dev/account.unbanUser
 */
class UnbanUserController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['user_id'];
}
