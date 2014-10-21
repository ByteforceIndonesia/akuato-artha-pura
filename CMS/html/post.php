<html>
<body>
<div class="row">
        <div class="large-4 large-centered columns">
<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('cms') or die("Could not select database. " . mysql_error());

	$id=$post;

	$q = "SELECT * FROM posts WHERE id=$id";
    $r = mysql_query($q);
    
		$a = mysql_fetch_assoc($r);
		global $title, $bodytext,$id; 
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);

        $display = <<<home
     		<h1>$title</h1>
        	<p>$bodytext</p>
home;


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