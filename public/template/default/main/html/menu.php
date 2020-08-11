<div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="menu-area">
          <nav>
            <ul>
              <li><a href="index.php?module=default&controller=index&action=index">Trang Chủ</i></a>
              </li>
              <li><a href="index.php?module=default&controller=category&action=list">Thể Loại<i class="fa fa-angle-down"></i></a>
              <div class="mega-menu">
                <?php 
                  $db = new Model();
                  $sql = "SELECT id,name FROM ".TBL_CATEGORY;
                  $result = $db->rawQuery($sql);
                  $xhtml = '';
                  $check = 0;
                  foreach ($result as $key => $value) {
                    $link   = URL::createLink('default','book','list',['catID' => $value['id']]);
                    $xhtml .= '<span>';
                    $xhtml .= '	<a href="'.$link.'">'.$value['name'].'</a>';
                    $xhtml .= '</span>';
                  }
                  echo $xhtml;
                ?>
							</div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>