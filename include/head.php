<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Polyplastic Thailand</title>
	<meta name="description" content="Poly plastic,plastic bag.">
	<meta name="author" content="Jaraspong Chokchaisiri,Codigosoftware.net">

	<!-- The styles -->
	<link rel="stylesheet" href="css/index.css" />
	<link rel="stylesheet" href="javascript/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" href="admin/css/bootstrap-classic.min.css"  />
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--Library JS-->
	<script src="javascript/jquery-1.8.3.min.js"></script>	
	<script src="javascript/jquery.tmpl.min.js"></script>	
	<script src="javascript/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>	
	<script src="javascript/object/TemplateManager.js"></script>
	<script src="javascript/main.js"></script>		
	<script src="admin/js/jquery.cookie.js"></script>		
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
			<div class="span2 logo">
				<img src="images/logo-1.png" width="137" height="96" alt="Poly plastic logo" />
			</div>
			<ul id="selectLandguage" class="navbar">
				<li class="en nav"><a id="en" class="lang active">English</a></li>
				<li class="nav">|</li>
				<li class="jp nav"><a id="jp" class="lang">Japan</a></li>
			</ul>
			<ul id="mainmenu" class="navbar span10">
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
	<!--	<div class="row">
			<div class="divider span12"></div>
		</div>-->
		<div class="row">
			<div id="keyvisual" class="span12  key-visual"></div>
		</div>
	<!--	<div class="row">
			<div class="divider span12"></div>
		</div>-->
	</div>
	<div class="divider"></div>
</div>