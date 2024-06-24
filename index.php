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

    <?php if ($Connected): ?>
        <div class="header2">
            <nav>
                <ul class="navbar">
                    <li>
                        <h3>
                            <em>
                            (✓) Connecté en tant que "<strong><?php echo htmlspecialchars($email); ?></strong>"
                                <form action="index.php?page=logout" method="post">
                                <input type="submit" value="(✘) Déconnexion">
                                </form>
                            </em>
                        </h3>
                    </li>
                </ul>
            </nav>
        </div>
    <?php else: ?>
        <div class="header2">
            <nav>
                <ul class="navbar">
                    <li>
                        <h3>
                            <em>
                            (✘) Vous n'êtes pas connecté !
                            </em>
                        </h3>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="login">
            <nav>
                <ul class="navbar">
                    <li>
                        <h3>
                            <em>
                                <form action="index.php?page=login" method="post">
                                Adresse Mail:<br>
                                <input type="email" name="email" required><br>
                                Mot de passe:<br>
                                <input type="password" name="password" required><br>
                                <input type="submit" value="Connexion"><br>
                                </form>
                                <br>
                                <a href="index.php?page=register">S'inscrire</a>
                            </em>
                        </h3>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</body>
</html>
