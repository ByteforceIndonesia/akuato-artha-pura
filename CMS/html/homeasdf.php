<html>
<body>
<div class="row">
        <div class="large-8 large-centered columns">
<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('cms') or die("Could not select database. " . mysql_error());


	$q = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
    $r = mysql_query($q);
    
    $display =<<<home
		<br>
home;

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
		  global $title, $bodytext,$id;
		$id = stripslashes ($a['id']);  
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);

        $display .= <<<home
     		<h1><a href="index.php?p=$id">$title</h1></a>
        	<p>$bodytext</p>
home;
      }
    } else {
      $display = include 'error.html';
    }
    

  echo $display; 
   
?>
</div>
</div>
</body>
</html>