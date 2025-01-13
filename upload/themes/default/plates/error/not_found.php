<?=  $header   ?>
<div id="error-not-found" class="container">
  <ul class="breadcrumb">
 
  </ul>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <p><?=$text_error  ?></p>
      <div class="text-end"><a href="<?= $continue  ?>" class="btn btn-primary"><?=  $button_continue  ?></a></div>
      <?=  $content_bottom   ?></div>
    <?=  $column_right   ?></div>
</div>
<?= $footer  ?>
