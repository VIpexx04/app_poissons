<?php
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
            include 'views/appats.php';
            break;
        case 'accueil':
            include 'views/accueil.php';
            break;
        case 'cannes':
            include 'views/cannes.php';
            break;
        case 'poissons':
            include 'views/poissons.php';
            break;
        case 'login':
            include 'views/login.php';
            break;
        case 'logout':
            include 'views/logout.php';
            break;
        case 'register':
            include 'views/register.php';
            break;
        default:
            include 'views/accueil.php';
            break;
    }
}
?>
