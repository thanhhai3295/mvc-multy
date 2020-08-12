<?php
  $cart	= Session::get('cart');
	$totalItems		= 0;
  $totalPrices	= 0;
	if(!empty($cart)){
		$totalItems		= array_sum($cart['quantity']);
		$totalPrices	= array_sum($cart['price']);
  }
  $linkViewCart		= URL::createLink('default', 'user', 'cart');
?>
<div class="my-cart">
  <ul>
    <li><a href="<?php echo $linkViewCart ?>"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a>
      <span><?php echo $totalItems; ?></span>
      <div class="mini-cart-sub">
        <div class="cart-product">
        </div>
        <div class="cart-bottom">
          <a class="view-cart" href="<?php echo $linkViewCart ?>">view cart</a>
        </div>
      </div>
    </li>
  </ul>
</div>