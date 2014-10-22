<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PT. Akuato Artha Pura</title>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/app.css">

<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<div class="header">
<div class="row">
	<div class="large-12 large-centered medium-centered small-centered columns">
		<br><h1 align="center">PT. Akuato Artha Pura</h1>
	</div>
</div>
</div>
<?php 
	
	global $admin, $post, $cat;
	
	if (!empty($_GET['admin'])) {
	$admin = $_GET['admin'];
	}elseif (!empty($_GET['p'])){
	$post = $_GET['p'];
	}elseif (!empty($_GET['cat'])){
	$cat = $_GET['cat'];
	}
	
	include_once('class/cms.php');
	
      $obj = new cms();
	  
	  	$obj->host = 'localhost';
      	$obj->username = 'root';
      	$obj->password = '';
      	$obj->table = 'cms';
		
		$obj->connect();
    

	if (empty ($post) && empty ($cat) && empty ($admin))
	{
		echo $obj->home();
		echo '
				<div class="row">
				<div class="large-4 columns"><br></div>
				<div class="large-4 columns"><br></div>
				<div class="large-4 columns">
				<p class="admin_link">
      				<a href="index.php?admin=1">Login Admin</a>
				</p>
				</div>
				
				</div>';	
	}elseif ( !empty ($post)){
		
		include 'html/post.php';
		
	}elseif ( !empty ($cat)){
	
		include 'html/categories.php';
		
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
	}
?>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>