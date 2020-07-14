<?php
class CategoryController extends AdminController{
	
	public function listAction(){
		$this->_view->_title	 = strtoupper($this->nameController).' / LIST';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam);
		$this->_view->countStatus = $this->_model->countStatus($this->_arrParam);
		$this->_view->render($this->nameController.'/list');

	}
	public function formAction(){
		$item = [];
		$this->_view->_title	 = strtoupper($this->nameController).' / ADD';
		if(!empty($_FILES)) $this->_arrParam['form']['picture']  = $_FILES['picture'];
		if(isset($this->_arrParam['id'])){
			$this->_view->_title	 		= strtoupper($this->nameController).' / EDIT';
			$item	= $this->_model->infoItem($this->_arrParam);
			if(empty($item)) $this->redirect('admin',$this->nameController,'list');	
		}
		if(isset($this->_arrParam['form']['token'])) {
			$item = $this->_arrParam['form'];
			
			$validate = new CategoryValidate($this->_arrParam['form']);
			$this->_arrParam['form'] = $validate->getResult();
			if($validate->isValid() == false){
				$this->_view->errors = $validate->getError();
			} else {
				
				$this->_model->saveItem($this->_arrParam);		
				Session::set('msgSuccess',isset($this->_arrParam['id']) ? 'Edit Category Success!' : 'Add Category Success!');
				$this->redirect('admin',$this->nameController,'list');		
			}
		}
		$this->_view->arrParam = $item;
		$this->_view->render($this->nameController.'/form');
	}
	public function statusAction(){
		$params['id'] = $this->_arrParam['id'];
		$params['status'] = ($this->_arrParam['status'] == 'active') ? 'inactive' : 'active';
		$this->_model->changeStatus($params);
		Session::set('msgSuccess','Change Status Success!');
		$this->redirect('admin',$this->nameController,'list');
	}

	public function deleteAction() {
		$id = $this->_arrParam['id'];
		$this->_model->deleteItem($id);
		Session::set('msgSuccess','Delete Item Success!');
		$this->redirect('admin',$this->nameController,'list');
	}
	public function multiDeleteAction(){
		if(isset($this->_arrParam['multiDelete'])) {
			$arrID = $this->_arrParam['multiDelete'];
			$this->_model->multiDeleteUser($arrID);
			Session::set('msgSuccess','Delete '.count($arrID).' Item Success!');
			$this->redirect('admin',$this->nameController,'list');
		} else {
			Session::set('msgError','Failed To Delete Item');
			$this->redirect('admin',$this->nameController,'list');
		}
	}
} 