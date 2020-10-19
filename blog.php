<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>        
        <?php
        //Feed URLs (selector hier?)
        $feeds = array(
            "https://www.nu.nl/rss/Tech",
            "blog.xml",
            "https://www.nu.nl/rss/Algemeen"
        );
        
        //Read each feed's items
        $entries = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $entries = array_merge($entries, $xml->xpath("//item"));
        }
        
        //Sort feed entries by pubDate
        usort($entries, function ($feed1, $feed2) {
            return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
        });
        
        ?>
        
        <div class="flexcontainer">
            <?php
            //Print all the entries
            foreach($entries as $entry){
                ?>
                <div>
                	<div>
	                    <h3><?= $entry->title ?></h3>
	                    <p><?= strftime('%A %e %B %Y %T', strtotime($entry->pubDate)) ?></p>
	                    <p><?= $entry->description ?></p>
	                    <a class="leesmeer" href="<?= $entry->link ?>">Lees Meer&gt;&gt;</a>
                	</div>
            	</div>
            <?php
        }
        ?>
        </ul>
    </body>
</html>
