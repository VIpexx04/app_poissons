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
        default:
            include 'views/others/accueil.php';
            break;
    }
}
?>
