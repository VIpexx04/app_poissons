<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <?php
        if (!empty($_GET['page'])) {
            switch ($_GET['page']) {
                case 'accueil':
                    $title = "Accueil";
                    break;
                case 'appats':
                    $title = "Appâts";
                    break;
                case 'cannes':
                    $title = "Cannes";
                    break;
                case 'poissons':
                    $title = "Poissons";
                    break;
                default:
                    $title = "Accueil";
                    break;
            }
        }
        ?>
        <title> FishSeek | <?php echo $title; ?></title>
        <?php include 'assets/infos.php'; ?>
    <head>
    <body>
    <?php 
        include 'assets/menu.php';

        if (!empty($_GET['page']) && $_GET['page'] == 'appats') {
            include 'views/appats.php';
        } elseif (!empty($_GET['page']) && $_GET['page'] == 'accueil') {
            include 'views/accueil.php';
        } elseif (!empty($_GET['page']) && $_GET['page'] == 'cannes') {
            include 'views/cannes.php';
        } elseif (!empty($_GET['page']) && $_GET['page'] == 'poissons') {
            include 'views/poissons.php';
        } else {
            include 'views/accueil.php';
        }
    ?>
    </body>
  </html>