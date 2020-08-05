<?php 
  $pagination = $this->pagination->showPagination(true);
  $hiddenPage = Helper::cmsInput('hidden','filter_page','1');
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
      </form>
      </div>
      
    </div>
  </div>
</div>

</div>
<div class="pagination-area">
    <div style="float:right">
      <?php echo $pagination; ?>
    </div>
</div>

<form action="" id="adminForm" method="POST">
  <?php echo $hiddenPage; ?>
</form>