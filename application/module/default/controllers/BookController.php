<?php
class BookController extends DefaultController{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		session::init();
	}
	public function listAction(){
		$this->_view->_title	 = strtoupper($this->nameController).' / LIST';
		$totalItems						 = $this->_model->countItem($this->_arrParam);
		$configPagination 		 = array('totalItemsPerPage'	=> 4, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->items			  = $this->_model->listItems($this->_arrParam);
		$this->_view->categoryName 	= $this->_model->categoryName($this->_arrParam);
		$this->_view->render('book/list');
	}
	public function detailAction(){
		$this->_view->_title	 = strtoupper($this->nameController).' / DETAIL';
		$this->_view->bookInfo 		= $this->_model->bookInfo($this->_arrParam);
		$this->_view->bookRelate	= $this->_model->bookRelate($this->_arrParam);
		$this->_view->render('book/detail');
	}
} 