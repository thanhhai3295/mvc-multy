<?php 
  $db = new Model();
  $sql = "SELECT name FROM ".TBL_CATEGORY;
  $result = $db->rawQuery($sql);
  $xhtml = '';
  foreach ($result as $key => $value) {
    $xhtml .= '<ul>
                <li><a href="#">'.$value['name'].'</a></li>
              </ul>';
  }
  echo $xhtml;
?>

