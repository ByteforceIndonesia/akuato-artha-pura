<?php

	class cms {
		
		public function admin_login () {
			include_once 'html/admin_login.html';
		
		} 

		public function input_admin () {
    		include_once 'html/admin_form.html';
 		}
		
		
		public function home() {
    $q = "SELECT * FROM testDB ORDER BY created DESC LIMIT 3";
    $r = mysql_query($q);

   
      while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);

        $entry_display = <<<ENTRY_DISPLAY

    <div class="post">
    	<h2>
    		$title
    	</h2>
	    <p>
	      $bodytext
	    </p>
	</div>

ENTRY_DISPLAY;
      }

    return $entry_display;
  }
  
}
?>