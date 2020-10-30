<!DOCTYPE html>
<html>
    <head>
        <title>Profile pagina</title>
    </head>
    <body>
			  <link rel="stylesheet" href="profile.css">
			  <div id="container">
        
        <?php
$email= "julian.veringa@student.nhlstenden.com";
$een = strpos($email, '@');
$naam1 = substr($email, 0, $een);

$bak2 = strpos($naam1, '.');
$naam2 = substr($naam1, 0, $bak2);

$bietn3 = ($bak2 + 1);
$naam3 = substr($naam1, $bietn3);
?>
        
        <p> Naam: <?php echo $naam2. " " .$naam3; ?> </p>
        <P> Email: <?php echo $email ?> </p>
		</div>
    </body>
</html>