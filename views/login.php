<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'assets/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=app', 'root', '');
        $stmt = $bdd->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Erreur : Adresse E-Mail ou Mot de Passe invalide.';
        }
    } catch (PDOException $e) {
        echo 'Erreur : '. $e->getMessage();
    }
}
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    <title>Connexion</title>
</head>
<body>
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
    <?php if (isset($error)) echo '<p style="color:red;">' . $error . '</p>'; ?>
</body>
</html>
