<?php>

if (isset($_POST['submit'])) {
  $name = $_POST['first_name'];
  $student_number = $_POST['first_name'];
  $subject = $_POST['subject'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];

  $mailTo = "tamme.tuncil@student.nhlstenden.com";
  $headers = "From: ".$mailFrom;
  $txt = "Er is een bericht binnen van ".$name.".\n\n".$message;

  mail($mailTo, $subject, $txt, $headers);
  header("Location: contact.php?mailsend");
}

?>
