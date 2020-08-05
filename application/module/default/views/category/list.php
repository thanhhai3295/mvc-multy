<?php 
    $pagination = $this->pagination->showPagination(true);
?>
<div class="tab-content">
  <div class="tab-pane active" id="th">
    <div class="row">
      
        <?php 
          $xhtml = '';
          if (!empty($this->items)) {
            foreach ($this->items as $key => $value) {
              $name    = $value['name'];
              $picture = Helper::createImage('category', '', $value['picture']);
              $xhtml .= '<div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="product-wrapper mb-40 hidden-md hidden-sm">
                            <div class="product-img">
                                <a href="#">
                                    '.$picture.'
                                </a>                                               
                            </div>
                            <div class="product-details text-center">                               
                                <h4><a href="#">'.$name.'</a></h4>                                 
                            </div>	
                          </div>
                        </div>';
            }
            echo $xhtml;
          }
        ?>  
      </div>
    </div>
  </div>
</div>

<div class="pagination-area mt-50">
  <div class="page-number">
    <ul>
      <li><a href="#" class="active">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#" class="angle"><i class="fa fa-angle-right"></i></a></li>
    </ul>
  </div>
</div>