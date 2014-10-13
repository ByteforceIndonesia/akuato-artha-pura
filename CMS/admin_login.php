<?php

	class admin{
		
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
		
	}
?>