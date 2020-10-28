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
                    <form action="indexlogin.php" method="POST">
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                        <hr>

                        <p>Bij inloggen accepteer je onze <a href="https://www.nhlstenden.com/privacyverklaring">Terms & Conditions</a>.</p>
                        <input type="submit" value="Login" name="login" class="registerbtn">
                        <div class="signin">
                            <p>Registreer je account hier <a href="register.html">Register</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>