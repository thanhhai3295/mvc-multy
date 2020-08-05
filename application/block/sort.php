<?php 
  $new      = URL::createLink('default',$_GET['controller'],'list',['filter' => 'new']);
  $name     = URL::createLink('default',$_GET['controller'],'list',['filter' => 'name']);
  $ordering = URL::createLink('default',$_GET['controller'],'list',['filter' => 'ordering']);
?>
<select id="sort" onchange="location = this.value;">
  <option value="<?php echo $new ?>">New</option>
  <option value="<?php echo $name ?>">Name</option>
  <option value="<?php echo $ordering ?>">Ordering</option>
</select>