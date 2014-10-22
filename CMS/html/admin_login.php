<html>
<head>
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/foundation.css">

<link rel="stylesheet" href="../css/app.css">
<body>
<div class="row">
	<div class="large-4 medium-3 small-1 columns"><br></div>
			<form action="class/login.php" method="post" data-abide>
			<div class="large-4 medium-6 small-10 columns form">
				<div>
      				<label for="username" class="">Username</label>
      				<input name="username" id="username" type="text" required pattern="alpha_numeric"/>
      			 	<small class="error">A valid Username is required.</small>
      			 </div>
      			 <div>
      				<label for="password" class="">Password</label>
      				<input name="password" id="password" class="" type="password" required/>
      				<small class="error">A valid password is required.</small>
      			</div>
      				<input type="submit" value="Login" class=" button" />
      		</div>
			</form>
	<div class="large-4 medium-3 small-1 columns"><br></div>
</div>
<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>
      $(document).foundation();
</script>
</body>
</html>