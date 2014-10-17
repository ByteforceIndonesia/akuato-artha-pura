<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. Akuato Artha </title>
<link rel="stylesheet" type="text/stylesheet" href="css/style.css">
</head>
<body>
<?php 
	
	if (!empty($_GET['admin'])) {
	$admin = $_GET['admin'];
	}elseif (!empty($_GET['p'])){
	$post = $_GET['p'];
	}elseif (!empty($_GET['cat'])){
	$cat = $_GET['cat'];
	}
	
	include_once('class/cms.php');
	include_once('class/input.php');
	
      $obj = new cms();
    

	if (empty ($post) && empty ($cat) && empty ($admin))
	{
		echo $obj->home();	
	}elseif ( !empty ($post)){
		echo 'post';
	}elseif ( !empty ($cat)){
		echo 'catagories';
	}elseif ( !empty ($admin)){
		if ( $admin == '1' ){
			session_start ();
			echo $obj->admin_login();
		}elseif ( $admin == '2' )
		{
			echo $obj->input_admin();
		}elseif ( $admin == '3')
		{
			$db = new database();
			
			$db->connect_to_db();
        	$db->write_to_db();
		}
	}
	
?>
</body>
</html>