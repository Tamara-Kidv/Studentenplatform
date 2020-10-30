<?php

session_start();
                        

if(isset($_POST['register']))
{
   $email = $_POST['email'];
   $password = $_POST['psw'];
    if(!empty($email) && !empty($password))
    {
      $stringB = $email;
      $find = "nhl";
      $resultaat = strchr($stringB,$find);
      
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
            
       $stringA = $email; 
       $toFind = "@";
       $result = strchr($stringA,$toFind);
       
       if(strpos($result, "student") === FALSE){
           $level = "docent";
       }
       else{
           $level = "student";
       }       
 
        $hash = hash('sha256',$password);

        $xml = simplexml_load_file("login.xml");
        $sxe = new simpleXMLElement($xml->asXML());
        $user = $sxe->addChild("user");
        $user->addChild("gebruiker",$email);
        $user->addChild("wachtwoord",$hash);
        $user->addChild("level",$level);
        $sxe->asXML("login.xml");
        
        header('location:inlog.php');
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

        if($email == $XMLuser && hash('sha256',$password) == $XMLpsw)
        {
            //Login gelukt
            $_SESSION['login'] = true;
            $_SESSION['userid'] = $user->level; 
            //break;
        }
    }    
    if($_SESSION['login'] === true)
    {
        header('location:index.php');
    } 
}
else
{
    //gebruiker is handmatig hier gekomen
    
    echo "Graag het nodige formulier invullen";
}      
  ?>
    
    

               
                    
       