<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="StyleSheet" href="style.css">
        <meta charset="UTF-8">
        <title>Add new post | page 1</title>
    </head>
    <body>
    	<main class="addblog">

	        <form id="mylittleformy" action="AddBlogPost.php" method="post">
	        	<select name="CategoryAB" required id="ABcategory">
	        		<option value="" disabled selected>Select Category *</option>
	        		<option value="News">News</option>
	        		<option value="Corona">Corona</option>
	        		<option value="Events">Evenementen</option>
	        	</select><br>
	        	<label class="l1" for="NameArticle">Title: *</label><br>
	        	<input type="text" required id="NameArticle" placeholder="Input Title" name="titleAB" autocomplete="off"><br>
	        	<label class="l2" for= "AddBlog">Description *</label><br>
	        	<textarea class="AddBlog" required id="AddBlog" placeholder="Input text..." name="descriptionAB"></textarea>

	        	<div class="buttonsAB">
	        		<button class="whiteAB" type="reset">Reset</button>
	        		<button class="blueAB" type="submit" name="submit">Next</button>
	        	</div>
	    	</form>
		</main>
		<?php
		if(isset($_REQUEST["submit"]))
		{
			$xml = new DOMDocument("1.0", "UTF-8");
			$xml->load("article.xml");
			$rootTag = $xml->GetElementsByTagName("document")->item(0);
			$dataTag = $xml->createElement("data");
			$categoryTag = $xml->createElement("Category",$_REQUEST["CategoryAB"]);
			$titleTag = $xml->createElement("Title",$_REQUEST["titleAB"]);
			$descriptionTag = $xml->createElement("Description", $_REQUEST["descriptionAB"]);

			$dataTag->appendChild($categoryTag, $titleTag, $descriptionTag);
			$rootTag->appendChild($dataTag);
			$xml->save("article.xml");
		}


		?>
    </body>
</html>