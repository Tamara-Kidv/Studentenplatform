<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <img id="logo" src="images/logo.png" alt="logo">
                <a id="navhome" href="template.php?Home">Home</a>
                <a id="navblog" href="template.php?Blog">Blog</a>
                <a id="navfaq" href="template.php?FAQ">FAQ</a>
                <a id="navcontact" href="template.php?Contact">Contact</a> 
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
                if(isset($_GET['Home'])) {
                    $page = "Home";
                } else if(isset($_GET['Blog'])) {
                    $page = "Blog";
                } else if(isset($_GET['FAQ'])) {
                    $page = "FAQ";
                } else if(isset($_GET['Contact'])) {
                    $page = "Contact";
                } else if(isset($_GET['addBlog'])) {
                    $page = "Add Blog"
                }
                echo "<h1 id='title'> $page </h1>"
            ?>
        </div>
        <main>
            <?php
                include($page .'.php');
            ?>
        </main>
        <footer>       
            <p id="footerdate">	&copy; 2020 - 2021</p>
            <p id="footerprivacy">privacystatement - profile XX</p>
        </footer>
    </body>
</html>
