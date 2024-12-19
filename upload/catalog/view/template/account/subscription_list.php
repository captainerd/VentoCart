 
      <?php if ($subscriptions): ?>
      
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <?php foreach ($subscriptions as $subscription): ?>
        <div class="col mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                   
                        <div class="col-12 p-1 border-bottom">
                            <a href="<?= $subscription['product'] ?>"><?= $this->e($subscription['product_name']) ?></a>
                    
                            <?= $this->e($subscription['description']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-1 border-bottom"><b><?= $this->e($column_status ) ?></b></div>
                        <div class="col-6  p-1 border-bottom"><?= $this->e($subscription['status']) ?></div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-1 border-bottom"><b><?= $this->e($column_date_added ) ?></b></div>
                        <div class="col-6 p-1 border-bottom"><?= $this->e($subscription['date_added']) ?></div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3 d-flex justify-content-end">
                            <a href="<?= $subscription['view'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_view ) ?>" class="btn mx-2 btn-info"><i class="fa-solid fa-folder-open"></i></a>
                            <?php if (!empty($subscription['cancel_subscription_link'])): ?>
                                <a href="<?= $subscription['cancel_subscription_link'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_cancel ) ?>" class="btn cancelSubscBtn mx-2 btn-danger"><i class="fa-solid fa-cancel"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($subscription['resume_subscription_link'])): ?>
                                <a href="<?= $subscription['resume_subscription_link'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_resume ) ?>" class="btn resumeSubbtn mx-2  btn-primary"><i class="fa-solid fa-refresh"></i></a>
                            <?php endif; ?>
                            <?php if (!empty($subscription['restart_unpaid_subscription'])): ?>
                                <a href="<?= $subscription['restart_unpaid_subscription'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_resume ) ?>" class="btn resumeSubbtn mx-2  btn-success"><i class="fa-solid fa-redo"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


        <div class="row mb-3">
          <div class="col-sm-6 text-start"><?=  $pagination   ?></div>
          <div class="col-sm-6 text-end"><?=  $results   ?></div>
        </div>
      <?php else: ?>
        <p><?= $this->e($text_no_results ) ?></p>
      <?php endif; ?>
      