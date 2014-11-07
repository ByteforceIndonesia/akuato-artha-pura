<html>
<head>


</head>
<body>
<div class="row form">
<div class="large-6 medium-6 small-10 large-centered medium-centered small-centered columns">
		<form action="index.php?admin=3" method="post" align="left" enctype="multipart/form-data" data-abide> 
		<div class="row collapse">
			<div class="large-2 small-3 columns">
      			<span class="prefix ">Title:</span></div>
      			<div class="large-10 small-9 columns">
      			<input name="title" id="title" type="text" maxlength="150" required/>
      			 <small class="error">A valid title is required.</small></div>
      			 <div>
      			<label for="bodytext">Bodytext :<br>
      			<textarea name="bodytext" id="bodytext" required></textarea></label>
      			 <small class="error">A valid bodytext is required.</small>
      			 </div>
				 
				 <div name = "insImageFr" id = "insImageFr">
				 <input name = "fileToUpload" id = "insImage" type = "file" ></input>
				
				 </div>
				
				<label for="catagories">Catagory:
					<input type="checkbox" name="cat" value="valve">Valve<br>
					<input type="checkbox" name="cat" value="test">test<br>
					
				</label>
      			<input type="submit" name = "submit" value="Create This Entry!" class="button"  />
    	</form>
    			<p class="admin_link">
      					<a href="class/logout.php">Logout</a>
    			</p>
<div class="row collapse">
</div>
</div>
</body>
</html>