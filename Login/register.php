<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../stylesheet.css">
        <meta charset="UTF-8">
        <title>Register page</title>
    </head>
    <body> 
        <main> 
            <div class="container"> 
                <div class="formbox">
                <h1>Register</h1>
                <hr>
                    <form action="register.php" method="POST">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required minlength="8">

                        <label for="psw2"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="passwordconfirm" id="passwordconfirm" required minlength="8">
                        <hr>
                        <?php
                                if(isset($_POST['register'])){
                                    if($_POST['password'] !== $_POST['passwordconfirm']){
                                        echo "<p id='NoMatch'>Passwords do not match, please try again<p>";
                                    }}
                        ?>
                        <p class="TenS">By continuing, you agree to our <a href="https://www.nhlstenden.com/privacyverklaring" target=_blank>Terms of Service</a>.</p>

                        <input type="submit" value="Register" name="register" class="registerbtn">
                        <div class="signin">
                            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
                        </div>
                        <?php 
                        if(isset($_POST['register'])){
                            if($_POST['password'] !== $_POST['passwordconfirm']){exit;}}?>
                    </form>
                </div>
            </div>
        </main>
        <?php
        // old and not improved registratie systeem
			if(isset($_POST['register'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
		        if(!empty($email) && !empty($password)){
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

                        $xml = simplexml_load_file("../XML/login.xml");
                        $sxe = new simpleXMLElement($xml->asXML());
                        $user = $sxe->addChild("user");
                        $user->addChild("gebruiker",$email);
                        $user->addChild("wachtwoord",$hash);
                        $user->addChild("level",$level);
                        $sxe->asXML("../XML/login.xml");
                        
                        header('location:login.php');
			}
			}
            }
		?>
    </body>
</html>