<?php

namespace Helldar\Vk\Controllers\Ads;

use Helldar\Vk\Controllers\Controller;

/**
 * Returns a set of auto-suggestions for various targeting parameters.
 *
 * @see    https://vk.com/dev/ads.getSuggestions
 */
class GetSuggestionsController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['section', 'q', 'country', 'cities', 'lang'];
}
