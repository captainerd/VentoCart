
<div class="container">
<h3>Blog</h3>
<hr>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">

  <?php foreach ($articles as $article): ?>
    <div class="card mb-3 mx-2">
      <img   src="/index.php?route=product/product.getImage&width=200&height=0&image=<?= $article['image'] ?>" class="card-img-top" alt="<?= $article['name'] ?>">
      <div class="card-body d-flex flex-column">
        <?= $article['date']?>
 
        <h5 class="card-title"><?= $article['name'] ?></h5>
        <p class="card-text"><?= strip_tags($article['preview']) ?></p>
   
        <a href="<?= $article['href'] ?>" class="btn btn-primary mt-auto"><?= $text_readmore ?></a>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</div>
