<?php 
	class URL {
		public static function createLink($module,$controller, $action, $params = NULL){
			$result = "index.php?module=$module&controller=$controller&action=$action";
      if(!empty($params)) {
        foreach($params as $key => $value) {
          $result .= "&$key=$value";
        }
      }
      return $result;
    }
    public static function redirect($module, $controller, $action, $params = null, $router = null){
      $link	= self::createLink($module, $controller, $action, $params, $router);
      header('location: ' . $link);
      exit();
    }
	}
?>