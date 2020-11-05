<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Verstuurd</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
</head>
<body>
  <h1>Gelukt!</h1><br>
    <p>Uw bericht is succesvol verzonden!</p><br>
  <!-- <p> Klik <a href="index.php?Home">hier</a> om terug te gaan naar de homepagina</p> -->
</body>
<?php

  if (isset($_POST['submit']))
    {
      $student_number= $_POST['student_number'];
      $email = $_POST['email'];
      $onderwerpcontact = $_POST['onderwerpcontact'];
      $message = $_POST['message'];


      $to = 'tamme.tuncil@student.nhlstenden.com';

      $mail = array($to,$onderwerpcontact,$message,$email);

}
?>
</hmtl>
