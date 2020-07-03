<?php 
  $nameTable = str_replace('/','',$this->_title);
  $action = explode('/',$this->_title);
  $action = trim($action[1]);
  $form = $this->arrParam??'';
  
  $arraySelectStatus = [
    'default' => 'Choose Status',
    'active'  => 'Active',
    'inactive'=> 'Inactive'
  ];
  $arraySelectGroup = [
    'default' => 'Choose Group',
    '4'  => 'Admin',
    '5'=> 'Member'
  ];
  $arrayForm = [
    [
      'label' => Helper::createLabel('username'),
      'input' => Helper::createInput('text','form[username]',$form['username']??'','Username',$this->errors['username']??'')
    ],
    [
      'label' => Helper::createLabel('email'),
      'input' => Helper::createInput('text','form[email]',$form['email']??'','Email',$this->errors['email']??'')
    ],
    [
      'label' => Helper::createLabel('fullname'),
      'input' => Helper::createInput('text','form[fullname]',$form['fullname']??'','Fullname',$this->errors['fullname']??'')
    ],
    [
      'label' => Helper::createLabel('password'),
      'input' => Helper::createInput('password','form[password]',$form['password']??'','Password',$this->errors['password']??'')
    ],
    [
      'label' => Helper::createLabel('group'),
      'select' => Helper::cmsSelectbox('form[group]','form-control',$arraySelectGroup,$form['group']??'',null,$this->errors['group']??'')
    ],
    [
      'label' => Helper::createLabel('status'),
      'select' => Helper::cmsSelectbox('form[status]','form-control',$arraySelectStatus,$form['status']??'',null,$this->errors['status']??'')
    ],
    [
      'label' => Helper::createLabel('ordering'),
      'input' => Helper::createInput('text','form[ordering]',$form['ordering']??'','Ordering',$this->errors['ordering']??'')
    ]
  ];

  echo Helper::createTitle($this->_title); 
?>
    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-info">
        <div class="card-header indigo">
          <h3 class="card-title"><?php echo $nameTable ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="" id="adminForm">
          <?php echo Helper::createForm($arrayForm,$action); ?>
        </form>

        </div>

      </div>  <!-- col-md-6 -->
    </div> <!-- row -->
  </div><!-- /.container-fluid -->
</section>