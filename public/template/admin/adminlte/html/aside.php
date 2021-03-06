<?php 
  $linkDashBoard = URL::createLink('admin','index','dashboard');
  $linkGroupList = URL::createLink('admin','group','list');
  $linkGroupForm = URL::createLink('admin','group','form');
  $linkFaqList = URL::createLink('admin','faq','list');
  $linkFaqForm = URL::createLink('admin','faq','form');
  $linkUserList = URL::createLink('admin','user','list');
  $linkUserForm = URL::createLink('admin','user','form');
  $linkCategoryList = URL::createLink('admin','category','list');
  $linkCategoryForm = URL::createLink('admin','category','form');
  $linkBookList = URL::createLink('admin','book','list');
  $linkBookForm = URL::createLink('admin','book','form');
  $arrMenu = [
    'dashboard' => ['icon' => 'fa-tachometer-alt','name'=>'Dashboard','link'=>$linkDashBoard],
    'group' => ['icon' => 'fa-copy','name'=>'Group','link'=>$linkDashBoard,'child' => [
        ['icon' => 'fa-circle','name'=>'List','link'=>$linkGroupList],
        ['icon' => 'fa-circle','name'=>'Add','link'=>$linkGroupForm]
      ]
    ],
    // 'faq' => ['icon' => 'fa-question','name'=>'Group','link'=>$linkFaqList,'child' => [
    //     ['icon' => 'fa-circle','name'=>'List','link'=>$linkFaqList],
    //     ['icon' => 'fa-circle','name'=>'Add','link'=>$linkFaqForm]
    //   ]
    // ],
    'user' => ['icon' => 'fa-user','name'=>'user','link'=>$linkDashBoard,'child' => [
        ['icon' => 'fa-circle','name'=>'List','link'=>$linkUserList],
        ['icon' => 'fa-circle','name'=>'Add','link'=>$linkUserForm]
      ]
    ],
    'category' => ['icon' => 'fa-object-group','name'=>'user','link'=>$linkDashBoard,'child' => [
      ['icon' => 'fa-circle','name'=>'List','link'=>$linkCategoryList],
      ['icon' => 'fa-circle','name'=>'Add','link'=>$linkCategoryForm]
    ]
  ],    
  'book' => ['icon' => 'fa-book','name'=>'user','link'=>$linkDashBoard,'child' => [
    ['icon' => 'fa-circle','name'=>'List','link'=>$linkBookList],
    ['icon' => 'fa-circle','name'=>'Add','link'=>$linkBookForm]
  ]
],    
  ];
  $xhtml = '';
  foreach ($arrMenu as $key => $value) {
    $arrow = '';
    if(isset($value['child'])) {
      $arrow = 'fas fa-angle-left right';
    }
    $xhtml .= '<li class="nav-item has-treeview">
            <a href="'.$value['link'].'" class="nav-link">
              <i class="nav-icon fas '.$value['icon'].'"></i>
              <p>
                '.ucfirst($key).'
                <i class="'.$arrow.'"></i>
              </p>
            </a>';
    if(!empty($value['child'])) {
      foreach ($value['child'] as $key02 => $value02) {
        $xhtml .= '<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="'.$value02['link'].'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>'.$value02['name'].'</p>
                </a>
              </li>
            </ul>';
      }
    }        
    $xhtml .= '</li>';

  }
  
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="public/template/admin/adminlte/css/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://crhscountyline.com/wp-content/uploads/2020/03/Capture.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hai Dep Trai</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php echo $xhtml; ?>
          
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>