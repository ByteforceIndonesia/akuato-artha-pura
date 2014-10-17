<?php

	class database 
	{
	
		public function connect_to_db ()
		{
			mysql_connect('localhost','root','') or die ('Error Connecting to Database'. mysql_error());
			mysql_select_db('test') or die ('Error Database'. mysql_error());
						   
			return $this->buildDB();
		}
		
		private function buildDB ()
		{
			$sql = "
			CREATE TABLE IF NOT EXIST cmsDB 
			(
				title VARCHAR (150),
				bodytext TEXT,
				created VARCHAR (100)
			);";
			
			return mysql_query($sql);
			
		}
		
		public function write_to_db ()
			{
			
			if ( $p = $_POST['title'] )
      			$title = mysql_real_escape_string($p = $_POST['title']);
    			if ( $p = $_POST['bodytext'])
      				$bodytext = mysql_real_escape_string($p = $_POST['bodytext']);
    				if ( $title && $bodytext ) {
      					$created = time();
      					$sql = "INSERT INTO cmsDB VALUES('$title','$bodytext','$created')";
      					mysql_query($sql);
      					
      					$success = <<<SUCCESS
      					<h1>success</h1>
SUCCESS;
      					return $success;
    		} 
    		
    		else 
    				{
    				$error = <<<SUCCESS
      					<h1>error</h1>
SUCCESS;
      					return $error;
    				}
		}
		
}