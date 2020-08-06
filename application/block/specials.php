<?php 
  
  $sql = "SELECT id,name,picture FROM ".TBL_BOOK." WHERE special = 1";
  $result = $db->rawQuery($sql);
  $randomArray = array_rand($result, 2);
  $xhtml = '';
  foreach ($randomArray as $key => $value) {
    $link = URL::createLink('default','book','detail',['bookID' => $result[$value]['id']]);
    $name    = $result[$value]['name'];
    $picture = Helper::createImage('book', '', $result[$value]['picture']);
    $xhtml .= '<div class="single-most-product bd mb-18">
                  <div class="most-product-img relative">
                    <a href="'.$link.'">'.$picture.'</a>
                    <span class="specials">&nbsp;&nbsp;Specials</span>
                  </div>
                  <div class="most-product-content">
                  <h4><a href="'.$link.'">'.$name.'</a></h4>
                  <div class="product-rating">
                    <ul>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                  </div>
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