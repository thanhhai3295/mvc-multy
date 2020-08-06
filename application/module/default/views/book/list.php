<?php 
  $pagination = $this->pagination->showPagination(true);
  $hiddenPage = Helper::cmsInput('hidden','filter_page','1');
?>
<div class="section-title-5 mb-30">
  <h2><?php echo $this->_title ?></h2>
</div>
<div class="toolbar mb-30">
  <div class="shop-tab">
    <div class="tab-3">
      <h3><?php echo $this->categoryName['name'] ?></h3>
    </div>

  </div>
  <div class="toolbar-sorter">
    <span>Sort By</span>
    <?php include_once BLOCK_PATH . 'sort.php';?>
  </div>
</div>
<div class="tab-content">
  <div class="tab-pane active" id="th">
    <div class="row">
        <?php 
          $xhtml = '';
          if (!empty($this->items)) {
            foreach ($this->items as $key => $value) {
              $link    = URL::createLink('default','book','detail',['bookID' => $value['id']]);
              $name    = $value['name'];
              $description = Helper::cutString($value['description'],200);
              $picture = Helper::createImage('book', '', $value['picture']);
              $xhtml .= '<div class="card" style="max-width: 540px;margin-bottom:20px;">
                          <div class="row no-gutters">
                            <div class="col-md-4"><a href="'.$link.'">'.$picture.'</a></div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title"><a href="'.$link.'">'.$name.'</a></h5>
                                <p class="card-text">'.$description.'</p>
                              </div>
                            </div>
                          </div>
                        </div><hr>';
            }
          } else {
            $xhtml .= '<h4 style="color:red;font-weight:bold"> No Data</h4>';
          }
          echo $xhtml;
        ?>  

    </div>
  </div>
</div>

<div class="pagination-area" style="border:none">
    <div style="float:right">
      <?php echo $pagination; ?>
    </div>
</div>

<form action="" id="adminForm" method="POST">
  <?php echo $hiddenPage; ?>
</form>