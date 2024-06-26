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
        
        // Redirection vers la page de connexion si l'inscription est réussie
        header('Location: index.php?page=login');
        exit;
        
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) { // Code d'erreur pour doublon de clé
            $error = 'Erreur : E-Mail déjà utilisée';
        } else {
            $error = 'Erreur : ' . $e->getMessage();
        }
    }
}
?>

<html>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="register">
                    <form action="index.php?page=register" method="post">
                        <div class="mb-3">
                            <?php if (isset($error)) { ?>
                                <div class="alert alert-danger mb-2" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger mb-2" role="alert">
                                    Vous n'êtes pas inscrit !
                                </div>
                            <?php } ?>
                            <label for="mail" class="form-label">Adresse Mail</label>
                            <input type="email" name="email" class="form-control" id="mail" placeholder="example@gmail.com" required>
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="MyS3cur1sedPassw0rd" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" class="btn btn-primary w-100" aria-describedby="button-addon1" value="S'inscrire">
                        </div>
                        <div class="text-center">
                            <a href="index.php?page=login" class="btn btn-link">Déjà un compte ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
