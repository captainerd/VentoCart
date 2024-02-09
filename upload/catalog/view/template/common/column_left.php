<?php if ($modules): ?>
<aside id="column-left" class="col-3   d-md-block">
  <div class="sidemenu ">
<button class="navbar-toggler  close-sidemenu side-closed" type="button" ><i class="fa-solid fa-bars"></i></button>
</div>
  <div class="column-left">
  <?php foreach ($modules as $module): ?>
  <?=  $module   ?>
  <?php endforeach; ?>
  </div>
</aside>
<?php endif; ?>
 

<script>
$(document).ready(function() {
    $(".close-sidemenu").click(function() {
 
        $(".close-sidemenu").blur(); 
        if (document.getElementById("column-left").style.width === "0px" || document.getElementById("column-left").style.width === "") {
            document.getElementById("column-left").style.width = "350px";
        } else {
            document.getElementById("column-left").style.width = "0";
        }
        $(this).toggleClass('side-closed');
        $(this).find("i").toggleClass("fa-bars fa-close");
    });
});

</script>