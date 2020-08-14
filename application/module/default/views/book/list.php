<?php 
  $catID = $_GET['catID']??'';
  $linkNew      = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'new','catID' => $catID]);
  $LinkName     = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'name','catID' => $catID]);
  $LinkOrdering = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'ordering','catID' => $catID]);
  $linkPrice      = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'price','catID' => $catID]);
  $data = [
    'new' => $linkNew,
    'name' => $LinkName,
    'ordering' => $LinkOrdering,
    'price' => $linkPrice
  ];
  $pagination = $this->pagination->frontEndPagination($this->arrParam);
  HTMLFrontEnd::showTitle($this->_title);
?>

<div class="toolbar mb-30">
  <div class="shop-tab">
    <div class="tab-3">
      <h3><?php echo $this->categoryName['name'] ?></h3>
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
              $link    = URL::createLink('default','book','detail',['bookID' => $value['id']]);
              $name    = $value['name'];
              $description = Helper::cutString($value['description'],200);
              $picture = Helper::createImage('book', '', $value['picture'],['class'=>'img-thumbnail']);
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
            $xhtml .= HTMLFrontEnd::noData(NO_DATA);
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
