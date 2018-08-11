<?php

namespace Helldar\Vk\Controllers\Account;

use Helldar\Vk\Controllers\Controller;

/**
 * Marks the current user as online for 15 minutes.
 *
 * @see     https://vk.com/dev/account.setOnline
 */
class SetOnlineController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['voip'];
}
