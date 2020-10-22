<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- Check what feed is selected, and if none is set, load "everything" -->
        <?php
            if(isset($_POST["submitblogfeed"])) {
                $selectedfeed = $_POST['blogselector'];
            }
        ?>        
        <?php
        //default feed
            if (empty($selectedfeed)) {
            $selectedfeed = "everything";
       }

        if ( $selectedfeed == "everything" ) {
            $feeds = array(
            "https://www.nu.nl/rss/Tech",
            "blog.xml",
            "http://feeds.feedburner.com/tweakers/nieuws"
        );
        //rest of the feeds, replace with proper xml files later
        }
        else if ($selectedfeed == "tweakers") {
            $feeds = array(
            "http://feeds.feedburner.com/tweakers/nieuws"
        );
        }
        else if ($selectedfeed == "nu") {
            $feeds = array(
            "https://www.nu.nl/rss/Tech"
        );
        }
        else if ($selectedfeed == "blog") {
            $feeds = array(
            "blog.xml"
        );
        }
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
        <div class="blogcontent">
            <div class="selectorcontainer">
            	<p>Selecteer feed:</p>
            	<form action="blog.php" method="post"> 
    	        	<select name="blogselector">
    	        		<option value="everything">Everything</option>
                       <!--  not yet implemented options
    	        		<option value="news">News</option>
    	        		<option value="important">Important</option>
                        <option value="entertaining">Entertaining</option>
                        Temp rss feed links -->
    	        		<option value="nu">nu.nl</option>
    	        		<option value="blog">blog.xml</option>
    	        		<option value="tweakers">Tweakers</option>
            		</select>
            		<input type="submit" name="submitblogfeed" value="Submit"/>
            	</form>
            </div>
            <!-- Searchbox code geleend van de FAQ code -->
            <div class="searchcontainer">
                <section id="faqUserSearchBox">         
                <form>
                    <button type="submit" class="searchBarButton">
                        <li class="fa fa-search iconSearch"></li>
                    </button>
                    <input type="text" name="search" class="searchBar" placeholder="Search...">
                </form>
                </section>
            </div>        	
        </div>
        <!-- Flexbox met de RSS reader content -->
        <div class="blogcontentflex">
            <?php
            //Print all the entries
            foreach($entries as $entry){
                ?>
                <div>
                	<div>
                        <br>
                        <p class="blogcategorie"><?= $entry->category?></p>
	                    <h3><?= $entry->title ?></h3>
	                    <p><?= strftime('%A %e %B %Y %T', strtotime($entry->pubDate)) ?></p>
	                    <p><?= $entry->description ?></p>
	                    <a class="leesmeer" href="<?= $entry->link ?>">Lees Meer</a>
                	</div>
            	</div>
            <?php  }
        	?>
      
        </ul>
    </body>
</html>
