<?php

namespace Helldar\Vk\Controllers\Ads;

use Helldar\Vk\Controllers\Controller;

/**
 * Returns the size of targeting audience, and also recommended values for CPC and CPM.
 *
 * @see    https://vk.com/dev/ads.getTargetingStats
 */
class GetTargetingStatsController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['account_id', 'criteria', 'ad_id', 'ad_format', 'ad_platform', 'link_url', 'link_domain'];
}
