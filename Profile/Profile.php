<link rel="stylesheet" href="profile.css">
<div id="container">

	<?php
		$email = $_SESSION['email'];
		$een = strpos($email, '@');
		$naam1 = substr($email, 0, $een);
		$bak2 = strpos($naam1, '.');
		$naam2 = substr($naam1, 0, $bak2);
		$bietn3 = ($bak2 + 1);
		$naam3 = substr($naam1, $bietn3);
	?>
	<div>
		<img src="images/profiel_photo.png" id="profilePhoto" alt="profile_photo">
	</div>		
	<div id="naam">
		<p id="naamp"> Name:</p>
		<p> <?php echo $naam2. " " .$naam3; ?> </p>
	</div>
	<div id="email">
		<p id="emailp">Email: </p>
		<p><?php echo $email ?> </p>
	</div>
</div>
