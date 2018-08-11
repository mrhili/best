<?php

namespace Helldar\Vk\Controllers\Ads;

use Helldar\Vk\Controllers\Controller;

/**
 * Creates advertising campaigns.
 * Please note! Allowed number of campaigns created in one request is 50.
 *
 * @see    https://vk.com/dev/ads.createCampaigns
 */
class CreateCampaignsController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['account_id', 'data'];
}
