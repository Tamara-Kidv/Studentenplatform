<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="StyleSheet" href="style1.css">
        <meta charset="UTF-8">
		<title>Add new post | page 1</title>
    </head>
    <body>
        <main id="addblogmain">
		    <form method="post" id="addblogform" action="addblog1.php" enctype="multipart/form-data">
                <div class="div1">
                <select name="CategoryAB" required id="ABcategory">
                    <option value="" disabled selected>Select Category *</option>
                    <option value="News">News</option>
                    <option value="Corona">Corona</option>
                    <option value="Events">Evenementen</option>
                </select>
                <label for="NameArticle">Title: *</label>
				<input type="text" required id="NameArticle" placeholder="Input Title" name="titleAB" autocomplete="off" /><br>
                <label for= "AddBlog">Description *</label>
				<textarea class="AddBlog" required placeholder="Input text..." name="descriptionAB"></textarea>
				<label for="Image">insert image here</label>
                <input type="file" name="image"/>
                <?php

                if(isset($_FILES['image']) && $_FILES !== NULL) 
                {
                    $uploads_dir = 'Files';
                    $f_type = $_FILES['image']['type'];
                
                    if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF")
                    {
                        $tmp_name = $_FILES["image"]["tmp_name"];
                        $name = $_POST["TitleAB"].'_'.basename($_FILES["image"]["name"]);
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    }
                    else
                    {
                        echo "error, verkeerd type bestand toegevoegd";
                    }
                }
                ?>
                </div>
                <div class="div2">
                    <h1 class="h1AB">Content Article</h1>
                    <textarea class="div2txt"name="ContentAB" required placeholder="Please enter the content of your article here..."></textarea>
                    <div class="buttonsAB">
                        <button class="buttonwhite" type="reset">Reset</button>
                        <button class="buttonblue" type="submit" name="submitpost"><u>Submit</u></button>
                    </div>
				</div>
            </form>
        </main>
    </body>
</html>

<?php
if (isset($_POST['submitpost'])) 
{
    $xml = simplexml_load_file('Article.xml');
    $post = $xml->addChild('item', '');
    $post->addChild('category', $_REQUEST["CategoryAB"]);
    $post->addChild('title', $_REQUEST["titleAB"]);
    $post->addChild('description', $_REQUEST["descriptionAB"]);
    $post->addChild('content', $_REQUEST["ContentAB"]);
    print_r($xml);
    echo $xml->saveXML("Article.xml");     
    header("blog.php");
}