 &nbsp;&nbsp;
  <!-- Spacing tussen banner -->
  <head>
    <link rel="stylesheet" href="../style.css">
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
  </head>
  <body class="bodycontact">
    <div class="contact-box">
      <form class="contact-form" action="contact/contactform.php" method="POST">
          <div class="grid=item-1">
          <div class="lerarencontact">
            <select id="contactleraren" class="contactleraren" name="contactleraren" onchange="insertOptions(contactleraren,'contactcourse')" required>
                <option value="" disabled selected>Selecteer leraar</option>
                <option value="Raymond Blankestijn">Raymond Blankestijn</option>
                <option value="Gerjan van Oenen">Gerjan van Oenen</option>
                <option value="Albert de Jonge">Albert de Jonge</option>
                <option value="Rene Laan">Rene van Laan</option>
                <option value="Jan Doornbos">Jan Doornbos</option>
                <option value="Rob Loves">Rob Loves</option>
                <option value="Rob Smit">Rob Smit</option>
            </select>
          </div>
        </div>

          <!-- Select leraar -->
      <div class="grid=item-2">
        <div class="courses">
          <select id="contactcourse" class="contactcourse" name="contactcourse" required>
              <option value="">select course</option>
            </select>
        </div>
      </div>

          <!-- Select courses -->

        <form class="contact-form" action="contact/contactform.php" method="POST">
          <input type="text" class="inputfield" value="<?php echo ucwords($naam2. " " .$Anaam); ?>" name="name" required readonly>
          <input type="email" class="inputfield" name="email" value="<?=$_SESSION['email']?>" required readonly>
          <input type="text" class="inputfield" name="onderwerpcontact" placeholder="Onderwerp" required autocomplete="off">
          <textarea name="message" class="inputtextcontact" placeholder="Bericht" required></textarea>
          <input class="submitcontact" type="submit" value="Submit">
        </form>
            <!-- Subject, textarea and the submit button -->
      </div>
  </body>

  <!-- Script voor het dynamische selectbox -->

  <script>
  function removeAll(contactcourse){
    for (var i = contactcourse.options.length - 1; i >= 0; i--) {
      contactcourse.remove(i)
    }
  }
  function insertOptions(contactleraren,contactcourse) {
    var contactleraren = document.getElementById('contactleraren');
    var contactcourse = document.getElementById('contactcourse');
    if (contactleraren.options[contactleraren.selectedIndex].value== "Gerjan van Oenen") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "PHP";
      opt2.value = "Project";
      opt1.innerHTML = "PHP";
      opt2.innerHTML = "Project";
      removeAll(contactcourse);
      contactcourse.add(opt1);
      contactcourse.add(opt2);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "Raymond Blankestijn") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "Project";
      opt2.value = "Plenair";
      opt1.innerHTML = "Project";
      opt2.innerHTML = "Plenair";
      removeAll(contactcourse);
      contactcourse.add(opt1);
      contactcourse.add(opt2);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "Rene Laan") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "Informatiemanagement";
      opt1.innerHTML = "Informatiemanagement";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "Rob Loves") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "Informatiemanagement";
      opt1.innerHTML = "Informatiemanagement";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "Jan Doornbos") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "HTML";
      opt1.innerHTML = "HTML";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "Albert de Jonge") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "SLB";
      opt2.value = "Plenair";
      opt1.innerHTML = "SLB";
      opt2.innerHTML = "Plenair";
      removeAll(contactcourse);
      contactcourse.add(opt1);
      contactcourse.add(opt2);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "Rob Smit") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "HTML";
      opt1.innerHTML = "HTML";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else {
      var opt1 = document.createElement('option');
      opt1.value = "--";
      opt1.innerHTML = "--";
      removeAll(contactcourse);
      contactcourse.add(opt1);
}
  }
  </script>
