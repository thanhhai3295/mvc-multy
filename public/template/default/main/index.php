﻿<!doctype html>
<html class="no-js" lang="en">
		<?php echo $this->_metaHTTP;?>
		<?php echo $this->_metaName;?>
		<title><?php echo $this->_title ?></title>
		<?php echo $this->_cssFiles;?>
    <body class="shop">
    <header>
      <?php 
        include 'html/head-top.php'; 
        include 'html/head-mid.php';
			  include 'html/menu.php' 
			?>
		</header>
    <?php include 'html/breadcrumb.php' ?>
		<div class="shop-main-area mb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<?php include 'html/shop-left.php' ?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
						<div class="category-image mb-30">
							<a href="#"><img src="public/template/default/main/img/banner/32.jpg" alt="banner" /></a>
						</div>
						<div class="section-title-5 mb-30">
							<h2>Book</h2>
						</div>
						<?php include 'html/toolbar.php' ?>
						<!-- tab-area-start -->
						<?php
    					require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS .  $this->_fileView . '.php';
						?>
					</div>
				</div>
			</div>
		</div>
    <?php 
      include 'html/footer.php'; 
      echo $this->_jsFiles;
    ?>
    </body>
</html>

