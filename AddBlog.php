<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="StyleSheet" href="style.css">
        <meta charset="UTF-8">
        <title>Add new post</title>
    </head>
    <body>
    	<main id="JelleGay">

	        <form id="mylittleformy">
	        	<select name="Naam Docent" id="Ndocent">
	        		<option value="" disabled selected>Select Catagory *</option>
	        		<option value="Gerjan">1</option>
	        		<option value="Winnie">2</option>
	        		<option value="Rene">3</option>
	        		<option value="Raymond">4</option>
	        		<option value="Albert">5</option>
	        		<option value="RobL">6</option>
	        		<option value="Robs">7</option>
	        		<option value="Jan">8</option>
	        	</select><br>
	        	<label class="l1" for="NameArticle">Title: *</label><br>
	        	<input type="text" id="NameArticle" placeholder="Input Title"><br>
	        	<label class="l2" for= "AddBlog">Description *</label><br>
	        	<textarea class="AddBlog" id="AddBlog" placeholder="Input text..."></textarea>

	        	<div class="butt">
	        		<button class="white" type="reset">Reset</button>
	        		<button class="blue" type="submit">Add</button>
	        	</div>
	    	</form>
    	</main>
    </body>
</html>