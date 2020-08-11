<?php
class BookController extends DefaultController{
	public function listAction(){
		$this->_view->_title	 = 'Danh Mục Sách';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam,null);
		$this->_view->categoryName 	= $this->_model->categoryName($this->_arrParam);
		$this->_view->render($this->nameController.'/list');
	}
	public function detailAction(){
		$this->_view->_title	 = 'Chi Tiết Sách';
		$this->_view->bookInfo 		= $this->_model->getItem($this->_arrParam);
		if(empty($this->_view->bookInfo)) {
			$this->redirect404();
		}
		$this->_view->bookRelate	= $this->_model->getItemRelate($this->_arrParam);
		$this->_view->render($this->nameController.'/detail');
	}
} 