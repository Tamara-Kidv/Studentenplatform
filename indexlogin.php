<?php

session_start();
                        //hier moet nog de voorware komen van only @nhl accounts of iets dergelijks.

if(isset($_POST['submit']))
{
    //gebruiker heeft formulier ingevuld
   $email = $_POST['email'];
   $password = $_POST['psw'];
    if(!empty($email) && !empty($password))
    {
      //  verwijzing


$hash = hash('sha256',$password);
//dit is de beveiliging van de wachtwoorden
        
        $file = fopen('login.xml', 'a+');
        
        $content = "<user>\n<username>".$email."</username>\n";
        $content .= "<psw>".$hash."</psw>\n</user>\n";
        
        fwrite($file, $content);
        
        fclose($file);
 // header location lucas zijn gedeelte
    }
    else
    {
         echo "graag het nodige formulier invullen";
    }

}
else
{
    //gebruiker is handmatig hier gekomen
    
    echo "Graag het nodige formulier invullen";
}

//
////fopen R+
////fwrite  A+!!!! /n is een enter
////
////fclose

	?>
    
     <meta http-equiv="refresh" content="0; url=inlog.php" />
    

               
                    
       