<div class="card border  rounded">
  <div >
    <?php foreach ($topics as $topic): ?>
      <div class="p-3">
        <?php if (!isset($topic['preview'])): ?>
          <a class="list-group-item <?= $topic['topic_id'] == $topic_id ? ' active' : '' ?>" href="<?= $topic['href'] ?>">
            <?= $topic['name'] ?>
          </a>
        <?php else: ?>
          <div >
            <h3><?= $topic['name'] ?></h4>
            <p><?= $topic['preview'] ?></p>
            <a href="<?= $topic['href'] ?>"><?=$text_readmore?></a>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
