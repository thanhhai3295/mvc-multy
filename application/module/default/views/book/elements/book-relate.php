<div class="product-info-area mt-80">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    
    <li class="active"><a href="#Related" data-toggle="tab" aria-expanded="true">Related Book</a></li>
    <li class=""><a href="#Details" data-toggle="tab" aria-expanded="false">Details</a></li>
    
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="Related">
        <div class="valu">
          <?php 
            $xhtml = '';
            if (!empty($this->bookRelate)) {
              foreach ($this->bookRelate as $key => $value) {
                $link    = URL::createLink('default','book','detail',['bookID' => $value['id']]);
                $name    = $value['name'];
                $picture = Helper::createImage('book', '98x150-', $value['picture']);
                $xhtml .= '
                  <div class="col-md-3">
                    <div class="card" style="width: 18rem;text-align: center;border: 1px solid #ccc;padding:5px">
                    <a href="'.$link.'">'.$picture.'</a>
                    <div class="card-body" style="margin-top:1rem;">
                    <h5 class="card-title"><a href="'.$link.'">'.$name.'</a></h5>
                    </div>
                    </div>
                  </div>';
              }
            } else {
              $xhtml = 'No Related Book';
            }
            echo $xhtml;
          ?>
        </div>
    </div>
    <div class="tab-pane" id="Details">
        <div class="valu">
          <?php echo $description ?>
        </div>
    </div>
  </div> 
</div>