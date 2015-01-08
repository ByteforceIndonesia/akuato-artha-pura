<div id = "" class = "bigSlider" >
	<div class="row"><div class="large-12 large-centered columns"><img src = "../css/image/tes.png" width = "100%" /></div></div>
</div>
<div class="row" style = "position : relative;padding-bottom : 100px;">
	<div class="large-12 large-centered columns">
<div class = "fronttext" style = "width : 100%; font-size : 24px; top : 50px; position : relative;"><br>PT Akuato adalah perusahaan yang bergerak dalam bidang instument, valve, & fitting yang muncul dari hati seorang pengusaha yang sudah berpengalaman selama 7 tahun dalam bidangnya. PT. Akuato Hadir untuk menjawab kebutuhan pasar industri, perminyakan, dan gas, dalam bidang instument, valve, & fitting.

PT Akuato menjual berbagai macam instrument, valve, & fitting berkualitas tinggi dari brand-brand terkemuka. Selain menjual, PT Akuato juga melayani pemasangan instrument, valve, & fitting, termasuk rental penyewaan instrument, fitting & jasa hydrotesting.</div>
</div><br><br><br>
<div class="large-12 medium-10 small-8 small-centered medium-centered large-centered columns"><br><br><br>
<?php

	mysql_connect('localhost','k6958942_cmsuser','cmsuser') or die("Could not connect. " . mysql_error());
    mysql_select_db('k6958942_cmsre') or die("Could not select database. " . mysql_error());


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