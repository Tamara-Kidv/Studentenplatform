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
       /*Check the value from the category selector, and put it in the variable $selectedcategory*/
            if(isset($_POST["submitblogfeed"])) {
                $selectedcategory = $_POST['blogselector'];
            }
        ?>        
        <?php
        //default feed
            if (empty($selectedcategory)) {
            $selectedcategory = "everything";
        }
        $feeds = array(
        /*XML files go here*/
        "https://www.nu.nl/rss/Tech",
        "blog.xml",
        "http://feeds.feedburner.com/tweakers/nieuws",
        "Article.xml"
        );

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
                <!-- Category selector -->
            	<p>Select category:</p>
            	<form action="template.php?Blog" method="post"> 
    	        	<select class="blogselect" name="blogselector">
    	        		<option value="everything">Everything</option>
    	        		<option value="News">News</option>
    	        		<option value="Corona">Corona</option>
                        <option value="Evenementen">Events</option>
            		</select>
            		<input class="bloginput" type="submit" name="submitblogfeed" value="Submit"/>
            	</form>
            </div>
            <div class="add-blog-button">
                <a class="add-blog-button" href="template.php?AddBlog">   
                    <p><i class="fas fa-plus-circle"></i>Add Post</p>                                     
                </a>
            </div>
            <!-- JS based search box -->
            <div class="searchcontainer">
                <div>
		            <input type="text" id="search" placeholder="Search..." class="blogsearchbarbutton">
		            <input class="searchButton" type="button" name="search" value="Go" onclick="search(document.getElementById('search').value)">
                   <!--  Reset button -->
                    <input class="searchButton" type="button" name="reset" value="Reset" onclick="document.location.href='template.php?Blog'">
        		</div>
            </div>        	
        </div>
        <!-- Flexbox with the contents of the RSS reader -->
        <div id="searchResults"></div>   
        <div id="blogcontentflex">	
            <?php
            //Print all the entries
            foreach($entries as $entry){
                /*Check if the category matches the selected value before printing it*/
                if (stristr($entry->category, $selectedcategory) OR ($selectedcategory == "everything")) {
                ?>            
                <div>
                	<div class="blogs">
                        <br>
                        <p class="blogcategorie"><?= $entry->category?></p>
	                    <h3><?= $entry->title ?></h3>
	                    <p><?= strftime('%A %e %B %Y %T', strtotime($entry->pubDate)) ?></p>
	                    <p><?= $entry->description ?></p>
	                    <!-- <a class="leesmeer" href="<?= $entry->link ?>">Lees Meer</a> -->
                        <a class="leesmeer" href="readblog.php?title=<?= $entry->title ?>">Lees Meer</a>
                	</div>	            
            	</div>
            <?php  } }
        	?>
            <!-- end of print -->
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
