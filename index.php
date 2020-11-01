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
                <a href="?Home"><img id="logo" src="images/logo.png" alt="logo"> </a>
                <a id="navhome" href="?Home">Home</a>
                <a id="navblog" href="?Blog">Blog</a>
                <a id="navfaq" href="?FAQ">FAQ</a>
                <a id="navcontact" href="?Contact">Contact</a> 
                <div id="placelang">
                    <select id="lang" name="language">
                        <option value="en">EN</option>
                        <option value="nl">NL</option>
                    </select>
                    <a id="Logout" href="?Loguit">Log uit</a>
                </div>
        </header>
        <div id="banner">
            <?php
                // if (isset($_GET['Loguit'])) {
                //     die;
                // }
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
                    $page = "Profile";
                } else {
                    $page = "Home";
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
            <p id="footerprivacy"> <a class="footerwhite" href="https://www.nhlstenden.com/over-nhl-stenden/over-deze-website/privacy-statement" target="_blank">privacystatement</a> - <a class="footerwhite" href="?Profile">profile<i class="fas fa-user"></i></a></p>
        </footer>
    </body>
</html>
