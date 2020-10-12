<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="StyleSheet" href="style.css">
        <meta charset="UTF-8">
        <title>Add new post | page 2</title>
    </head>

    <body>
        <main id="BlogPost">
            <details id="DetailsAB">
                <summary>Summary</summary>
                <p><b>Category:</b><br><?php echo $_POST["CategoryAB"]; ?></p>
                <p><b>Title:</b><br><?php echo $_POST["titleAB"]; ?></p>
                <p><b>Description:</b><br><?php echo $_POST["descriptionAB"]; ?></p>
            </details>       
            <content id="ArtikelContent">
                <h1 class="h1AB">Content Article</h1>
                <form action="AddBlogPost.php" method="post">
                    <textarea required id="txtAC" placeholder="Please enter the content of your article here..." name="contentAB"></textarea>

                    <div class="buttonsAB">
                        <button class="whiteAB" type="reset">Reset</button>
                        <button class="blueAB" type="submit" name="submit2"><u>Submit</u></button>
                    </div>
                </form>
            </content>
        </main>
        <?php
        if(isset($_REQUEST["submit2"]))
        {
            $xml = new DOMDocument("1.0", "UTF-8");
            $xml->load("article.xml");

            $rootTag = $xml->GetElementsByTagName("document")->item(0);

            $DTag = $xml->createElement("DataDescription");
            $categoryTag = $xml->createElement("Category",$_REQUEST["CategoryAB"]);
			$titleTag = $xml->createElement("Title",$_REQUEST["titleAB"]);
			$descriptionTag = $xml->createElement("Description", $_REQUEST["descriptionAB"]);
            $contentTag = $xml->createElement("Content", $_REQUEST["contentAB"]);

            $DTag->appendChild($contentTag);
            $rootTag->appendChild($DTag);

            $xml->save("Article.xml");
        }
        ?>
    </body>
</html>

