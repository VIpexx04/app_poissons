<?php
require_once 'assets/functions.php';

$page = !empty($_GET['page']) ? $_GET['page'] : 'accueil';
$title = Titres($page);

$Connected = false;
$email = '';
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $users = [
        'xzfamilly09@gmail.com' => 'Tymeo2008*',
    ];

    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    if (isset($users[$email]) && $users[$email] == $password) {
        $Connected = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
    setcookie('email', '', time() - 3600, "/");
    setcookie('password', '', time() - 3600, "/");
    header('Location: index.php');
    exit();
}
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
                            (✓) Connecté en tant que "<strong><?php echo($email) ?></strong>"
                                <form action="index.php" method="post">
                                <input type="hidden" name="logout" value="true">
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
                                <form action="index.php?page=connexion" method="post">
                                    
                                »» Adresse Mail ««<br>
                                <input type="text" name="email" required><br>
                                »» Mot de passe ««<br>
                                <input type="password" name="password" required><br>
                                <input type="submit" value="(✓) Connexion">
                                </form>
                            </em>
                        </h3>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</body>
</html>
