<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
  <br><br>
    <div class="grid-container">
    <div class="grid=item-1">
      <div class="p_contact"></div>
    <form class="contact-form" action="contact.php" method="POST">
      <div class="lerarencontact">
      <select name="contactleraren">
        <option value="" disabled selected>Selecteer leraar</option>
        <option value="gerjan">Gerjan</option>
        <option value="raymond">Raymond</option>
        <option value="albert">Albert</option>
      </select>

      </div>
      </div>
    <div class="grid=item-2">
    <div class="courses">
    <select>
      <option value"" disabled selected>Selecteer course</option>
      <option value="informatiemanagement">Informatiemanagement</option>
      <option value="html">HTML</option>
      <option value="php">PHP</option>
    </select> <br /> <br />
    </div>
    </div>
    <div class="grid=item-3">
      <input type="text" style="width:540px;" name="subject" placeholder="Onderwerp"> <br /> <br />
      <textarea name="message"  placeholder="Bericht"></textarea> <br />
      <input type="submit" style="background-color:#005AA7;color:white;width:150px;
      height:40px;" value="Submit">  <br /> <br />
    </div>
    </div>
  <footer id="footer_contact">
    <p>@2020-2021</p>
</footer>
</body>
</html>
