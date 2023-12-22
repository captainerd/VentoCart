 

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb): ?>
    <li class="breadcrumb-item"><a href="<?=  $breadcrumb['href']  ?>"><?=  $breadcrumb['text']  ?></a></li>
  <?php endforeach; ?>
</ol>
  </nav>

 