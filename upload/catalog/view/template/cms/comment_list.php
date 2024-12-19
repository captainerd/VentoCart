<?php if ($comments): ?>
    <?php foreach ($comments as $comment): ?>
        <div id="comment-<?= $comment['blog_comment_id'] ?>" class="media">
            <div class="media-body">
                <p class="media-heading"><?= $comment['author'] ?> <span><?= $comment['date_added'] ?></span></p>
                <p><?= $comment['comment'] ?></p>
                <div class="reply">
                    <div class="reply-box">
                        <div>
                            <?php if ($comment['reply']): ?>
                                <?php foreach ($comment['reply'] as $reply): ?>
                                    <div class="media">
                                        <div class="media-left"><img src="<?= $reply['image'] ?>" alt="<?= $reply['member'] ?>" title="<?= $reply['member'] ?>" class="media-object"/></div>
                                        <div class="media-body">
                                            <?php if ($reply['remove']): ?>
                                                <div class="pull-right"><a href="<?= $reply['remove'] ?>" class="btn btn-link btn-xs reply-remove"><?= $text_remove ?></a></div>
                                            <?php endif; ?>
                                            <p class="media-heading"><?= $reply['member'] ?> <span><?= $reply['date_added'] ?></span></p>
                                            <p><?= $reply['comment'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php if ($comment['next']): ?>
                                    <div class="text-center"><a href="<?= $comment['next'] ?>" class="btn btn-block"><?= $text_more ?></a></div>
                                <?php endif; ?>
                            <?php endif; ?> 
                            <a href="<?= $comment['refresh'] ?>" class="reply-refresh hide"><?= $text_refresh ?></a>
                        </div>
                    </div>
                    <p class="text-right">
                        <?php if ($logged): ?>
                            <button type="button" data-toggle="tooltip" data-title="Reply" class="btn btn-link btn-sm"><?= $text_reply ?></button>
                        <?php else: ?>
                            <button type="button" class="btn btn-link btn-xs" disabled="disabled"><?= $text_reply ?></button>
                        <?php endif; ?>
                    </p>
                    <div class="reply-input-box" style="display: none;">
                        <div class="media">
                            <div class="media-left"><img src="<?= $comment_image ?>" alt="<?= $comment_username ?>" title="<?= $comment_username ?>" class="media-object"/></div>
                            <div class="media-body">
                                <div class="form-group">
                                    <label for="input-comment<?= $comment['blog_comment_id'] ?>">Leave your comment</label>
                                    <textarea name="comment" placeholder="<?= $text_write ?>" id="input-comment<?= $comment['blog_comment_id'] ?>" class="form-control"></textarea>
                                </div>
                                <div class="text-right"><a href="<?= $comment['add'] ?>" class="btn btn-primary btn-sm"><?= $text_write ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="text-end"><?= $pagination ?></div>
<?php else: ?>
    <p class="text-center"><?= $text_no_results ?></p>
<?php endif; ?>
