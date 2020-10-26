<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body> -->
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
            "http://feeds.feedburner.com/tweakers/nieuws",
            "Article.xml"

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
        else if ($selectedfeed == "Article") {
            $feeds = array(
            "Article.xml"
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
            	<form action="template.php?Blog" method="post"> 
    	        	<select class="blogselect" name="blogselector">
    	        		<option value="everything">Everything</option>
                       <!--  not yet implemented options
    	        		<option value="news">News</option>
    	        		<option value="important">Important</option>
                        <option value="entertaining">Entertaining</option>
                        Temp rss feed links -->
    	        		<option value="nu">nu.nl</option>
    	        		<option value="blog">blog.xml</option>
    	        		<option value="tweakers">Tweakers</option>
    	        		<option value="Article">Article</option>
            		</select>
            		<input class="bloginput" type="submit" name="submitblogfeed" value="Submit"/>
            	</form>
            </div>
            <div class="add-blog-button">
                <a class="add-blog-button" href="template.php?AddBlog">   
                    <p><i class="fas fa-plus-circle"></i></p>                    
                <a class="add-blog-button" href=AddBlog.php>   
                    <i class="fas fa-plus-circle"></i>                    
                </a>
            </div>
            <!-- Searchbox code geleend van de FAQ code -->
            <div class="searchcontainer">
                <div>
		            <input type="text" id="search" placeholder="Search..." class="blogsearchbarbutton">
		            <input class="searchButton" type="button" name="search" value="Go" onclick="search(document.getElementById('search').value)">
                   <!--  Moet nog vervangen worden door een echte reset -->
                    <input class="searchButton" type="button" name="reset" value="Reset" onclick="document.location.href='template.php?Blog'">
        		</div>
            </div>        	
        </div>
        <!-- Flexbox met de RSS reader content -->
        <div id="searchResults"></div>   
        <div id="blogcontentflex">	
            <?php
            //Print all the entries
            foreach($entries as $entry){
                ?>
                <div>
                	<div class="blogs">
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
        </div>
	        <script type="text/javascript">
		        function search(string){
		            var content = document.getElementsByClassName("blogs");
		            var searchValue = string;
		              var canvas = document.getElementById("searchResults");

		            for(var i = 0; i < content.length; i++){
		              if(content[i].innerHTML.indexOf(searchValue) > -1){
		              canvas.appendChild(content[i]);
		              
		              } else {

		              }
		              console.log(canvas);
		            }
		            document.getElementById("blogcontentflex").style.cssText = 'visibility: hidden';
		        }
	    	</script>
<!--     </body>
</html> -->
