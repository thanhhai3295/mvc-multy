<?php 
  HTMLFrontEnd::showTitle($this->_title);
  $linkCategory	= URL::createLink('default', 'category', 'index');
	$linkSubmitForm	= URL::createLink('default', 'user', 'buy');
?>
<form action="<?php echo $linkSubmitForm;?>" method="POST" name="adminForm" id="adminForm">
<div class="row">
  <div class="col-lg-12">
    <form action="#">
      <div class="table-content table-responsive">
        <table>
          <thead>
            <tr>
              <th class="product-thumbnail">Image</th>
              <th class="product-name">Product</th>
              <th class="product-price">Price</th>
              <th class="product-quantity">Quantity</th>
              <th class="product-subtotal">Total</th>
              <th class="product-remove">Remove</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $xhtml = '';
            $sumPrice = 0;
            if(!empty($this->Items)) {
              foreach ($this->Items as $key => $value) {
                $linkDetailBook = URL::createLink('default','book','detail',['bookID' => $value['id']]);
                $linkDelete = URL::createLink('default','user','delete',['bookID' => $value['id']]);
                $picture = BOOK_URL.$value['picture'];
                $name = $value['name'];
                $price = number_format($value['price']).'đ';
                $quantity = $value['quantity'];
                $totalprice = number_format($value['totalprice']).'đ';
                $sumPrice += $value['totalprice'];                

                $inputBookID	= Helper::cmsInput('hidden', 'form[bookid][]',$value['id']);
                $inputQuantity	= Helper::cmsInput('hidden', 'form[quantity][]',$value['quantity']);
                $inputPrice		= Helper::cmsInput('hidden', 'form[price][]',$value['price']);
                $inputName		= Helper::cmsInput('hidden', 'form[name][]',$value['name']);
                $inputPicture		= Helper::cmsInput('hidden', 'form[picture][]',$value['picture']);


                $xhtml .= '<tr>
                            <td class="product-thumbnail"><a href="'.$linkDetailBook.'"><img src="'.$picture.'" alt="man"></a></td>
                            <td class="product-name"><a href="'.$linkDetailBook.'">'.$name.'</a></td>
                            <td class="product-price"><span class="amount">'.$price.'</span></td>
                            <td class="product-quantity"><input type="number" value="'.$quantity.'"></td>
                            <td class="product-subtotal">'.$totalprice.'</td>
                            <td class="product-remove"><a href="#" onClick="submitURL(\''.$linkDelete.'\')"><i class="fa fa-times"></i></a></td>
                          </tr>';
                $xhtml	.= $inputBookID . $inputQuantity . $inputPrice . $inputName . $inputPicture;
              }
            } else {
              $xhtml = '<tr><td colspan="6">No Data</td></tr>';
            }
            echo $xhtml;
          ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>

<?php include 'elements/cart-total.php' ?>

</form>