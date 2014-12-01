<html>
<body>
<div class="row">
        <div class="large-8 large-centered columns">
<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('cms') or die("Could not select database. " . mysql_error());
  
	$id=$post;

	$q = "SELECT * FROM posts WHERE id=$id";
    $r = mysql_query($q);
    
		$a = mysql_fetch_assoc($r);
		global $title, $cat,$id; 
        $title = stripslashes($a['title']);
        $cat = stripslashes($a['cat']);

        $display = <<<home
     		<h1>$cat</h1>
home;
   
   if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
		global $title, $cat,$id; 
        $title = stripslashes($a['title']);
        $cat = stripslashes($a['cat']);
        
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
<div class="row">
				<div class="large-4 columns"><br></div>
				<div class="large-4 columns"><br></div>
				<div class="large-4 columns">
				<p class="link">
      				<a href="index.php">Home</a>
      				<a href="index.php?admin=1">Login Admin</a>
				</p>
				</div>
</div>
</body>
</html>