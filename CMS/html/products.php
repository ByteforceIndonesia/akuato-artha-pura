<div id = "" class = "bigSlider">
<div class="row">
<div class="large-10 large-centered columns"><img src = "../css/image/header_profile.png" width = "100%" /></div></div></div>	
</div>

</div>
<!-- Start Index -->
<div class="row"style = "padding-bottom : 100px;">
        <div class="large-12 large-centered columns">

	<div class = "bigContentWrapper"><h1>Catalouge</h1>
		<div class = "bigContentText">Kami menjual berbagai Produk Instrument, Valve &fitting yang dapat digunakan dalam berbagai bidang kebutuhan. Instument dan Valve kami mencakup bidang industri, perminyakan, gas, prosesdan banyak valve lain. Jika anda ingin tahu lebih jelas anda bisa menghubungi kami di : +6281289232325 atau di 0214514951. 
		</div>
		<div class="row">
		<div class="large-12 medium-8 small-8 small-centered medium-centered large-centered columns">
			<br><BR><BR>
		<?php

	mysql_connect('localhost','k6958942_cmsuser','cmsuser') or die("Could not connect. " . mysql_error());
    mysql_select_db('k6958942_cmsre') or die("Could not select database. " . mysql_error());


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