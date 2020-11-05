
 &nbsp;&nbsp;
  <!-- Spacing tussen banner -->
  <head>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body class="bodycontact">
    <div class="contact-box">
      <form class="contact-form" action="index.php?contactform.php" method="POST">
          <div class="grid=item-1">
          <div class="lerarencontact">
            <select id="contactleraren" class="contactleraren"name="contactleraren" onchange="insertOptions(contactleraren,'contactcourse')" required>
                <option value="" disabled selected>Selecteer leraar</option>
                <option value="raymondblankestijn">Raymond Blankestijn</option>
                <option value="gerjanvanoenen">Gerjan van Oenen</option>
                <option value="albertdejonge">Albert de Jonge</option>
                <option value="renevanlaan">Rene van Laan</option>
                <option value="jandoornbos">Jan Doornbos</option>
                <option value="robloves">Rob Loves</option>
                <option value="robsmit">Rob Smit</option>
            </select>
          </div>
        </div>

          <!-- Select leraar -->
      <div class="grid=item-2">
        <div class="courses">
          <select id="contactcourse" class="contactcourse" name="contactcourse" required>
              <option value="">--</option>
            </select>
        </div>
      </div>

          <!-- Select courses -->

        <form class="contact-form" action="index.php?contactform.php" method="POST">
          <input type="text" class="inputfield" placeholder="Voer uw studentnummer in" required >
          <input type="email" class="inputfield" placeholder="Voer uw mailadres in" required >
          <input type="text" class="inputfield" name="onderwerpcontact" placeholder="Onderwerp">
          <textarea name="message" class="inputtextcontact" placeholder="Bericht"></textarea>
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
    if (contactleraren.options[contactleraren.selectedIndex].value== "gerjanvanoenen") {
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
    else if (contactleraren.options[contactleraren.selectedIndex].value== "raymondblankestijn") {
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
    else if (contactleraren.options[contactleraren.selectedIndex].value== "renevanlaan") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "Informatiemanagement";
      opt1.innerHTML = "Informatiemanagement";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "robloves") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "Informatiemanagement";
      opt1.innerHTML = "Informatiemanagement";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "jandoornbos") {
      var opt1 = document.createElement('option');
      var opt2 = document.createElement('option');
      opt1.value = "HTML";
      opt1.innerHTML = "HTML";
      removeAll(contactcourse);
      contactcourse.add(opt1);
    }
    else if (contactleraren.options[contactleraren.selectedIndex].value== "albertdejonge") {
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
    else if (contactleraren.options[contactleraren.selectedIndex].value== "robsmit") {
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
