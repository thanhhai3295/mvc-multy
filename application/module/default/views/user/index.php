<?php 
  $linkHistory = URL::createLink('default','user','history');
?>
<div class="container">
  <div class="col-md-2">
    <div class="card mb-4 box-shadow">
    <a href="<?php echo $linkHistory ?>"><i class="fas fa-history img-thumbnail" style="font-size:150px"></i></a>
      <div class="card-body" style="margin-top:20px">
      <a href="<?php echo $linkHistory ?>"><h2 class="card-title text-center">History</h2></a>
      </div>
    </div>
  </div>
</div>