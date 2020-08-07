<?php 
  $linkNew      = URL::createLink('default',$_GET['controller'],'list',['filter' => 'new']);
  $LinkName     = URL::createLink('default',$_GET['controller'],'list',['filter' => 'name']);
  $LinkOrdering = URL::createLink('default',$_GET['controller'],'list',['filter' => 'ordering']);
  $pagination = $this->pagination->showPagination(true);
  $hiddenPage = Helper::cmsInput('hidden','filter_page','1');

?>
<div class="section-title-5 mb-30">
  <h2><?php echo $this->_title ?></h2>
</div>
<div class="toolbar mb-30">
  <div class="shop-tab">
    <div class="tab-3">
      <h3>...</h3>
    </div>

  </div>
  <div class="toolbar-sorter">
    <span>Sort By</span>
    <select id="sort" onchange="location = this.value;">
      <option value="<?php echo $linkNew ?>">New</option>
      <option value="<?php echo $LinkName ?>">Name</option>
      <option value="<?php echo $LinkOrdering ?>">Ordering</option>
    </select>
    <a href="#"><i class="fa fa-arrow-down"></i></a>
  </div>
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

<form action="" id="adminForm" method="POST">
  <?php echo $hiddenPage; ?>
</form>