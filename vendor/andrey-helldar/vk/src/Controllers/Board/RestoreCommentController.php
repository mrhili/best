<?php

namespace Helldar\Vk\Controllers\Board;

use Helldar\Vk\Controllers\Controller;

/**
 * Restores a comment deleted from a topic on a community's discussion board.
 *
 * @see    https://vk.com/dev/board.restoreComment
 */
class RestoreCommentController extends Controller
{
    /**
     * Available method parameters.
     *
     * @var array
     */
    protected $parameters = ['group_id', 'topic_id', 'comment_id'];
}
