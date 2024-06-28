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
        die('Erreur : ' . $e->getMessage());
    }
}

function getPoissonById($id) {
    $bdd = bddConnect();
    $query = $bdd->prepare('SELECT p.*, g.nom as groupe_nom FROM poissons p JOIN groupes g ON p.groupe_id = g.id WHERE p.id = :id');
    $query->execute(['id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getCannesByPoissonId($poisson_id) {
    $bdd = bddConnect();
    $query = $bdd->prepare('SELECT c.* FROM cannes c JOIN poisson_canne pc ON c.id = pc.canne_id WHERE pc.poisson_id = :poisson_id');
    $query->execute(['poisson_id' => $poisson_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getPoissons() {
    $bdd = bddConnect();
    $sql = "SELECT poissons.id, poissons.nom, poissons.chemin_image, groupes.nom AS groupe_nom 
            FROM poissons 
            JOIN groupes ON poissons.groupe_id = groupes.id 
            ORDER BY poissons.id";
    $result = $bdd->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getAppats() {
    $bdd = bddConnect();
    $sql = "SELECT id, nom, chemin_image FROM appats ORDER BY id";
    $result = $bdd->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getCannes() {
    $bdd = bddConnect();
    $sql = "SELECT id, nom, chemin_image FROM cannes ORDER BY id";
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
            if (isset($_GET['id'])) {
                include 'views/categories/poissons_informations.php';
            } else {
                include 'views/categories/poissons.php';
            }
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
        default:
            include 'views/others/accueil.php';
            break;
    }
}
?>
