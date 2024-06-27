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
            $error = 'Erreur : E-Mail ou Mot de Passe invalide.';
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = !empty($_GET['page']) ? $_GET['page'] : 'accueil';
$title = Titres($page);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=app', 'root', '');
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

$Connected = isset($_SESSION['user_id']);
$email = $Connected ? $_SESSION['email'] : '';
?>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-md-6 col-lg-4 mx-auto">
            <div class="login">
                <form action="index.php?page=login" method="post">
                    <div class="mb-3">
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger mb-2" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger mb-2" role="alert">
                                Vous n'êtes pas connecté !
                            </div>
                        <?php } ?>
                        <label for="mail" class="form-label">Adresse Mail</label>
                        <input type="email" name="email" class="form-control" id="mail" placeholder="example@gmail.com" required>
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="MyS3cur1sedPassw0rd" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" class="btn btn-primary w-100" aria-describedby="button-addon1" value="Connexion">
                    </div>
                </form>
                <div class="text-center">
                    <a href="index.php?page=register" class="btn btn-link">Pas de compte ?</a>
                </div>
            </div>
        </div>
    </div>
</div>
