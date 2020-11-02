<?php 
session_start(); 
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <meta charset="UTF-8">
        <title>login page</title>
    </head>
    <body> 
        <main> 
            <div class="container"> 
                <div class="formbox">
                    <h1>Login</h1>
                    <hr>
                    <form action="login.php" method="POST">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                        <hr>

                        <p>Bij inloggen accepteer je onze <a href="https://www.nhlstenden.com/privacyverklaring" target=_blank>Terms & Conditions</a>.</p>
                        <input type="submit" value="Login" name="login" class="registerbtn">
                        <div class="signin">
                            <p>Registreer je account hier <a href="register.html">Register</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
		<?php 
		//New and improved login systeem
			function logintrue($userName, $userLvl) {
				echo "login was true";
				$_SESSION['email'] = $userName;
				$_SESSION['userlevel'] = $userLvl;
				header ("Location: index.php");
				exit();
			}
			if(isset($_POST['login'])) {
				$email = $_POST['email'];
		   		$password = $_POST['psw'];
		   		$xml = simplexml_load_file("login.xml");
		   		foreach($xml->user as $user) {
			        $XMLpsw = $user->wachtwoord;
					$userName = $user->gebruiker;
			        $userLvl = $user->level;
			        if($email == $userName && password_verify($password, $XMLpsw)) {	        
			            //Als username en password matchen
			            echo "goed gedaan jochie";
						logintrue($userName->__toString(), $userLvl->__toString());
					}
				}
			}
			// old and not improved registratie systeem
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
		 
		        /*$hash = hash('sha256',$password);*/
		        $hash = password_hash($password, PASSWORD_DEFAULT);

		        $xml = simplexml_load_file("login.xml");
		        $sxe = new simpleXMLElement($xml->asXML());
		        $user = $sxe->addChild("user");
		        $user->addChild("gebruiker",$email);
		        $user->addChild("wachtwoord",$hash);
		        $user->addChild("level",$level);
		        $sxe->asXML("login.xml");
		        
		        header('location:login.php');
			}
			}
			}
		?>
    </body>
</html>