<!DOCTYPE html>
<?php

if(isset($_POST['submit1']))

	if($_FILES['Image'] !== NULL)
	{
		$uploads_dir = 'Files';
		$f_type = $_FILES['Image']['type'];

				if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF")
				{
					$tmp_name = $_FILES["Image"]["tmp_name"];
					$name = $_POST["TitleAB"].'_'.basename($_FILES["Image"]["name"]);
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
				}
				else
				{
					echo "error, verkeerd type bestand toegevoegd";
					$_FILES['Image'] = NULL;
					header("AddBlog.php");
				}
	}


?>
<html lang="en">
    <head>
    	<link rel="StyleSheet" href="styleAddBlog.css">
        <meta charset="UTF-8">
		<title>Add new post | page 1</title>
    </head>
    <body>
    	<main class="addblog">
	        <form id="mylittleformy" action="AddBlogPost.php" method="post" enctype="multipart/form-data">
	        	<select name="CategoryAB" required id="ABcategory">
	        		<option value="" disabled selected>Select Category *</option>
	        		<option value="News">News</option>
	        		<option value="Corona">Corona</option>
	        		<option value="Events">Evenementen</option>
	        	</select>
	        	<label class="l1" for="NameArticle">Title: *</label>
	        	<input type="text" required id="NameArticle" placeholder="Input Title" name="titleAB" autocomplete="off"><br>
	        	<label class="l2" for= "AddBlog">Description *</label>
	        	<textarea class="AddBlog" required placeholder="Input text..." name="descriptionAB"></textarea>
				<label class="l3" for="Image">insert image here</label>
				<input type="file" name="Image" action="AddBlog.php">
	        	<div class="buttonsAB">
	        		<button class="whiteAB" type="reset">Reset</button>
	        		<button class="blueAB" type="submit" name="submit1">Next</button>
	        	</div>
	    	</form>
		</main>
    </body>
</html>