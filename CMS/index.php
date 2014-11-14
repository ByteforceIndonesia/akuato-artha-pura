<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PT. Akuato Artha Pura</title>

<link rel="stylesheet" href="css/nday.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/app.css">

<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<div class="contain-to-grid navi">
<!-- Nav -->
<nav class="top-bar navi-in" data-topbar role="navigation" data-options="sticky_on: large">
  <ul class="title-area navi-in">
    <li class="name">
      <h1><a href="index.php">PT. AKUATO</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php?cat=1">Catalouge</a></li>
      <li><a href="index.php?company-profile=1">Company Profile</a></li>
      <li><a href="index.php?contact=1">Contacts</a></li>
      </li>
    </ul>
  </section>
</nav>
</div>
<!-- Start Index -->
<?php 
	
	global $admin, $post, $cat;
	
	if (!empty($_GET['admin'])) {
	$admin = $_GET['admin'];
	}elseif (!empty($_GET['p'])){
	$post = $_GET['p'];
	}elseif (!empty($_GET['cat'])){
	$cat = $_GET['cat'];
	}elseif (!empty($_GET['contact'])){
	$contact = $_GET['contact'];
	}elseif (!empty($_GET['company-profile'])){
	$company = $_GET['company-profile'];
	}
	
	include_once('class/cms.php');
	
      $obj = new cms();
	  
	  	$obj->host = 'localhost';
      	$obj->username = 'root';
      	$obj->password = '';
      	$obj->table = 'cms';
		
		$obj->connect();

	if (empty ($post) && empty ($cat) && empty ($admin) && empty ($contact) && empty ($company))
	{
		echo $obj->home();
			
	}elseif ( !empty ($post)){
		
		include 'html/post.php';
		
	}elseif ( !empty ($cat == '1')){
	
		include 'html/products.php';
		
	}elseif ( !empty ($admin)){
		
		if ( $admin == '1' ){
			
			session_start ();
			echo $obj->admin_login();
			
		}elseif ( $admin == '2' )
		{
			
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])

			header("location: index.php");
			echo $obj->input_admin();
			
		}elseif ( $admin == '3')
		{
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])
			
			header("location: index.php");
			
			if ( $_POST )
      		$obj->write($_POST);
      			
		}
	}elseif ( !empty ($company)){
		
		include 'html/company-profile.php';
		
	}elseif ( !empty ($contact)){
		
		include 'html/contact.php';
		
	}
?>
</div>
<div id = "" class = "bigFooter">Email : aquato@gmail.com // Telp : 021 234 405 // 
<a class="admin_link" href="index.php?admin=1">Login Admin</a>
</div>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.topbar.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>