<?php 
  $db = new Model();
  $sql = "SELECT name,picture FROM ".TBL_CATEGORY;
  $result = $db->rawQuery($sql);
  $randomArray = array_rand($result, 4);
  $xhtml = '';
  foreach ($randomArray as $key => $value) {
    $name    = $result[$value]['name'];
    $picture = Helper::createImage('category', '', $result[$value]['picture']);
    $xhtml .= '<div class="single-most-product bd mb-18">
                  <div class="most-product-img">
                    <a href="#">'.$picture.'</a>
                  </div>
                  <div class="most-product-content">
                  <h4><a href="#">'.$name.'</a></h4>
                  </div>
                </div>';
  }
  echo $xhtml;
?>
<!-- <div class="single-most-product bd mb-18">
  <div class="most-product-img">
    <a href="#"><img src="public/template/default/main/img/product/20.jpg" alt="book" /></a>
  </div>
  <div class="most-product-content">
    <div class="product-rating">
      <ul>
        <li><a href="#"><i class="fa fa-star"></i></a></li>
        <li><a href="#"><i class="fa fa-star"></i></a></li>
        <li><a href="#"><i class="fa fa-star"></i></a></li>
        <li><a href="#"><i class="fa fa-star"></i></a></li>
        <li><a href="#"><i class="fa fa-star"></i></a></li>
      </ul>
    </div>
    <h4><a href="#">Endeavor Daytrip</a></h4>
    <div class="product-price">
      <ul>
        <li>$30.00</li>
        <li class="old-price">$33.00</li>
      </ul>
    </div>
  </div>
</div> -->