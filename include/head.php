<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Speed Home</title>
	<meta name="description" content="เหล็ก โลหะ แสงอรุณโลหะกิจ">
	<meta name="author" content="Jaraspong Chokchaisiri,Codigosoftware.net">

	<!-- The styles -->

	<link rel="stylesheet" href="js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-cerulean.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
	<link rel="stylesheet" href="css/index.css" />	
	<link rel="stylesheet" href="css/accordion.css" />	

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
	<script src="js/accordion.js"></script>
	<script src="js/main.js"></script>	
	<script type="text/javascript">
		jQuery(document).ready(function() {

			jQuery('#carousel').jcarousel({
			    wrap: 'circular',
			    scroll : 1,
			    auto   : 2
			});

			window.fixIE.init();
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
				<li class="nav"><a href="index.php">หน้าแรก</a></li>
				<li class="nav"><a href="company.php">สินค้า / ผลิตภัณฑ์</a></li>
				<li class="nav"><a href="products.php">วิธีการสั่งซื้อ</a></li>
				<li class="nav"><a href="news.php">เงื่อนไขการคืนสินค้า</a></li>
				<li class="nav"><a href="certificate.php">โปรโมชั่น & อีเวนท์</a></li>
				<li class="nav"><a href="contact.php">ติดต่อเรา</a></li>
			</ul>
		</div>
</header>

<!--Key Visual-->
<div class="keyvisual-wrapper">
	<div class="container">

		<div class="row">
			<div id="topbar" class="span3">
				<div class="category-text">All Category</div>
			</div>
			<div id="searchfields" class="span9">
				<form class="navbar-search pull-left">
					<input class="span5" type="text" class="search-query" placeholder="Search">
		            <select class="span3">
		                <option value="1">Option 1</option>
		                <option value="2">Option 2</option>
		                <option value="3">Option 3</option>
		            </select>
					<button type="submit" class="btn">Submit</button>
				</form>
			</div>
		</div>

	</div>
</div>

<!--Body Content-->
<section class="container body-container">

	<div class="row">
	
		<!--Left Column-->
		<div id="cssmenu" class="span3 left-menu">

			<ul>
			   <li><a href='#product'><span>เครื่องมือช่าง</span></a>
			      <ul>
			         <li><a href='#1'>Widgets</a></li>
			         <li><a href='#2'>Menus</a></li>
			         <li><a href='#3'>Products</a></li>
			      </ul>
			   </li>
			   <li><a href='#'><span>Company</span></a>
			      <ul>
			         <li><a href='#'>About</a></li>
			         <li><a href='#'>Location</a></li>
			      </ul>
			   </li>
			   <li><a href='#product'><span>เครื่องมือช่าง</span></a>
			      <ul>
			         <li><a href='#1'>Widgets</a></li>
			         <li><a href='#2'>Menus</a></li>
			         <li><a href='#3'>Products</a></li>
			      </ul>
			   </li>
			   <li><a href='#'><span>Company</span></a>
			      <ul>
			         <li><a href='#'>About</a></li>
			         <li><a href='#'>Location</a></li>
			      </ul>
			   </li>
			   <li><a href='#product'><span>เครื่องมือช่าง</span></a>
			      <ul>
			         <li><a href='#1'>Widgets</a></li>
			         <li><a href='#2'>Menus</a></li>
			         <li><a href='#3'>Products</a></li>
			      </ul>
			   </li>
			   <li><a href='#'><span>Company</span></a>
			      <ul>
			         <li><a href='#'>About</a></li>
			         <li><a href='#'>Location</a></li>
			      </ul>
			   </li>
			   <li><a href='#contact'><span>Contact</span></a></li>
			</ul>

		</div>