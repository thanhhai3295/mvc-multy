<div class="section-title-5 mb-30">
  <h2>Feature Books</h2>
</div>
<?php 
  $xhtml = '';
  if (!empty($this->featureBook)) {
    foreach ($this->featureBook as $key => $value) {
      $link    = URL::createLink('default','book','list',['catID' => $value['id']]);
      $name    = $value['name'];
      $description = Helper::cutString($value['description'],200).'...';
      $picture = Helper::createImage('book', '', $value['picture']);
      $xhtml .= '<div class="card" style="max-width: 540px;margin-bottom:20px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">'.$picture.'</div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text">'.$description.'</p>
                      </div>
                    </div>
                  </div>
                </div><hr>';
    }
  } 
  echo $xhtml;
?>  

<div class="section-title-5 mb-30">
  <h2>New Books</h2>
</div>
<div class="row newbook">
<?php 
  $xhtml = '';
  if (!empty($this->newBook)) {
    foreach ($this->newBook as $key => $value) {
      $link    = URL::createLink('default','book','list',['catID' => $value['id']]);
      $name    = $value['name'];
      $picture = Helper::createImage('book', '', $value['picture']);
      $xhtml .= '
                  <div class="col-md-4">
                    <div class="card relative overflow" style="width: 18rem;">
                    '.$picture.'
                    <span class="new">NEW</span>
                    <div class="card-body" style="margin-top:1rem;">
                    <h5 class="card-title">'.$name.'</h5>
                    </div>
                    </div>
                  </div>';

    }
  } 
  echo $xhtml;
?>  
</div>