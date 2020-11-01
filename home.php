<?php
/*
session_start();

if($_SESSION['login'] != true)
{
            header('login.php');
            exit;
}
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <main>
            <img id="homeimg" src="images/Stendenhome.jpg" alt="foto van de school">

                <div id="Hgrid">
                    <div id="Homeleft">
                        <h2 class="Homekopje">Latest News:</h2> 
                        <?php 
                            $feeds = array(
                            "https://www.nu.nl/rss/Tech",
                            "http://feeds.feedburner.com/tweakers/nieuws"
                            );
                            $entries = array();
                            foreach($feeds as $feed) {
                                $xml = simplexml_load_file($feed);
                                $entries = array_merge($entries, $xml->xpath("//item"));
                            }
                            usort($entries, function ($feed1, $feed2) {
                                return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
                            });
                        ?>
                        <div class="homenews">
                            <?php
                                //Print all the entries
                                $NUMITEMS   = 3;

                                $count = 0;
                                foreach($entries as $entry){
                            ?>
                            <div>
                                <div>
                                    <br>
                                    <h3 class="Honderkopje"><?= $entry->title ?></h3>
                                    <p id="homep"><?= strftime('%A %e %B %Y %R', strtotime($entry->pubDate))?></p>
                                    <p id="homep"><?= $entry->description ?></p>
                                    <a class="Hleesmeer" href="<?= $entry->link ?>">Read More</a>
                                    <hr>
                                </div>
                            </div>
                            <?php
                            if(++$count >= $NUMITEMS) break;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="Homeline"></div>
                   
                    <div id="Homemid">
                        <h5 class="Homekopje">Soon in agenda:</h5>
                        <?php 
                            $feeds = array(
                            "Article.xml"
                            );
                            $entries = array();
                        foreach($feeds as $feed) {
                            $xml = simplexml_load_file($feed);
                            $entries = array_merge($entries, $xml->xpath("//item"));
                        }
                        usort($entries, function ($feed1, $feed2) {
                            return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
                        });
                        ?>
                        <div class="homenews">
                        <?php
                        //Print all the entries
                        $NUMITEMS   = 3;

                        $count = 0;
                        foreach($entries as $entry){
                        ?>
                        <div>
                            <div>
                                <br>
                                <h3 class="Honderkopje"><?= $entry->title ?></h3>
                                <p id="homep"><?= strftime('%A %e %B %Y %R', strtotime($entry->pubDate)) ?></p>
                                <p id="homep"><?= $entry->description ?></p>
                                <a class="Hleesmeer" href="readblog.php?title=<?= $entry->title ?>">Read More</a>
                                <hr>
                            </div>
                        </div>
                        <?php
                        if(++$count >= $NUMITEMS) break;
                        }
                        ?>
                        </div>
                    </div>
            
                    <div id="FaQhome">
                        <h2 class="Homekopje">FAQ:</h2>
                        <ul id="homelist">
                            <li><a href="index.php?FAQ">How is NHL Stenden handeling the situation around Covid-19 virus?</a></li>
                            <li><br></li>
                            <li><a href="index.php?FAQ">Where can i order my books?</a></li>
                            <li><br></li>
                            <li><a href="index.php?FAQ">How can i see my schedule?</a></li>
                            <li><br></li>
                            <li><a href="index.php?FAQ">See more...</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>