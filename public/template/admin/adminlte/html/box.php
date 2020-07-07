<?php 
   $data = [
      'group'    => ['bg' => 'bg-success', 'icon' => 'fa-chart-bar'],
      'user'     => ['bg' => 'bg-danger', 'icon' => 'fa-user-plus'],
      'category' => ['bg' => 'bg-warning', 'icon' => 'fa-chart-pie'],
      'book'     => ['bg' => 'bg-primary', 'icon' => 'fa-book-medical'],
   ];
?>
<div class="row">
   <?php echo Helper::statistics($data,$this->countGroup,$this->arrParams) ?>
</div>
