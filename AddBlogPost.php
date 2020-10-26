<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="StyleSheet" href="styleAddBlog.css">
        <meta charset="UTF-8">
        <title>Add new post | page 2</title>
    </head>
    <body>
        <?php
        /**
         * @author Tim Gels <tim.gels@student.nhlstenden.com> helped :D.
         */
        if (isset($_POST['submit2'])) {
            $xml = simplexml_load_file('Article.xml');
            $post = $xml->addChild('item', '');
            $post->addChild('category', $_REQUEST["CategoryAB"]);
            $post->addChild('title', $_REQUEST["titleAB"]);
            $post->addChild('description', $_REQUEST["descriptionAB"]);
            $post->addChild('content', $_REQUEST["ContentAB"]);
            print_r($xml);
            echo $xml->saveXML("Article.xml");     
            header("Location: AddBlog.php");
        }
        ?>
        <details id="DetailsAB">
                <summary>Summary</summary>
                <p><b>Category:</b><br><?php echo $_POST["CategoryAB"]; ?></p>
                <p><b>Title:</b><br><?php echo $_POST["titleAB"]; ?></p>
                <p><b>Description:</b><br><?php echo $_POST["descriptionAB"]; ?></p>
         </details>
        <main id="BlogPost">
            <content id="ArtikelContent">
                <h1 class="h1AB">Content Article</h1>
                <form method="post">
                    <textarea name="ContentAB" required id="txtAC" placeholder="Please enter the content of your article here..."></textarea>
                    <div class="buttonsAB">
                        <button class="whiteAB" type="reset">Reset</button>
                        <button class="blueAB" type="submit" name="submit2"><u>Submit</u></button>
                    </div>
                </form>
            </content>
        </main>
    </body>
</html>