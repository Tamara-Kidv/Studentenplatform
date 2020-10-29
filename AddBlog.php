<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="StyleSheet" href="Style1.css">
        <meta charset="UTF-8">
		<title>Add new post</title>
    </head>
    <body>
        <main>
		    <form method="post" id="addblogform" action="addblog.php" enctype="multipart/form-data">
                <div class="div1">
                    <select name="CategoryAB" required id="ABcategory">
                        <option value="" disabled selected>Select Category *</option>
                        <option value="News">News</option>
                        <option value="Corona">Corona</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Important">Important</option>
                    </select>
                    <label for="NameArticle">Title: *</label>
                    <input type="text" required id="NameArticle" placeholder="Input Title" name="titleAB" autocomplete="off" /><br>
                    <label for= "AddBlogdescription">Description *</label>
                    <textarea class="AddBlogdescription" required placeholder="Input text..." name="descriptionAB" maxlength="150"></textarea>
                    <label for= "AddBlogcontent">Content *</label>
                    <textarea class="AddBlogcontent" required placeholder="Input text..." name="contentAB" minlength="150"></textarea>
                    <label for="Image">insert image here</label>
                    <input type="file" name="image"/>
                    <?php
                    if(isset($_POST['submitpost']))
                    {
                        date_default_timezone_set('Europe/Amsterdam');
                        $date = date('d/m/y H:i');
                        if(isset($_FILES['image']['type']) && $_FILES['image']['type'] !== "") 
                        {
                            $uploads_dir ='Files';
                            $f_type = $_FILES['image']['type'];
                        
                            if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF")
                            {
                                $tmp_name = $_FILES["image"]["tmp_name"];
                                $TitleAB = str_replace(" ", "_", $_POST["titleAB"]);
                                $name = $TitleAB.'_'.basename($_FILES["image"]["name"]);
                                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                                $link = "$uploads_dir/$name";
                                $xml = simplexml_load_file('Article.xml');
                                $post = $xml->addChild('item', '');
                                $post->addChild('category', $_POST["CategoryAB"]);
                                $post->addchild('img', $link);
                                $post->addChild('title', $_POST["titleAB"]);
                                $post->addChild('pubDate', $date);
                                $post->addChild('description', $_POST["descriptionAB"]);
                                $post->addChild('content', $_POST['contentAB']);
                                $xml->saveXML("Article.xml");
                                header('Location: index.php?Blog', true, 301);
                                exit();
                            }
                            else
                            {
                                echo "error, verkeerd type bestand toegevoegd. De pagina wordt herladen binnen 3 seconden";
                                header('refresh: 3');
                            }
                        }
                        else
                        {
                            $xml = simplexml_load_file('Article.xml');
                            $post = $xml->addChild('item', '');
                            $post->addChild('category', $_POST["CategoryAB"]);
                            $post->addChild('title', $_POST["titleAB"]);
                            $post->addChild('pubDate', $date);
                            $post->addChild('description', $_POST["descriptionAB"]);
                            $post->addChild('content', $_POST['contentAB']);
                            $xml->saveXML("Article.xml");
                            header('Location: index.php?Blog', true, 301);
                            exit();
                        }
                    }
                    ?>
                    <div class="buttonsAB">
                        <button class="buttonwhite" type="reset">Reset</button>
                        <button class="buttonblue" type="submit" name="submitpost"><u>Submit</u></button>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>