<?php
class UserController extends DefaultController{
	
	public function indexAction(){
		$this->_view->_title	= 'My Account';
		$this->_view->render('user/index');
	}
	
	public function cartAction(){
		$this->_view->_title	= 'My Cart';
		$this->_view->Items		= $this->_model->listItem($this->_arrParam, array('task' => 'books-in-cart'));
		$this->_view->render('user/cart');
	}
	
	public function orderAction(){
		$cart	= Session::get('cart');
		$bookID	= $this->_arrParam['bookID'];
		$price	= $this->_arrParam['price'];
		
		if(empty($cart)){
			$cart['quantity'][$bookID]	= 1;
			$cart['price'][$bookID]		= $price;
		}else{
			if(key_exists($bookID, $cart['quantity'])){
				$cart['quantity'][$bookID]	+=1;
				$cart['price'][$bookID]		= $price * $cart['quantity'][$bookID];
			}else{
				$cart['quantity'][$bookID]	= 1;
				$cart['price'][$bookID]		= $price;
			}
		}
		
		Session::set('cart', $cart);
		URL::redirect('default', 'book', 'detail', array('bookID' => $bookID));
	}

	public function historyAction(){
		$this->_view->_title	= 'History';
		$this->_view->Items		= $this->_model->listItem($this->_arrParam, array('task' => 'history-cart'));
		$this->_view->render('user/history');
	}
	
	public function buyAction(){
		$this->_model->saveItem($this->_arrParam, array('task' => 'submit-cart'));
		URL::redirect('default', 'index', 'index');
	}
}

