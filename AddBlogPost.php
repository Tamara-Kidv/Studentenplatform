<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="StyleSheet" href="style.css">
        <meta charset="UTF-8">
        <title>Add new post | page 2</title>
    </head>

    <body>
        <?php
            if(isset($_REQUEST["submit"]))
            {
                $xml = new DOMDocument("1.0", "UTF-8");
                $xml->load("article.xml");

                $rootTag = $xml->getElementsByTagName("document")->item(0);

                $dataTag = $xml->createElement("data");
                $categoryTag = $xml->createElement("Category",$_REQUEST["CategoryAB"]);
                $titleTag = $xml->createElement("Title",$_REQUEST["titleAB"]);
                $descriptionTag = $xml->createElement("Description", $_REQUEST["descriptionAB"]);

                $dataTag->appendChild($categoryTag);
                $dataTag->appendChild($titleTag);
                $dataTag->appendChild($descriptionTag);
                $rootTag->appendChild($dataTag);

                $xml->save("article.xml");
            }
        ?>
        <main id="BlogPost">
            <details id="DetailsAB">
                <summary>Summary</summary>
                <p><b>Category:</b><br><?php echo $_POST["CategoryAB"]; ?></p>
                <p><b>Title:</b><br><?php echo $_POST["titleAB"]; ?></p>
                <p><b>Description:</b><br><?php echo $_POST["descriptionAB"]; ?></p>
            </details>       
            <content id="ArtikelContent">
                <h1 class="h1AB">Content Article</h1>
                <form action="AddBlog.php" method="post">
                    <textarea name="ContentAB" required id="txtAC" placeholder="Please enter the content of your article here..."></textarea>

                    <div class="buttonsAB">
                        <button class="whiteAB" type="reset">Reset</button>
                        <button class="blueAB" type="submit" name="submit"><u>Submit</u></button>
                    </div>
                </form>
            </content>
        </main>
    </body>
</html>

