<?php

	class admin{
		var $username;
		var $password;
		
		public function admin_login() {
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

		public function input() {
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
		
	}
		
?>