<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="StyleSheet" href="style.css">
        <meta charset="UTF-8">
        <title>Add new post</title>
    </head>
    <body>
    	<main id="AddBlog">

	        <form id="mylittleformy">
	        	<select name="Naam Docent" id="Ndocent">
	        		<option value=""disabled selected>Select Catagory *</option>
	        		<option value="Gerjan"></option>
	        		<option value="Winnie"></option>
	        		<option value="Rene"></option>
	        		<option value="Raymond"></option>
	        		<option value="Albert"></option>
	        		<option value="RobL"></option>
	        		<option value="Robs"></option>
	        		<option value="Jan"></option>
	        	</select><br>
	        	<label for="name article">Title: *</label><br>
	        	<input type="text" name="name article" placeholder="Input Title"><br>
	        	<label for= "AddBlog">Description *</label><br>
	        	<textarea class="AddBlog" placeholder="Input text..."></textarea>

	        	<button type="submit">Submit</button>
	        	<button type="reset">Reset</button>
	        	<?php
	        	

	        	?>
	    	</form>
    	</main>
    </body>
</html>