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
        case 'connexion':
            return "Connexion";
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
        case 'connexion':
            include 'views/connexion.php';
            break;
        default:
            include 'views/accueil.php';
            break;
    }
}
?>
