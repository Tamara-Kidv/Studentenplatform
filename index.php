<?php 
session_start(); 
if (!isset($_SESSION["email"])){
    header ("Location: Login/login.php");
    exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
                    $page = "Profile";
                } else {
                    $page = "Home";
                }
                echo "<title>$page</title>"
                ?> 

        <link rel="stylesheet" href="Stylesheet/style.css">
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
                    <a id="Logout" href="Login/logout.php">Sign out</a>
                </div>
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
                if(isset($_GET["Home"])){
                    $page1 = "Home/home.php";}
                elseif(isset($_GET["Blog"])){
                    $page1 = "Blog/Blog.php";}
                elseif(isset($_GET["FAQ"])){
                    $page1 = "FAQ/FAQ.php";}
                elseif(isset($_GET["Contact"])){
                    $page1 = "Contact/contact.php";}
                elseif(isset($_GET["AddBlog"])){
                    $page1 = "Blog/AddBlog.php";}
                elseif(isset($_GET["Profile"])){
                    $page1 = "Profile/Profile.php";}
                else{
                    $page1 = "Home/home.php";
                }
                include($page1);
            ?>
        </main>
        <footer>       
            <p id="footerdate">	&copy; 2020 - 2021</p>
            <p id="footerprivacy"> <a class="footerwhite" href="https://www.nhlstenden.com/over-nhl-stenden/over-deze-website/privacy-statement" target="_blank">privacystatement</a> - <a class="footerwhite" href="?Profile">profile<i class="fas fa-user"></i></a></p>
        </footer>
    </body>
</html>