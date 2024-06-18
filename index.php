<?php
$url = $_SERVER["REQUEST_URI"];
$chemin = parse_url($url, PHP_URL_PATH);

$titles = [
    '/app/index' => 'Accueil',
    '/app/appats' => 'Appâts',
    '/app/cannes' => 'Cannes',
    '/app/poissons' => 'Poissons',
];

$title = isset($titles[$chemin]) ? $titles[$chemin] : 'Accueil';
?>
<!DOCTYPE html>
  <html lang="fr"> 
    <head>
      <title>FishSeek | <?php echo $title ?></title>
      <?php

      include 'assets/infos.php'

      ?>
    </head>
    <body>
        <?php 

        include 'assets/menu.php';

        ?>
        <div class="header2">
            <nav>
                <ul class="navbar">
                    <li><h3><em>Bienvenue sur le site officiel de l'information du pêcheur. Que ce soit appâts, poissons, cannes vous êtes au bon endroit. <strong>FishSeek</strong></em></h3></li>
                <ul>
            </nav>  
        </div>   
    </body>
  </html>