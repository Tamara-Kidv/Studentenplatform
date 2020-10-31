<!-- <!DOCTYPE html>
<html>
<head> -->
  <!-- <meta charset="UTF-8">
  <title>Contact</title> -->
    <!-- <link rel="stylesheet" href="style.css"/> -->
</head>
<body>
  <br><br>
  <!-- Spacing tussen banner -->

<div class="grid-container">
    <div class="grid=item-1">
            <form class="contact-form" action="contactform.php" method="POST">
                <div class="lerarencontact">
                  <select id="contactleraren" name="contactleraren" onchange="insertOptions(contactleraren,'contactcourse')" required>
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
        <select id="contactcourse" name="contactcourse" required>
        <option value="--">--</option>
      </select>
        <br /> <br />
      </div>
    </div>

    <!-- Select courses -->

    <div class="grid=item-3">
      <input id="studentnummer" type="text" name="student_number" placeholder="Student nummer"> <br /> <br />
      <input id="onderwerpcontact" type="text" name="subject" placeholder="Onderwerp"> <br /> <br />
      <textarea name="message"  placeholder="Bericht"></textarea> <br />
      <input id="submitcontact" type="submit" value="Submit">  <br /> <br />
      <!-- Subject, textarea and the submit button -->
    </div>
  </div>


  <!-- Script voor het dynamische selectbox -->

  <script type="text/javascript">
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
</body>
</html>
