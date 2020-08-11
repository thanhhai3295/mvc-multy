<?php
class IndexController extends DefaultController{

	public function IndexAction(){
		$this->_view->_title	 = 'HOME';
		$this->_view->featureBook = $this->_model->listItems($this->_arrParam,['task' => 'feature-book']);
		$this->_view->newBook = $this->_model->listItems($this->_arrParam,['task' => 'new-book']);
		$this->_view->render($this->nameController.'/index');
	}

} 