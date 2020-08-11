<?php 
  $linkNew      = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'new']);
  $LinkName     = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'name']);
  $LinkOrdering = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'ordering']);
  $data = [
    'new' => $linkNew,
    'name' => $LinkName,
    'ordering' => $LinkOrdering,
  ];
  $pagination = $this->pagination->frontEndPagination($this->arrParam);
  HTMLFrontEnd::showTitle($this->_title);
?>

<div class="toolbar mb-30">
  <div class="shop-tab">
    <div class="tab-3">
      <h3></h3>
    </div>

  </div>
  <?php HTMlFrontEnd::createFilter($data)?>
</div>

<div class="tab-content">
  <div class="tab-pane active" id="th">
    <div class="row">
        <?php 
          $xhtml = '';
          if (!empty($this->items)) {
            foreach ($this->items as $key => $value) {
              $link    = URL::createLink('default','book','list',['catID' => $value['id']]);
              $name    = $value['name'];
              $picture = Helper::createImage('category', '', $value['picture']);
              $xhtml .= '<div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="product-wrapper mb-40 hidden-md hidden-sm">
                            <div class="product-img">
                                <a href="'.$link.'">
                                    '.$picture.'
                                </a>                                               
                            </div>
                            <div class="product-details text-center">                               
                                <h4><a href="'.$link.'">'.$name.'</a></h4>                                 
                            </div>	
                          </div>
                        </div>';
            }
           
          } else {
            $xhtml .= '<h4 style="color:red;font-weight:bold"> No Data</h4>';
          }
          echo $xhtml;
        ?>  

    </div>
  </div>
</div>


<div class="pagination-area">
    <div style="float:right">
      <?php echo $pagination; ?>
    </div>
</div>
