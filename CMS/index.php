<?php

ob_start();
$ifhp = ": Best Instrument, Valve, & Fitting Provider";

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="js/vendor/jquery.js"></script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    
    
<link rel="stylesheet" href="css/nday.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/app.css">

<!-- made by www.metatags.org -->
<meta name="description" content="PT Akuato Artha Pura Hadir untuk menjawab kebutuhan pasar industri dalam bidang valve, Fitting, juga meng-instrumentasikannya." />
<meta name="keywords" content="Akuato, Akuato Artha, Valve, Fitting, Pneumatic, Pump, Hydrolic Pump, Actuator, Indonesia, Transmitter, Frans Theda, Swagelok, Haskel, Daniel Orifice, Fisher, Nuflo Flow Meter, Bettis Pneumatic Actuator, Solenoid Valve, Asco, Ascroft" />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title><?php $pseudotitle = "PT Akuato Artha Pura";echo $pseudotitle;?></title>
<!-- Akuato, Valve, Fitting -->
<link rel="shortcut icon" href="image/favicon.ico">
<script src="js/vendor/modernizr.js"></script>
</head>
<body>

<div itemscope itemtype="http://schema.org/Organization" style = "display : none;">
  <div itemprop="legalName">PT Akuato Artha Pura</div>
  <div itemprop="founder">Frans Theda</div>
  <div itemprop="location">Jakarta, Indonesia</div>
  <div itemprop="url">akuato.com</div>
  <span itemprop="description">Perusahaan yang bergerak dalam bidang Instrument, Valve & Fitting.</span>


  <div itemprop="telephone">+6221 451 4951</div>

<img src = "image/logo.jpg"itemprop = "logo"></img>
  <div itemprop="makesOffer">Instrument, Valve, & Fitting</div>
<div itemprop = "brand">Ascroft, Asco Valve, Bettis, Daniel Orifice, Gate Valve, Globe Valve</div>
</div>


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
    </ul>
  </section>

</nav>
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
      	$obj->username = 'k6958942_cmsuser';
      	$obj->password = 'cmsuser';
      	$obj->table = 'k6958942_cmsre';
		
		$obj->connect();

	if (empty ($post) && empty ($cat) && empty ($admin) && empty ($contact) && empty ($company))
	{
		echo $obj->home();
			
	}elseif ( !empty ($post)){
		
		include 'html/post.php';
		$titleadd = $title . " | ";
		$ifhp = "";
	}elseif ( !empty ($cat)){
	
		include 'html/products.php';
		$titleadd ="Catalouge Instrument, Valve, & Fitting | ";
		$ifhp = "";
	}elseif ( !empty ($admin)){
	
		if ( $admin == '1' ){
			
			session_start ();
			echo $obj->admin_login();
			
		}elseif ( $admin == '2' ){
		
			session_start ();
			echo $obj->admin_logout();
		
		}
			
	}elseif ( !empty ($company)){
		
		include 'html/company-profile.php';
$titleadd = "Company Profile" . " | ";
		$ifhp = "";
		
	}elseif ( !empty ($contact)){
		
		include 'html/contact.php';
$titleadd = "Contact" . " | ";
		$ifhp = "";

		
	}
?>
</div>
<div id = "" class = "bigFooter"><div class="row">Email : sales@akuato.com // Telp : +6221 451 4951 // 
<a class="admin_link" href="index.php?admin=1">Login Admin</a></div>
</div>

  <!-- Other JS plugins can be included here -->

  <script>
    $(document).foundation();
   
   $(window).stellar();
  </script>
</body>
</html>


<?

$buffer = ob_get_contents();
ob_end_clean();

$buffer=str_replace("PT Akuato Artha Pura",$titleadd . "PT Akuato Artha Pura" . $ifhp,$buffer);

ob_end_clean();
echo $buffer;

?>