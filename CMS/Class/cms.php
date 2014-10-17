<?php

	class cms{
		
		public function admin_login () {
		
		return include ('html/admin_login.html');
		
		} 

		public function input_admin () {
    		return include ('html/admin_form.html');
 		}
		
		
		public function home () {
			$q = "SELECT * FROM cmsDB ORDER BY created DESC LIMIT 3";
    		$r = mysql_query($q);

   	 		if ( $r !== false && mysql_num_rows($r) > 0 ) {
      		while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);

        $entry_display = include("html/home.php");
      }
    } else {
      $entry_display = include("html/error.html");
    }
    return $entry_display;
		}
		
	}
?>