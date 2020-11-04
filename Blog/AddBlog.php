<?php 
if(isset($_SESSION['email']))
{
if($_SESSION['userlevel'] !== 'docent')
{
header('Location: index.php?Blog', true, 301);
exit;
}
}
?>
<form method="post" id="addblogform" action="Blog/Addblog.php" enctype="multipart/form-data">
    <div class="addblogdiv">
        <select name="CategoryAB" required id="ABcategory">
            <option value="" disabled selected>Select Category *</option>
            <option value="News">News</option>
            <option value="Corona">Corona</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Important">Important</option>
        </select>
        <label for="NameArticle">Title: *</label>
        <input type="text" required id="NameArticle" placeholder="Input Title" name="titleAB" autocomplete="off" maxlength="75"><br>
        <label for= "AddBlogdescription">Description *</label>
        <textarea id="AddBlogdescription" required placeholder="Input text..." name="descriptionAB" maxlength="200"></textarea>
        <label for= "AddBlogcontent">Content *</label>
        <textarea id="AddBlogcontent" required placeholder="Input text..." name="contentAB" minlength="200"></textarea>
        <label for="Image">insert image here</label>
        <input id="Image" type="file" name="image"/>
        
        <?php
        if(isset($_POST['submitpost']))
        {   
            date_default_timezone_set('Europe/Amsterdam');
            $date = date('d-m-Y H:i'); //Sets time and date
            if(isset($_FILES['image']['type']) && $_FILES['image']['type'] !== "") //Checks if there is an Image, then puts all inputs in an XML file.
            {   
                $uploads_dir ='Files';
                $f_type = $_FILES['image']['type'];
            
                if ($f_type== "image/gif" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/GIF")
                {
                    $tmp_name = $_FILES["image"]["tmp_name"];
                    $TitleAB = str_replace(" ", "_", $_POST["titleAB"]);
                    $name = $TitleAB.'_'.str_replace(basename($_FILES["image"]["name"]));
                    move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    $link = "$uploads_dir/$name";
                    $xml = simplexml_load_file("../include/XML/Article.xml");
                    $post = $xml->addChild('item', '');
                    $post->addChild('category', $_POST["CategoryAB"]);
                    $post->addchild('img', $link);
                    $post->addChild('title', $_POST["titleAB"]);
                    $post->addChild('pubDate', $date);
                    $post->addChild('description', $_POST["descriptionAB"]);
                    $post->addChild('content', $_POST['contentAB']);
                    $xml->saveXML("../include/XML/Article.xml");
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
                $xml = simplexml_load_file("../include/XML/Article.xml");
                $post = $xml->addChild('item', '');
                $post->addChild('category', $_POST["CategoryAB"]);
                $post->addChild('title', $_POST["titleAB"]);
                $post->addChild('pubDate', $date);
                $post->addChild('description', $_POST["descriptionAB"]);
                $post->addChild('content', $_POST['contentAB']);
                $xml->saveXML("../include/XML/Article.xml");
                header('Location: ../index.php?Blog', true, 301);
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
