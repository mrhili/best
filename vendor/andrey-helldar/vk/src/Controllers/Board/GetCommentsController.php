<?php

namespace Helldar\Vk\Controllers\Board;

use Helldar\Vk\Controllers\Controller;

/**
 * Returns a list of comments on a topic on a community's discussion board.
 *
 * @see    https://vk.com/dev/board.getComments
 */
class GetCommentsController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['group_id', 'topic_id', 'need_likes', 'start_comment_id', 'offset', 'count', 'extended', 'sort'];
}
