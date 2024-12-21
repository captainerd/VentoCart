<div class="list-group mb-3">
  <?php
    $groupedTopics = [];

    if ($hide_date) {
      // If $hide_date is true, don't group, just list the results
      $groupedarticles[''] = $articles;
    } else {
      // Group topics by date
      foreach ($articles as $article) {
        $groupedarticles[$article['date']][] = $article;
      }
    }

    foreach ($groupedarticles as $monthYear => $monthArticles):
  ?>
    <div class="list-group mb-3">
      <?php if (!$hide_date): ?>
        <div class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex justify-content-between align-items-center">
            <span><?= $monthYear ?></span>
            <i class="fas fa-calendar"></i>
          </div>
        </div>
      <?php endif; ?>

      <?php foreach ($monthArticles as $article): ?>
        <a href="<?= $article['href'] ?>" class="list-group-item list-group-item-action<?= $article['article_id'] == $article_id ? ' active' : '' ?>">
          <div class="d-flex justify-content-between align-items-center">
            <span><?= $article['name'] ?></span>
            <i class="fas fa-chevron-right"></i>
          </div>
        </a>
      <?php endforeach; ?>

    </div>
  <?php endforeach; ?>
</div>



<div class="list-group mb-3">
  <a href="" class="list-group-item list-group-item-action">
    <div class="d-flex justify-content-between align-items-center">
      <span><i class="fa fa-folder"></i> <?= $heading_title ?></span>
      <i class="fa fa-chevron-down"></i>
    </div>
  </a>

  <div class="list-group mb-3">
    <?php foreach ($topics as $topic): ?>
      <a href="<?= $topic['href'] ?>" class="list-group-item list-group-item-action<?= $topic['topic_id'] == $topic_id ? ' active' : '' ?>">
        <div class="d-flex justify-content-between align-items-center">
          <span><?= $topic['name'] ?></span>
          <i class="fas fa-chevron-right"></i>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>
