<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/27922e58ca.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <img id="logo" src="images/logo.png" alt="logo">
                <a id="navhome" href="index.php?Home">Home</a>
                <a id="navblog" href="index.php?Blog">Blog</a>
                <a id="navfaq" href="index.php?FAQ">FAQ</a>
                <a id="navcontact" href="index.php?Contact">Contact</a> 
                <div id="placelang">
                    <select id="lang" name="language">
                        <option value="eng">ENG</option>
                        <option value="nl">NL</option>
                    </select>
                </div>
                <?php
                ?>
        </header>
        <div id="banner">
            <?php
            	/*Read title from url*/
                $contenttitle = $_GET['title'];
                echo "<h1 id='title'> Blog </h1>";
            ?>
        </div>
        <main>
            <?php
            	/*RSS reader*/
            	$feed = "Article.xml";
            	$entries = array();
	            $xml = simplexml_load_file($feed);
	            $entries = array_merge($entries, $xml->xpath("//item"));	     
	        	foreach($entries as $entry){
	        		if ($entry->title == $contenttitle) {
	        			if(empty($entry->img)) {
			?>				<!-- Article content if image is empty-->
	        				<div class="articlecontainer">
	        				<h1><?= $entry->title ?></h1>
			        		<p class="readblogdesc"><?= $entry->description ?></p>
			        		<p class="readblogcontent"><?= $entry->content ?></p>
	        		</div>
	        		<?php
	        			}
	        			else {
	        ?>				<!-- Article content if image is not empty-->	        		
	        			<div class="articlecontainer">
		        		<p class="readblogdesc"><?= $entry->description ?></p>
		        		<img class="readblogimg" src=<?= $entry->img ?> alt="Article image">
		        		<p class="readblogcontent"><?= $entry->content ?></p>
	        		</div>

	        <?php
	        	} } } /*Closing brackets. 3 of them.*/
            ?>
        </main>
        <footer>       
            <p id="footerdate">	&copy; 2020 - 2021</p>
            <p id="footerprivacy">privacystatement - profile XX</p>
        </footer>
    </body>
</html>
