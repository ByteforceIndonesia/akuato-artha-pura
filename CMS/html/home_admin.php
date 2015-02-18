<div id = "" class = "bigSlider" data-stellar-background-ratio="0.1">
	<div class="row"><div class="large-12 large-centered columns"><img src = "css/image/tes.png" width = "100%" /></div></div>
</div>
<div class="row" style = "position : relative;padding-bottom : 100px;">
	<div class="large-12 large-centered columns">
<div class="large-12 medium-10 small-8 small-centered medium-centered large-centered columns"><br><br><br>
<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('test') or die("Could not select database. " . mysql_error());


	$q = "SELECT * FROM posts ORDER BY id DESC LIMIT 10";
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
			<a href="index.php?p=$id">
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
			<a href="index.php?p=$id">
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
</div>
</div>