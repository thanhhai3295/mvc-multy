<?php 
  HTMLFrontEnd::showTitle($this->_title);
  $xhtml = '';
  if(!empty($this->Items)){
    $tableHeader = '<thead>
                      <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Remove</th>
                      </tr>
                    </thead>';
  foreach($this->Items as $key => $value){
    $cartId			= $value['id'];
    $date			= date("H:i d/m/Y", strtotime($value['date']));
    $arrBookID		= json_decode($value['books']);
    $arrPrice		= json_decode($value['prices']);
    $arrName		= json_decode($value['names']);
    $arrQuantity	= json_decode($value['quantities']);
    $arrPicture		= json_decode($value['pictures']);
    $tableContent	= '';
    $totalPrice		= 0;
    foreach ($arrBookID as $keyB => $valueB){
      $linkDeleteHistory = URL::createLink('default','user','deleteHistory',['book_id' => $valueB,'cart_id' => $cartId]);
      $linkDetail		= URL::createLink('default', 'book', 'detail', array('book_id' => $valueB));
      $picture = Helper::createImage('book','','98x150-'.$arrPicture[$keyB],['width'=>'30','height' => '45']);
      $totalPrice		+= $arrQuantity[$keyB] * $arrPrice[$keyB];
      $tableContent .= '<tr>
              <td><a href="'.$linkDetail.'">'.$picture.'</a></td>
              <td class="name">'.$arrName[$keyB].'</td>
              <td>'.number_format($arrPrice[$keyB]).'</td>
              <td>'.$arrQuantity[$keyB].'</td>
              <td>'.number_format($arrQuantity[$keyB] * $arrPrice[$keyB]).'</td>
              <td class="product-remove"><a href="#" onClick="submitURL(\''.$linkDeleteHistory.'\')"><i class="fa fa-times"></i></a></td>
            </tr>';
    }

    $xhtml .= '<h4>Mã đơn hàng:'.$cartId.' - Thời gian: '.$date.'</h4>
              <table>
              '.$tableHeader.'
              <tbody>
                '.$tableContent.'
              </tbody>
            </table>';
    $xhtml .= '<h4 class="amount text-right">Total: <span style="color:red";>'.number_format($totalPrice).'đ</span></h3><hr>'; 
  }
  } else {
    $xhtml = HTMLFrontEnd::noData(NO_ORDER);
  }
?>
<div class="row">
  <div class="col-lg-12">
    <form action="" method="POST" id="urlForm">
      <input type="hidden" name="url">
      <div class="table-content table-responsive">
        <?php echo $xhtml; ?>
      </div>
    </form>
  </div>
</div>
