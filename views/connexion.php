<?php
$users = [
    'xzfamilly09@gmail.com' => 'Tymeo2008*',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($users[$email]) && $users[$email] == $password) {
        setcookie('email', $email, time() + 3600, "/");
        setcookie('password', $password, time() + 3600, "/");
        header('Location: index.php?page=accueil');
        exit();
    } else {
        echo "Adresse mail ou mot de passe incorrect.";
    }
}
?>
