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
id			INT(20),
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
      $sql = "INSERT INTO posts VALUES('null','$title','$bodytext','$created')";
    	$res=mysql_query($sql);
      header("Location:index.php?admin=2");
      return $res;
    } else {
      return false;
    }
  }
		
		public function home() {
    include 'html/home.php';
	}
}
?>