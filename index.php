
<!DOCTYPE html>
  <html lang="fr"> 
    <head>
      <title>FishSeek | Accueil</title>
      <?php

      include 'assets/infos.php'

      ?>
    </head>
    <body>

        <?php 

        include 'assets/menu.php';

        if (!empty($_GET['page']) && $_GET['page'] == 'appats') {
            include 'assets/appats.php';
        } elseif (!empty($_GET['page']) && $_GET['page'] == 'accueil') {
            include 'assets/accueil.php';
        } elseif (!empty($_GET['page']) && $_GET['page'] == 'cannes') {
            include 'assets/cannes.php';
        } elseif (!empty($_GET['page']) && $_GET['page'] == 'poissons') {
            include 'assets/poissons.php';
        } else {
            include 'assets/accueil.php';
        }

        ?> 
    </body>
  </html>