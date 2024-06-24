<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'assets/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=app', 'root', '');
        $stmt = $bdd->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $stmt->execute([
            'email' => $email,
            'password' => $hashedPassword
        ]);
        $_SESSION['user_id'] = $bdd->lastInsertId();
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        $error = 'Erreur : ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
        <div class="header2">
            <nav>
                <ul class="navbar">
                    <li>
                        <h3>
                            <em>
                            (➤) Vous n'avez pas de compte !
                            </em>
                        </h3>
                    </li>
                </ul>
            </nav>
        </div>
    <?php if (isset($error)) echo '<p style="color:red;">' . $error . '</p>'; ?>
    <form action="index.php?page=register" method="post">
        Adresse Mail:<br>
        <input type="email" name="email" required><br>
        Mot de passe:<br>
        <input type="password" name="password" required><br>
        <input type="submit" value="S'inscrire"><br>
    </form>
</body>
</html>
