<?php
class IndexController extends DefaultController{

	public function IndexAction(){
		$this->_view->_title	 = 'HOME';
		$this->_view->featureBook = $this->_model->listItems($this->_arrParam,['task' => 'feature-book']);
		$this->_view->newBook = $this->_model->listItems($this->_arrParam,['task' => 'new-book']);
		$this->_view->render($this->nameController.'/index');
	}

	public function loginAction(){
		$userInfo	= Session::get('user');
		if($userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time()){
			URL::redirect('default', 'user', 'index');
		}
		$this->_view->_title 		= 'Login';
	
		if(isset($this->_arrParam['form']['token'])){
			$validate	= new Validate($this->_arrParam['form']);
			$username		= $this->_arrParam['form']['username'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
			$validate->addRule('username', 'existRecord', array('database' => $this->_model, 'query' => $query));
			$validate->run();
				
			if($validate->isValid()==true){
				$infoUser		= $this->_model->infoItem($this->_arrParam);
				$arraySession	= array(
						'login'		=> true,
						'info'		=> $infoUser,
						'time'		=> time(),
						'group_acp'	=> $infoUser['group_acp']
				);
				Session::set('user', $arraySession);
				URL::redirect('default', 'user', 'index');
			}else{
				$this->_view->errors	= $validate->getError();
			}
		}
	
		$this->_view->render('index/login');
	}

} 