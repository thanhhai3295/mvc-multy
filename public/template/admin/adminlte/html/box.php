<?php 
   $data = [
      'group'    => ['bg' => 'bg-success', 'icon' => 'ion-stats-bars'],
      'user'     => ['bg' => 'bg-danger', 'icon' => 'ion-person-add'],
      'category' => ['bg' => 'bg-warning', 'icon' => 'ion-bag'],
      'book'     => ['bg' => 'bg-primary', 'icon' => 'ion-ios-book-outline'],
   ];
?>
<div class="row">
   <?php echo Helper::statistics($data,$this->countGroup,$this->arrParams) ?>
</div>
