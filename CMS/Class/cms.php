<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Simple CMS</title>
</head>
<body>
<?php

	class cms{
		var $host;
		var $username;
		var $password;
		var $table;
		
		public function display_public () {
			//For Public Display
		}
		
		public function display_admin () {
			//For Admin Display
		}
		
		public function write ()
		{
			//For Writing Into Posts
		}
		
		public function connect ()
		{
			mysql_connect($this->host,$this->username,$this->password) or die ('Error Connecting to Database'. mysql_error());
			mysql_select_db($this->table) or die ('Error Database'. mysql_error());
			
			return $this->buildDB();
		}
		
		private function buildDB ()
		{
			$sql = 
			"CREATE TABLE IF NOT EXIST cmsDB 
			(
				title VARCHAR (150),
				bodytext TEXT,
				created VARCHAR (100)
			)";
			
			return mysql_query($sql);
		}
		
	}
?>
</body>
</html>