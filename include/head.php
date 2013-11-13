<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>แสงอรุณโลหะกิจ</title>
	<meta name="description" content="เหล็ก โลหะ แสงอรุณโลหะกิจ">
	<meta name="author" content="Jaraspong Chokchaisiri,Codigosoftware.net">

	<!-- The styles -->

	<link rel="stylesheet" href="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
	<link rel="stylesheet" href="css/index.css" />	

	<!--[if lt IE 9]><script src="../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->


	<!--Library JS-->
	<script src="js/jquery-1.8.3.min.js"></script>	
	<script src="js/jquery.tmpl.min.js"></script>	
	<script src="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>	
	<script src="admin/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {

			jQuery('#carousel').jcarousel({
			    wrap: 'circular',
			    scroll : 1,
			    auto   : 2
			});
		});
	</script>	

	<?php
	    if(isset($Document)){
	        $Document->render();
	    }
	    
	?>
	<!-- The fav icon -->
	<!--<link rel="shortcut icon" href="images/favicon.ico">-->
</head>

<body>

<header  class="container">
		<div class="row">
			<div class="span3 logo">
				<img src="images/logo.png" width="220" height="70" alt="Sang arun logo" />
			</div>
			<ul id="selectLandguage" class="navbar">
				<li class="en nav"><a id="en" class="lang active">English</a></li>
				<li class="nav">|</li>
				<li class="jp nav"><a id="jp" class="lang">Japan</a></li>
			</ul>
			<ul id="mainmenu" class="navbar span9">
				<li class="nav"><a href="index.php">HOME</a></li>
				<li class="nav"><a href="company.php">COMPANY</a></li>
				<li class="nav"><a href="products.php">PRODUCT</a></li>
				<li class="nav"><a href="certificate.php">CERTIFICATE/AWARDS</a></li>
				<li class="nav"><a href="news.php">NEW & EVENT</a></li>
				<li class="nav"><a href="careers.php">CAREERS</a></li>
				<li class="nav"><a href="contact.php">CONTACT</a></li>
			</ul>
		</div>
</header>

<!--Key Visual-->
<div class="keyvisual-wrapper">
	<div class="divider"></div>
	<div class="container">

		<div class="row">
			<div id="keyvisual" class="span12  key-visual"></div>
		</div>

	</div>
	<div class="divider"></div>
</div>