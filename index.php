<?php 
    require_once 'assets/functions.php';

    $page = !empty($_GET['page']) ? $_GET['page'] : 'accueil';
    $title = Titres($page);
?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <title>FishSeek | <?php echo $title; ?></title>
    <?php include 'assets/infos.php'; ?>
</head>
<body>
    <?php include 'assets/menu.php'; ?>
    
    <?php Vues($page); ?>
</body>
</html>
