<?php
  HTMLFrontEnd::showTitle('SÁCH NỔI BẬT');
  $xhtml = '';
  if (!empty($this->featureBook)) {
    foreach ($this->featureBook as $key => $value) {
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
  } 
  echo $xhtml;
  HTMLFrontEnd::showTitle('SÁCH MỚI');
?>  