<link rel="stylesheet" href="../Stylesheet/style.css">
<div id="containerprofile">

	<?php
		$email = $_SESSION['email'];
		$emailsearch = strpos($email, '@');
		$naam1 = substr($email, 0, $emailsearch);
		$emailsearch2 = strpos($naam1, '.');
		$naam2 = substr($naam1, 0, $emailsearch2);
		$emailsearch3 = ($emailsearch2 + 1);
		$naam3 = substr($naam1, $emailsearch3);
		$Anaam = str_replace('.', ' ', $naam3)
	?>
	<div>
		<img src="images/profiel_photo.png" id="profilePhoto" alt="profile_photo">
	</div>		
	<div id="profilenaam">
		<p id="profilenaamp"> Name:</p>
		<p> <?php echo ucwords($naam2. " " .$Anaam); ?> </p>
	</div>
	<div id="profileemail">
		<p id="profileemailp">Email: </p>
		<p><?php echo $email ?> </p>
	</div>
</div>
