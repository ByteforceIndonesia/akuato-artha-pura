<?php

			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])

			header("location: index.php");
			
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
<link rel="stylesheet" href="css/nday.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/app.css">

<!-- made by www.metatags.org -->
<meta name="description" content="PT Akuato Artha Pura Hadir untuk menjawab kebutuhan pasar industri dalam bidang valve, Fitting, juga meng-instrumentasikannya." />
<meta name="keywords" content="Akuator, Akuato Artha, Valve, Fitting, Pneumatic, Pump, Hydrolic Pump, Actuator, Indonesia, Transmitter, Frans Theda, Swagelok, Haskel, Daniel Orifice, Fisher, Nuflo Flow Meter, Bettis Pneumatic Actuator, Solenoid Valve, Asco, Ascroft" />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>PT Akuato Artha Pura - Admin</title>
<!-- Akuator, Valve, Fitting -->

<script src="js/vendor/modernizr.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script>
	$(function() { 
	//Initialize Stellar
	$.stellar({
        horizontalScrolling: false,
	});
});


</script>
</head>
<body>
<div class="contain-to-grid navi">
<!-- Nav -->
<nav class="top-bar navi-in" data-topbar role="navigation" data-options="sticky_on: large">
  <ul class="title-area navi-in">
    <li class="name">
      <h1><a href="index.php">PT. AKUATO - ADMIN</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="admin.php">Admin Home</a></li>
      <li><a href="admin.php?edit=1">Add New Post</a></li>
      <li><a href="admin.php?edit=3">Edit Posts</a></li>
      <li><a href="admin.php?edit=2">Edit Contacts</a></li>
      <li><a href="admin.php?edit=4">Edit Company Profile</a></li>
      </li>
    </ul>
  </section>
</nav>
</div>
<!-- Start Index -->
<?php 
	
	global $edit;
	
	if (!empty($_GET['edit'])) {
	$admin = $_GET['edit'];
	
	include_once('class/cms.php');
	
      	$obj = new cms();
	  
		$obj->host = 'localhost';
      	$obj->username = 'root';
      	$obj->password = '';
      	$obj->table = 'test';
		$obj->connect();

	if (empty ($edit))
	{
		echo $obj->home_admin();
			
	}elseif ( !empty ($edit)){
		
		if ( $edit == '1' ){
			
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])
			
			echo $obj->edit_add_new();
			
			
		}elseif ( $edit == '2' )
		{
			
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])

			header("location: index.php");
			
			echo $obj->edit_contacts();
			
			if ( $_POST )
      		$obj->write($_POST);
			
		}elseif ( $edit == '3')
		{
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])
			
			header("location: index.php");
			
			echo $obj->edit_post();
			
			if ( $_POST )
      		$obj->write($_POST);
      			
		}elseif ( $edit == '4')
		{
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])
			
			header("location: index.php");
			
			echo $obj->edit_company_profile();
			
			if ( $_POST )
      		$obj->write($_POST);
      			
		}elseif ( $edit == '5')
		{
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

			header("Cache-Control: private");

			session_start();

			if(!@$_SESSION["login_username"])
			
			header("location: index.php");
			
			echo $obj->edit_add_new();
			
			if ( $_POST )
      		$obj->write($_POST);
      			
		}
		
	}
}
?>
</div>
<div id = "" class = "bigFooter"><div class="row">Email : akuatoarthapura@akuator.com // Telp : +6221 451 4951 // 
<a class="admin_link" href="index.php?admin=2">Logout Admin</a></div>
</div>

	<script src="js/foundation.min.js"></script>
    	<script src="js/foundation/foundation.topbar.js"></script>
    
    	<script>
     		 $(document).foundation();
    	</script>
</body>
</html>