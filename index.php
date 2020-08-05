<?php
	
	require_once 'define.php';
	require_once 'define-value.php';
	function __autoload($clasName){
		require_once LIBRARY_PATH . "{$clasName}.php";
	}
	
	$bootstrap = new Bootstrap();
	$bootstrap->init();