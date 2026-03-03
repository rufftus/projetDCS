<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div class="tab">
      <button class="tablinks" onclick="openTab(event, 'Tab1')">Top applications</button>
      <button class="tablinks" onclick="openTab(event, 'Tab2')">Évolution mensuelle</button>
      <button class="tablinks" onclick="openTab(event, 'Tab3')">Comparaison ressources</button>
    </div>

    <div id="Tab1" class="tabcontent">
      <?php
      include 'topappli.php'
      ?>
    </div>

    <div id="Tab2" class="tabcontent">
        <?php
        include 'evomois.php'
        ?>
    </div>

    <div id="Tab3" class="tabcontent">
      <?php
      include 'comparaison.php'
      ?>
    </div>

    <script src="script.js"></script>
  </body>
</html>
