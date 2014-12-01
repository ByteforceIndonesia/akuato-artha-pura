
<div id = "" class = "bigSlider">
<div class="row">
	<div id="" class="textSlider">Catalog</div>		
</div>

</div>
<!-- Start Index -->
<div class="row">
        <div class="large-8 large-centered columns">
<div id = "" class = "bigContent">

	<div class = "bigContentWrapper">
		<div class = "bigContentText">Kami menjual berbagai Produk Valve yang dapat digunakan dalam berbagai bidang kebutuhan. Valve kami mencakup bidang perminyakan, pipa bawah tanah, pipa permurnian, pipa proses DOW, pipa proses DOWN dan banyak valve lain. Jika anda ingin tahu lebih jelas anda bisa menghubungi kami di : 09123401234.
		</div>
		
		<div class = "bigContentProducts">
			
		<?php

	mysql_connect('localhost','root','') or die("Could not connect. " . mysql_error());
    mysql_select_db('cms') or die("Could not select database. " . mysql_error());


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
     		<div class = "pieceProduct">
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
     		<div class = "pieceProduct2">
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
</div>
</div>
</body>
</html>