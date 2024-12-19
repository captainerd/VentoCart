<div class="sidebar">
    <ul class="nav nav-tabs nav-stacked">
        <?php foreach ($informations as $information): ?>
            <li><a href="<?=  $information['href']  ?>"><?=  $information['title']  ?></a></li>
        <?php endforeach; ?>
        <li><a href="<?=  $contact ?>"><?=  $text_contact  ?></a></li>
        <li><a href="<?=  $sitemap  ?>"><?=  $text_sitemap  ?></a></li>
    </ul>
</div>
