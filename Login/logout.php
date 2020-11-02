<?php
	session_start();
?>
<!DOCTYPE html>
	<html>
		<body>
			<?php
				// remove all session variables
				session_unset();

				// destroy the session
				session_destroy();
				echo "You are now logged off. redirecting...";
				header('location:login.php');
			?>
	</body>
</html>