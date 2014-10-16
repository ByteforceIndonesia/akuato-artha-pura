<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT. Akuato Artha </title>
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

	if (empty ($post) && empty ($cat) && empty ($admin))
	{
		echo 'home';	
	}elseif ( !empty ($post)){
		echo 'post';
	}elseif ( !empty ($cat)){
		echo 'catagories';
	}elseif ( !empty ($admin)){
		echo 'admin';
	}
?>
</body>
</html>