<?php
class UserController extends DefaultController{
	
	public function indexAction(){
		$this->_view->_title	= 'My Account';
		$this->_view->render($this->nameController.'/index');
	}
	
	public function cartAction(){
		$this->_view->_title	= 'My Cart';
		$this->_view->Items		= $this->_model->listItem($this->_arrParam, array('task' => 'books-in-cart'));
		$this->_view->render($this->nameController.'/cart');
	}
	
	public function orderAction(){
		$cart	= Session::get('cart');
		$bookID	= $this->_arrParam['bookID'];
		$price	= $this->_arrParam['price'];
		
		if(empty($cart)){
			$cart[$bookID]['quantity']	= 1;
			$cart[$bookID]['price']		= $price;
			$cart[$bookID]['image']		= $this->_model->listItem($this->_arrParam, array('task' => 'get-image'));
			$cart[$bookID]['name']		= $this->_model->listItem($this->_arrParam, array('task' => 'get-name'));
		}else{
			if(key_exists('quantity', $cart[$bookID])){
				$cart[$bookID]['quantity']	+=1;
				$cart[$bookID]['price']		= $price * $cart[$bookID]['quantity'];
			}else{
				$cart[$bookID]['quantity']	= 1;
				$cart[$bookID]['price']		= $price;
				$cart[$bookID]['image']		= $this->_model->listItem($this->_arrParam, array('task' => 'get-image'));
				$cart[$bookID]['name']		= $this->_model->listItem($this->_arrParam, array('task' => 'get-name'));
			}
		}
		
		Session::set('cart', $cart);
		URL::redirect('default', 'book', 'detail', array('bookID' => $bookID));
	}

	public function historyAction(){
		$this->_view->_title	= 'History';
		$this->_view->Items		= $this->_model->listItem($this->_arrParam, array('task' => 'history-cart'));
		$this->_view->render($this->nameController.'/history');
	}
	
	public function buyAction(){
		$this->_model->saveItem($this->_arrParam, array('task' => 'submit-cart'));
		URL::redirect('default', 'index', 'index');
	}
}

