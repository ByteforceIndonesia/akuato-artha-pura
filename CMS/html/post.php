<html>
<body>
<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('cms') or die("Could not select database. " . mysql_error());

	$id=$post;

	$q = "SELECT * FROM posts WHERE id=$id";
    $r = mysql_query($q);
    
		$a = mysql_fetch_assoc($r);
		global $title, $bodytext,$id,$cat; 
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
        $cat = stripslashes($a['cat']);
        $image = stripslashes($a['image']);

        $display = <<<home
     		<h1>$title</h1>
     		<h3>Category : $cat</h3>
        	<img src = "image/$image" width = "400px" height = "400px" class = "paragraphImage"/>
			<p>$bodytext</p>
home;
   
?>

<div class = "contentWrapper">
	<div class = "contentImage"><img src = "image/<?php echo $image ?>" width = "400px" height = "400px" class = "paragraphImage"/>
	</div>
	<div class = "contentSpecs">
	<h1><?php echo $title ?></h1>
     <h3>Category : <?php echo $cat ?></h3>
	</div>
	<div class = "contentDesc"><?php echo $bodytext ?>
	</div>

			
</div>
</body>
</html>