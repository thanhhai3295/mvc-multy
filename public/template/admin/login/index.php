<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $this->_metaHTTP;?>
<?php echo $this->_metaName;?>
<title><?php echo $this->_title;?></title>
<?php echo $this->_cssFiles;?>

	<meta charset="UTF-8">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="public/template/admin/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('public/template/admin/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
			<?php 
					require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
			?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<?php echo $this->_jsFiles;?>

</body>
</html>