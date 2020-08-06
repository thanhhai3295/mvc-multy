<?php 
  $db = new Model();
  $sql = "SELECT id,name FROM ".TBL_CATEGORY;
  $result = $db->rawQuery($sql);
  $catID = $_GET['catID']??'';
  $xhtml = '';
  foreach ($result as $key => $value) {
    $active = '';
    if($value['id'] == $catID) $active = 'style="color:orange;"';
    $link   = URL::createLink('default','book','list',['catID' => $value['id']]);
    $xhtml .= '<ul>
                <li><a '.$active.' href="'.$link.'">'.$value['name'].'</a></li>
              </ul>';
  }
  echo $xhtml;
?>

