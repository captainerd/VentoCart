<div class="list-group mb-3">
  <?php foreach ($topics as $topic): ?>
      <a href="<?= $topic['href'] ?>" class="list-group-item<?= $topic['topic_id'] == $topic_id ? ' active' : '' ?>"><?= $topic['name'] ?></a>
  <?php endforeach; ?>
</div>
