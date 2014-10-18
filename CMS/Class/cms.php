<?php

	class cms {
		
		var $host;
  		var $username;
  		var $password;
  		var $table;
		
		public function admin_login () {
			include_once 'html/admin_login.html';
		
		} 

		public function input_admin () {
    		include_once 'html/admin_form.html';
 		}
		
		public function connect() {
    mysql_connect($this->host,$this->username,$this->password) or die("Could not connect. " . mysql_error());
    mysql_select_db($this->table) or die("Could not select database. " . mysql_error());

    return $this->buildDB();
  }

  private function buildDB() {
    $sql = <<<MySQL_QUERY
CREATE TABLE IF NOT EXISTS posts (
title		VARCHAR(150),
bodytext	TEXT,
created		VARCHAR(100)
)
MySQL_QUERY;

    return mysql_query($sql);
  }
  
  		public function write() {
    if ( $_POST['title'] )
      $title = mysql_real_escape_string($_POST['title']);
    if ( $_POST['bodytext'])
      $bodytext = mysql_real_escape_string($_POST['bodytext']);
    if ( $title && $bodytext ) {
      $created = time();
      $sql = "INSERT INTO posts VALUES('$title','$bodytext','$created')";
      return mysql_query($sql);
    } else {
      return false;
    }
  }
		
		public function home() {
    $q = "SELECT * FROM posts ORDER BY created DESC LIMIT 3";
    $r = mysql_query($q);

    if ( $r !== false && mysql_num_rows($r) > 0 ) {
      while ( $a = mysql_fetch_assoc($r) ) {
		  global $title, $bodytext;
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);

        $display = include 'html/home.php';
      }
    } else {
      $display = include 'html/error.html';
    }

   $display;
  }
  
}
?>