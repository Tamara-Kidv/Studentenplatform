<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <section class="centercontact">
        <h1 class="h1_contact">Contact</h1>
        <main>
            <div class="p_contact">Stel een vraag</div>
            <form class="contact-form" action="contact.php" method="POST">
                
                <div class="lerarencontact">
                <select name="contactleraren">
                    <option value="" disabled selected>Selecteer leraar</option>
                    <option value="gerjan">Gerjan</option>
                    <option value="raymond">Raymond</option>
                    <option value="albert">Albert</option>
                </select>
                </div>
                
                <div class="courses">
                <select>
                    <option value"" disabled selected>Course</option>
                    <option value="informatiemanagement">Informatiemanagement</option>
                    <option value="html">HTML</option>
                    <option value="php">PHP</option>
                 </select> <br /> <br />
                </div>
                 
                <input type="text" style="width:500px;"name="subject" placeholder="Onderwerp"> <br /> <br />   
                <textarea name="message"  placeholder="Bericht"></textarea> <br />
                <input type="button" style="background-color:#005AA7;color:white;width:150px;
                height:40px;" value="Submit">  <br /> <br />              
            </form>
            
        </main>
        <section> 
   <?php
        
  if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $subject = $_POST['subject'];
   $mailFrom = $_POST['mail'];
   $message = $_POST['message'];
            
   $mailTo = "tamme.tuncil@student.nhlstenden.com";
   $headers = "From: ".$mailFrom;
   $txt = "Iemand heeft een vraag gesteld! ".$name.".\n\n".$message;
            
   mail($mailTo, $subject, $txt, $headers);
   header('Location: contact.php?mailsend');
   exit;
                    }
              
    
    ?>
      
    </body>
    <div id="footer">@2020-2021</div>
</html>
