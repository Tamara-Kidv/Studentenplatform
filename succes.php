<?php
if (isset($_POST['submitpost'])) 
    {
        $xml = simplexml_load_file('Article.xml');
        $post = $xml->addChild('item', '');
        $post->addChild('category', $_POST["CategoryAB"]);
        $post->addChild('title', $_POST["titleAB"]);
        $post->addChild('description', $_POST["descriptionAB"]);
        $post->addChild('content', $_POST["ContentAB"]);
        print_r($xml);
        echo $xml->saveXML("Article.xml");     
        header("location: blog.php");

        if($_FILES['image'] !== NULL)
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
    }
    ?>