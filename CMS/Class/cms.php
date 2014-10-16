<?php

	class cms{
	
		var $host;
		var $username;
		var $password;
		var $table;
	
		public function connect ()
		{
			mysql_connect($this->host,$this->username,$this->password) or die ('Error Connecting to Database'. mysql_error());
			mysql_select_db($this->table) or die ('Error Database'. mysql_error());
			
			return $this->buildDB();
		}
		
		private function buildDB ()
		{
			$sql = <<<MySQL_QUERY
			CREATE TABLE IF NOT EXIST cmsDB 
			(
				title VARCHAR (150),
				bodytext TEXT,
				created VARCHAR (100)
			);
MySQL_QUERY;
			
			return mysql_query($sql);
			
		}
		
		public function admin_login () {
		session_start ();
		
		return<<<ADMIN_LOGIN
	
		<form action="{$_SERVER['PHP_SELF']}" method="post">
      				<label for="username">Username</label>
      				<input name="username" id="username" type="text"/>
      				<label for="password">Password</label>
      				<input name="password" id="password" type="text"/>
      				<input type="submit" value="Login" />
    	</form>
ADMIN_LOGIN;

		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		
		} 

		public function input_admin () {
    		return <<<ADMIN_FORM

    			<form action="{$_SERVER['PHP_SELF']}" method="post">
      				<label for="title">Title:</label>
      				<input name="title" id="title" type="text" maxlength="150" />
      				<label for="bodytext">Body Text:</label>
      				<textarea name="bodytext" id="bodytext"></textarea>
					<label for="image">Image</label>
      				<input type="submit" value="Create This Entry!" />
    			</form>

ADMIN_FORM;
 		}
		
		public function write ()
			{
			if ( $p['title'] )
      			$title = mysql_real_escape_string($p['title']);
    			if ( $p['bodytext'])
      				$bodytext = mysql_real_escape_string($p['bodytext']);
    				if ( $title && $bodytext ) {
      					$created = time();
      					$sql = "INSERT INTO testDB VALUES('$title','$bodytext','$created')";
      					return mysql_query($sql);
    		} 
    		
    		else 
    				{
      					return false;
    				}
		}
		
		public function display_public () {
			$q = "SELECT * FROM testDB ORDER BY created DESC LIMIT 3";
    		$r = mysql_query($q);

   	 		if ( $r !== false && mysql_num_rows($r) > 0 ) {
      		while ( $a = mysql_fetch_assoc($r) ) {
        $title = stripslashes($a['title']);
        $bodytext = stripslashes($a['bodytext']);

        $entry_display .= <<<ENTRY_DISPLAY

    <h2>$title</h2>
    <p>
      $bodytext
    </p>

ENTRY_DISPLAY;
      }
    } else {
      $entry_display = <<<ENTRY_DISPLAY

    <h2>This Page Is Under Construction</h2>
    <p>
      No entries have been made on this page. 
      Please check back soon, or click the
      link below to add an entry!
    </p>

ENTRY_DISPLAY;
    }
    $entry_display .= <<<ADMIN_OPTION

    <p class="admin_link">
      <a href="{$_SERVER['PHP_SELF']}?admin=1">Login Admin</a>
    </p>

ADMIN_OPTION;

    return $entry_display;
		}
		
	}
?>