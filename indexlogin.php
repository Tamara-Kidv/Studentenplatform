<?php

session_start();
                        //hier moet nog de voorware komen van only @nhl accounts of iets dergelijks.

if(isset($_POST['register']))
{
    //gebruiker heeft formulier ingevuld
   $email = $_POST['email'];
   $password = $_POST['psw'];
    if(!empty($email) && !empty($password))
    {
      $stringB = $email;
      $find = "nhl";
      $resultaat = strchr($stringB,$find);
      //echo "$resultaat";
      
        if(strpos($resultaat, "nhl") === FALSE){
            $acces = "DENIED";
        }
        else{
            $acces = "ACCEPTED";
            
        }
        
        if($acces == "DENIED"){
           echo "U heeft geen toegang tot dit platform zonder gebruik van een NHL Stenden account";
        }
else{
            
       $stringA = $email; //hier $email invullen
       $toFind = "@";
       $result = strchr($stringA,$toFind);
       //echo "$result";
       
       if(strpos($result, "student") === FALSE){
           $level = "docent";
       }
       else{
           $level = "student";
       }       
        //check for word student in email

        $hash = hash('sha256',$password);
        //dit is de beveiliging van de wachtwoorden
        
//        $file = fopen('login.xml', 'a+');
        
        $xml = simplexml_load_file("login.xml");
        $sxe = new simpleXMLElement($xml->asXML());
        $user = $sxe->addChild("user");
        $user->addChild("gebruiker",$email);
        $user->addChild("wachtwoord",$hash);
        $user->addChild("level",$level);
        $sxe->asXML("login.xml");
        
        header('location:inlog.php');
            //$xml = simplexml_load_file("login.xml");
        
            //$user = $xml->addChild("user");
            //$user->addChild("username", $email);
            //$user->addChild("psw", $hash);
        
            // $xml->saveXML();
        //TODO DETECT STUDENT OR TEACHER AND ADD USERLEVEL
//        $content = "<user>\n<username>".$email."</username>\n";
//        $content .= "<psw>".$hash."</psw>\n";
//        $content .= "<userlevel> </userlevel>/n </user>\n";
//        
//        fwrite($file, $content);
        
//        fclose($file);
 // header location lucas zijn gedeelte
}


}
}
elseif($_POST['login'])
{
    $email = $_POST['email'];
    $password = $_POST['psw'];
    
    $xml = simplexml_load_file("login.xml");
    $login = false;
    
    foreach($xml->user as $user)
    {
        $XMLpsw = $user->wachtwoord;
        $XMLuser = $user->gebruiker;
        
       
        //inlog gegevens controleren met loop data
        if($email == $XMLuser && hash('sha256',$password) == $XMLpsw)
        {
          var_dump("Hij pakt inlog yes");
            //Login gelukt
            $_SESSION['login'] = true;

            //$_SESSION['userid'] = 
            echo "<meta http-equiv='refresh' content='1; url=index.php' />";
            break;
        }
    }
    // terug naar login
    echo "<meta http-equiv='refresh' content='1; url=inlog.php' />";
    
    

            $_SESSION['userid'] = $user->level; 
            //break;
        }
//        else{
//            $_SESSION['login'] = false;
//        }

    }    
    if($_SESSION['login'] === true)
    {
        header('location:homepage.php');
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

    

               
                    
       