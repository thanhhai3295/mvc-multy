<?php 
  $db = new Model();
  $sql = "SELECT id,name FROM ".TBL_CATEGORY;
  $result = $db->rawQuery($sql);
  $xhtml = '';
  foreach ($result as $key => $value) {
    $link   = URL::createLink('default','book','list',['catID' => $value['id']]);
    $xhtml .= '<ul>
                <li><a href="'.$link.'">'.$value['name'].'</a></li>
              </ul>';
  }
  echo $xhtml;
?>

