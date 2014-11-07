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
      <h1><a href="#">PT. AKUATO</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Company Profile</a></li>
      <li><a href="#">Contacts</a></li>
      </li>
    </ul>
  </section>
</nav>

<div id = "" class = "bigSliderPages">


</div>




</div>
<!-- Start Index -->
<div id = "" class = "bigContent">

	<div class = "bigContentWrapper">
		<div class = "bigContentText">Kami menjual berbagai Produk Valve yang dapat digunakan dalam berbagai bidang kebutuhan. Valve kami mencakup bidang perminyakan, pipa bawah tanah, pipa permurnian, pipa proses DOW, pipa proses DOWN dan banyak valve lain. Jika anda ingin tahu lebih jelas anda bisa menghubungi kami di : 09123401234.
		</div>
		
		<div class = "bigContentProducts">
			<div class = "pieceProduct">
				<div class = "pieceProductImage">
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >Valve type b1216</font>
				</div>
			</div>
			
			<div class = "pieceProduct2">
				<div class = "pieceProductImage">
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >Valve type b1216</font>
				</div>
			</div>
			
			<div class = "pieceProduct2">
				<div class = "pieceProductImage">
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >Valve type b1216</font>
				</div>
			</div>
		
			<div class = "pieceProduct">
				<div class = "pieceProductImage">
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >Valve type b1216</font>
				</div>
			</div>
			
			<div class = "pieceProduct2">
				<div class = "pieceProductImage">
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >Valve type b1216</font>
				</div>
			</div>
			
			<div class = "pieceProduct2">
				<div class = "pieceProductImage">
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >Valve type b1216</font>
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
		$x = 1;
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
	</div>
</div>
<div id = "" class = "bigFooter"><br>Email : aquato@gmail.com // Telp : 021 234 405 // <?php 

if ( $x == 1){

		echo '	
      				<a class="admin_linkhref="index.php?admin=1">Login Admin</a>';	

}

?>
</div>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.topbar.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>