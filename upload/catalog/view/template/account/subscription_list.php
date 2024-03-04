 
      <?php if ($subscriptions): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
           
                <td class="text-start"><?= $this->e($column_product ) ?></td>
                <td class="text-start"><?= $this->e($column_status ) ?></td>
     
                <td class="text-start"><?= $this->e($column_date_added ) ?></td>
                <td class="text-end"></td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($subscriptions as $subscription): ?>
                <tr>
              
                  <td class="text-start"><a href="<?= $subscription['product'] ?>"><?= $this->e($subscription['product_name']) ?></a>
                    <br/>
                    <?= $this->e($subscription['description']) ?>
                  </td>
                  <td class="text-start"><?= $this->e($subscription['status']) ?></td>
          
                  <td class="text-start"><?= $this->e($subscription['date_added']) ?></td>
                  <td class="text-end">
                    <a href="<?= $subscription['view'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_view ) ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                    <?php if (!empty($subscription['cancel_subscription_link'])):?>
                  
                    <a href=" <?=  $subscription['cancel_subscription_link'] ?> " data-bs-toggle="tooltip" title="<?= $this->e($button_cancel ) ?>" class="btn cancelSubscBtn btn-danger"><i class="fa-solid fa-cancel"></i></a>
                      <?php endif;?>
                      <?php if (!empty($subscription['resume_subscription_link'])):?>
                  
                  <a href=" <?=  $subscription['resume_subscription_link'] ?> " data-bs-toggle="tooltip" title="<?= $this->e($button_resume ) ?>" class="btn resumeSubbtn btn-primary"><i class="fa-solid fa-refresh"></i></a>
                    <?php endif;?>

                    <?php if (!empty($subscription['restart_unpaid_subscription'])):?>
                  
                  <a href=" <?=  $subscription['restart_unpaid_subscription'] ?> " data-bs-toggle="tooltip" title="<?= $this->e($button_resume ) ?>" class="btn resumeSubbtn btn-success"><i class="fa-solid fa-redo"></i></a>
                    <?php endif;?>
                  
                  </td>
               
                  <img src="" alt="" srcset="">
               
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="row mb-3">
          <div class="col-sm-6 text-start"><?=  $pagination   ?></div>
          <div class="col-sm-6 text-end"><?=  $results   ?></div>
        </div>
      <?php else: ?>
        <p><?= $this->e($text_no_results ) ?></p>
      <?php endif; ?>
      