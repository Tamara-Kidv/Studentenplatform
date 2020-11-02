<?php 
session_start(); 
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../stylesheet.css">
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
						<?php 
						//New and improved login systeem
							function logintrue($userName, $userLvl) {
								echo "login was true";
								$_SESSION['email'] = $userName;
								$_SESSION['userlevel'] = $userLvl;
								header ("Location: ../index.php");
								exit();
							}
							if(isset($_POST['login'])) {
								$email = $_POST['email'];
								$password = $_POST['psw'];
								$xml = simplexml_load_file("../XML/login.xml");
								foreach($xml->user as $user) {
									$XMLpsw = $user->wachtwoord;
									$userName = $user->gebruiker;
									$userLvl = $user->level;
									if($email == $userName && password_verify($password, $XMLpsw)) {	        
										//Als username en password matchen
										echo "goed gedaan jochie";
										logintrue($userName->__toString(), $userLvl->__toString());
									}
									else{
										echo "<p id='NoMatch'>Your password and/or email is incorrect, please try again.</p>";
									}
								}
							}
			?>

                        <hr>

                        <p class="TenS">By continuing, you agree to our <a href="https://www.nhlstenden.com/privacyverklaring" target=_blank>Terms of Service</a>.</p>
                        <input type="submit" value="Login" name="login" class="registerbtn">
                        <div class="signin">
                            <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>