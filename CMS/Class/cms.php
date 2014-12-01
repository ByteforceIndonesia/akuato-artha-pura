<?php

	class cms {
		
		var $host;
  		var $username;
  		var $password;
  		var $table;
		
		public function admin_login () {
			include_once 'html/admin_login.php';
		
		} 

		public function input_admin () {
    		include_once 'html/admin_form.php';
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
cat			VARCHAR(150),
created		VARCHAR(100),
image		VARCHAR(250)
)
MySQL_QUERY;

    return mysql_query($sql);
  }
  
  		public function write() {
    if ( $_POST['title'] )
      $title = mysql_real_escape_string($_POST['title']);
    if ( $_POST['bodytext'])
      $bodytext = mysql_real_escape_string($_POST['bodytext']);
    if ( $_POST['cat'])
      $cat = mysql_real_escape_string($_POST['cat']);
	  
	  
	 //image2wbmp
	 
	 $target_dir = "/image/";
			
			$filetype = substr($_FILES["fileToUpload"]["name"], -4);
			$filename2 = date('mdyHms') . $filetype; 
			
			$target_file = $target_dir . $filename2;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			
			
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "File is valid, and was successfully uploaded.\n ";
				echo printf;
			} else {
				echo "Possible file upload attack!\n";
			}
	 
	 
	 
	 
	 
	 
	 
	 //image2wbmp
	  
	  
	  
	  
    if ( $title && $bodytext && $cat) {
      $created = time();
      $sql = "INSERT INTO posts VALUES('null','$title','$bodytext','$cat','$created', '$filename2')";
    	$res=mysql_query($sql);
		if (!$res) {
    die('Invalid query: ' . mysql_error());
}

      header("Location:index.php?admin=2&hehe=asdf");
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