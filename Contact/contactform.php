<?php session_start(); 
if (!isset($_SESSION["email"])){
    header ("Location: ../Login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Verzonden </title>
        <link rel="stylesheet" href="../Stylesheet/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/27922e58ca.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <img id="logo" src="../images/logo.png" alt="logo">
                <a id="navhome" href="../index.php?Home">Home</a>
                <a id="navblog" href="../index.php?Blog">Blog</a>
                <a id="navfaq" href="../index.php?FAQ">FAQ</a>
                <a id="navcontact" href="../index.php?Contact">Contact</a> 
                <div id="placelang">
                    <select id="lang" name="language">
                        <option value="en">EN</option>
                        <option value="nl">NL</option>
                    </select>
                    <div><a href="../Login/logout.php">Log uit</a></div>
                </div>
                <?php
                ?>
        </header>
        <div id="banner">
            <?php
            	/*Read title from url*/
                echo "<h1 id='title'> Contact </h1>";
            ?>
        </div>
        <main>
        <?php
          if (isset($_POST['name']))
            {
              $name = $_POST['name'];
              $leraar = $_POST['contactleraren'];
              $email = $_POST['email'];
              $onderwerpcontact = $_POST['onderwerpcontact'];
              $message = $_POST['message'];
              $formcontent = "From: ".$name."\n Message:".$message;  
              $to ='lucashaytink@gmail.com';
              //mail($to, $onderwerpcontact, $formcontent or die('Error!'));
            }
            else
            echo "nothing happened"
        ?>
        <div class="contact-box">
        <h1 class="h1center">Email Verstuurd</h1>
        <form class="contact-form">
        <input type="text" class="inputfield" value="<?=$leraar?>" readonly>
        <input type="text" class="inputfield" value="<?=$name?>" name="name" readonly>
          <input type="email" class="inputfield" name="email" value="<?=$_SESSION['email']?>" readonly>
          <input type="text" class="inputfield" name="onderwerpcontact" value="<?=$_POST['onderwerpcontact']?>" readonly>
          <textarea name="message" class="inputtextcontact" readonly><?=$message?></textarea>
          </form>
          <a href="../index.php"><button class='submitcontact'>Home</button></a>
    </div>
    </main>
    <footer>       
            <p id="footerdate"> &copy; 2020 - 2021</p>
            <p id="footerprivacy"> <a class="footerwhite" href="https://www.nhlstenden.com/over-nhl-stenden/over-deze-website/privacy-statement" target="_blank">privacystatement</a> - <a class="footerwhite" href="../index.php?Profile">profile<i class="fas fa-user"></i></a></p>
        </footer>
    </body>
</html>
