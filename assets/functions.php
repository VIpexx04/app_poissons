<?php
function loginUser($email, $password) {
    $bdd = bddConnect();
    $stmt = $bdd->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function bddConnect() {

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=app", 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }
}

function getAppats() {
    $bdd = bddConnect();
    $sql = "SELECT id, nom FROM appats ORDER BY id";
    $result = $bdd->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getCannes() {
    $bdd = bddConnect();
    $sql = "SELECT id, nom FROM cannes ORDER BY id";
    $result = $bdd->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getPoissons() {
    $bdd = bddConnect();
    $sql = "SELECT id, nom FROM poissons ORDER BY id";
    $result = $bdd->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function Titres($page) {
    switch ($page) {
        case 'accueil':
            return "Accueil";
        case 'appats':
            return "Appâts";
        case 'cannes':
            return "Cannes";
        case 'poissons':
            return "Poissons";
        case 'login':
            return "Connexion";
        case 'logout':
            return "Déconnexion";
        case 'register':
            return "Inscription";
        case 'search':
            return "Rechercher";
        default:
            return "Accueil";
    }
}

function Vues($page) {
    switch ($page) {
        case 'appats':
            include 'views/categories/appats.php';
            break;
        case 'accueil':
            include 'views/others/accueil.php';
            break;
        case 'cannes':
            include 'views/categories/cannes.php';
            break;
        case 'poissons':
            include 'views/categories/poissons.php';
            break;
        case 'login':
            include 'views/systemes/login.php';
            break;
        case 'logout':
            include 'views/systemes/logout.php';
            break;
        case 'register':
            include 'views/systemes/register.php';
            break;
        case 'search':
            include 'views/systemes/search.php';
            break;
        default:
            include 'views/others/accueil.php';
            break;
    }
}

?>
