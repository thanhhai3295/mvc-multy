<?php
class IndexController extends DefaultController{
	public function __construct($arrParams){
		parent::__construct($arrParams);
		session::init();
	}
	public function IndexAction(){
		$this->_view->_title	 = 'HOME';
		$this->_view->featureBook = $this->_model->featureBook($this->_arrParam);
		$this->_view->newBook = $this->_model->newBook($this->_arrParam);
		$this->_view->render('index/index');
	}
} 