<div class="section-title-5 mb-30">
  <h2><?php echo $this->_title ?></h2>
</div>
<?php
  $name        = $this->bookInfo['name'];
  $picture     = $this->bookInfo['picture'];
  $description = $this->bookInfo['description'];
  $price       = $this->bookInfo['price'];
  $sale        = $this->bookInfo['sale_off'];
  if($this->bookInfo['sale_off'] > 0) {
    $sale_off = '<span>'.number_format((100-$sale)*($price/100)).'đ </span><span class="old-price">'.number_format($price).'đ</span>';       
  } else {
    $sale_off = '<span>'.number_format($price).'đ</span>';
  }
  
?>

<div class="product-main-area">
  <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
    <a href="public/files/book/<?php echo $picture ?>" data-fancybox="images">
      <img src="public/files/book/<?php echo $picture ?>" style="width:100%" />
    </a>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
      <div class="product-info-main">
        <div class="page-title">
          <h1><?php echo $name?></h1>
        </div>

        <div class="product-info-price">
          <div class="price-final">
            <?php echo $sale_off; ?>
          </div>
        </div>
        <div class="product-add-form">
          <form action="#">
            <div class="quality-button">
              <input class="qty" type="number" value="1">
            </div>
            <a href="#">Add to cart</a>
          </form>
        </div>
        <div class="product-social-links">
          <div class="product-addto-links">
            <a href="#"><i class="fa fa-heart"></i></a>
            <a href="#"><i class="fa fa-pie-chart"></i></a>
          </div>
          <div class="product-addto-links-text">
            <p><?php echo Helper::cutString($description,500) ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>	
</div>
<br>
<div class="product-info-area mt-80">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    
    <li class="active"><a href="#Related" data-toggle="tab" aria-expanded="true">Related Book</a></li>
    <li class=""><a href="#Details" data-toggle="tab" aria-expanded="false">Details</a></li>
    
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="Related">
        <div class="valu">
          <?php 
            $xhtml = '';
            if (!empty($this->bookRelate)) {
              foreach ($this->bookRelate as $key => $value) {
                $link    = URL::createLink('default','book','detail',['bookID' => $value['id']]);
                $name    = $value['name'];
                $picture = Helper::createImage('book', '98x150-', $value['picture']);
                $xhtml .= '
                  <div class="col-md-3">
                    <div class="card" style="width: 18rem;text-align: center;border: 1px solid #ccc;padding:5px">
                    <a href="'.$link.'">'.$picture.'</a>
                    <div class="card-body" style="margin-top:1rem;">
                    <h5 class="card-title"><a href="'.$link.'">'.$name.'</a></h5>
                    </div>
                    </div>
                  </div>';
              }
            } else {
              $xhtml = 'No Related Book';
            }
            echo $xhtml;
          ?>
        </div>
    </div>
    <div class="tab-pane" id="Details">
        <div class="valu">
          <?php echo $description ?>
        </div>
    </div>
  </div> 
</div>