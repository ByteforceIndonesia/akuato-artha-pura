<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('cms') or die("Could not select database. " . mysql_error());


	$q = "SELECT * FROM posts ORDER BY created DESC LIMIT 3";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
		  global $title, $bodytext;
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
		
        $display = <<<home
     	<h1>$title</h1>
        <p>$bodytext</p>
home;
      }
    } else {
      $display = include 'error.html';
    }

  echo $display; 
   
?>