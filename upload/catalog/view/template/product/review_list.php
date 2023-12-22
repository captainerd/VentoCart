<?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $review): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <td style="width: 50%;"><strong><?= $this->e($review['author']) ?></strong></td>
                <td class="text-end"><?= $this->e($review['date_added']) ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p><?= $this->e($review['text']) ?></p>
                    <div class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($review['rating'] < $i): ?>
                                <span class="fa-stack"><i class="fa-regular fa-star fa-stack-1x"></i></span>
                            <?php else: ?>
                                <span class="fa-stack"><i class="fa-solid fa-star fa-stack-1x"></i><i class="fa-regular fa-star fa-stack-1x"></i></span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <div class="text-end"><?= $this->e($pagination) ?></div>
<?php else: ?>
    <p class="text-center"><?= $this->e($text_no_results) ?></p>
<?php endif; ?>
