<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Blog</h1>
        
            <?php
            //Code die ik zeker zelf gemaakt heb!
                $xml=("https://www.nu.nl/rss/Tech");
/*              $xml=("blog.xml");*/
                $xmlDoc = new DOMDocument();
                $xmlDoc->load($xml);
                //get elements from "<channel>"
                $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
                $channel_title = $channel->getElementsByTagName('title')
                ->item(0)->childNodes->item(0)->nodeValue;
                $channel_link = $channel->getElementsByTagName('link')
                ->item(0)->childNodes->item(0)->nodeValue;
                $channel_desc = $channel->getElementsByTagName('description')
                ->item(0)->childNodes->item(0)->nodeValue;
                //output elements from "<channel>"
                echo("<p><a href='" . $channel_link
                  . "'>" . $channel_title . "</a>");
                echo("<br>");
                echo($channel_desc . "</p>");
                //get and output "<item>" elements
                $x=$xmlDoc->getElementsByTagName('item');
                echo '<div id="flexcontainer">';
                for ($i=0; $i<20; $i++) {
                    echo "<div>";
                    $item_title=$x->item($i)->getElementsByTagName('title')
                    ->item(0)->childNodes->item(0)->nodeValue;
                    $item_category=$x->item($i)->getElementsByTagName('category')
                    ->item(0)->childNodes->item(0)->nodeValue;
                    $item_link=$x->item($i)->getElementsByTagName('link')
                    ->item(0)->childNodes->item(0)->nodeValue;
                    $item_desc=$x->item($i)->getElementsByTagName('description')
                    ->item(0)->childNodes->item(0)->nodeValue;
                    echo ("<p><a href='" . $item_link
                    . "'>" . $item_title . "</a>");
                    echo ("<br>");
                    echo ($item_desc . "</p>");
                    echo ("<br>");
                    echo ($item_category . "</p>");
                    echo "</div>";
                }
                echo "</div>"

                
                


                
            ?>
        </div>
    </body>
</html>
