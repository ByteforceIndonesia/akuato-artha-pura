<!-- Start Index -->
		<div class="row">
		<div class="large-12 medium-8 small-8 small-centered medium-centered large-centered columns">
			<br><BR><BR>
		<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('test') or die("Could not select database. " . mysql_error());


	$q = "SELECT * FROM posts ORDER BY id";
    $r = mysql_query($q);
    
    $display =<<<home
		<br>
home;

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      $pieceProduct = 3;
	  while ( $a = mysql_fetch_assoc($r) ) {
		  global $title, $bodytext,$id, $boximage;
		$id = stripslashes ($a['id']);  
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);
        $boximage = stripslashes($a['image']);

		
		
		if(($pieceProduct % 3) == 0){
		
        $display .= <<<home
			<a href="admin.php?p=$id">
     		<div class = "large-4 columns">
				<div class = "pieceProductImage">
					<img src = "image/$boximage" width = "100%" height = "300px"/>
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >$title</font>
				</div>
			</div>
			</a>
home;

		} else {
	
        $display .= <<<home
			<a href="admin.php?p=$id">
     		<div class = "large-4 columns">
				<div class = "pieceProductImage">
					<img src = "image/$boximage" width = "100%" height = "300px"/>
				</div>
				<div class = "pieceProductTitle"><font id = "pieceTitle" >$title</font>
				</div>
			</div>	
			</a>
home;
		}
		
		$pieceProduct++;

      }
    } else {
      $display = include 'error.html';
    }
    
  echo $display; 
   
?>
<br><BR><br><BR><br><BR>

	</div>
	</div>
</div>
<br><BR><br><BR>
</div>
<br><BR>
</div>
</body>
</html>