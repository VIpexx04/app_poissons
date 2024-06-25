<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'assets/functions.php';

$page = !empty($_GET['page']) ? $_GET['page'] : 'accueil';
$title = Titres($page);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=app', 'root', '');
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
}

$Connected = isset($_SESSION['user_id']);
$email = $Connected ? $_SESSION['email'] : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FishSeek | <?php echo $title; ?></title>
    <?php include 'assets/infos.php'; ?>
</head>
<body>
    <?php include 'assets/menu.php'; ?>

    <?php Vues($page); ?>
</body>
</html>
