<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <title>Simple CMS with PHP</title>
    
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
  	<div id="page-wrap">
    <?php
    
      include_once('class/cms.php');
      $obj = new cms();

	  /* CHANGE THESE SETTINGS FOR YOUR OWN DATABASE */
      $obj->host = 'localhost';
      $obj->username = 'root';
      $obj->password = '';
      $obj->table = 'test';
      $obj->connect();
    
      if ( $_POST )
        $obj->write($_POST);
    
      echo ( isset ($_GET['admin'] )) ? $obj->display_admin() : $obj->display_public();
    
    ?>
	</div>
  </body>

</html>