<?php 
	class HTMlFrontEnd {
    public static function showTitle($content) {
      echo '<div class="section-title-5 mb-30">
                <h2>'.$content.'</h2>
              </div>';
    }
    public static function createFilter($data) {
      $xhtml = '<div class="toolbar-sorter">
                  <span>Sort By</span>
                  <select id="sort" onchange="location = this.value;">';

            
      foreach ($data as $key => $value) {
        $xhtml .= '<option value="'.$value.'">'.$key.'</option>';
      }             
      $xhtml .= '</select>
                  <a href="#"><i class="fa fa-arrow-down"></i></a>
                </div>';
      echo $xhtml;           
    }

    public static function salePrice($sale,$price) {
      if($sale > 0) {
        return '<span>'.number_format((100-$sale)*($price/100)).'đ </span><span class="old-price">'.number_format($price).'đ</span>';
      } else {
        return '<span>'.number_format($price).'đ</span>';
      }
    }
    
  }
?>