<!DOCTYPE html>

<html lang="en">
    <head>
        <?php
           /* session_start();
            if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
            header ("Location: inlog.php");
            }*/
        ?>
        <meta charset="UTF-8">
        <?php
                if(isset($_GET['Home'])) {
                    $page = "Home";
                } else if(isset($_GET['Blog'])) {
                    $page = "Blog";
                } else if(isset($_GET['FAQ'])) {
                    $page = "FAQ";
                } else if(isset($_GET['Contact'])) {
                    $page = "Contact";
                } else if(isset($_GET['AddBlog'])) {
                    $page = "AddBlog";
                } else if (isset($_GET['Profile'])){
                    $page = "Profiel";
                } else {
                    $page = "Home";
                }
                echo "<title>$page</title>"
                ?> 

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/27922e58ca.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
                <img id="logo" src="images/logo.png" alt="logo">
                <a id="navhome" href="?Home">Home</a>
                <a id="navblog" href="?Blog">Blog</a>
                <a id="navfaq" href="?FAQ">FAQ</a>
                <a id="navcontact" href="?Contact">Contact</a> 
                <div id="placelang">
                    <select id="lang" name="language">
                        <option value="eng">ENG</option>
                        <option value="nl">NL</option>
                    </select>
                    <div><a href="?Loguit">Log uit</a></div>
                </div>
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
                            <h1><?= $entry->title ?></h1>
                                <p class="readblogdesc"><?= $entry->description ?></p>
                            <div>
                                <img class="readblogimg" src=<?= $entry->img ?> alt="Article image">
                                <p class="readblogcontent"><?= $entry->content ?></p>
                            </div>
	        		    </div>

	        <?php
	        	} } } /*Closing brackets. 3 of them.*/
            ?>
        </main>
        <footer>       
            <p id="footerdate"> &copy; 2020 - 2021</p>
            <p id="footerprivacy"> <a class="footerwhite" href="https://www.nhlstenden.com/over-nhl-stenden/over-deze-website/privacy-statement" target="_blank">privacystatement</a> - <a class="footerwhite" href="?Profile">profile <i class="fas fa-user"></i></a></p>
        </footer>
    </body>
</html>
