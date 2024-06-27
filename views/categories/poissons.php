<?php
require_once 'assets/functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

$poissons = getPoissons();
?>
<style>
.card img {
    width: 100%;
    height: 200px;
    max-height: 300px;
    object-fit: contain;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <?php
        if (!empty($poissons)) {
            foreach ($poissons as $poisson) {
                echo "<div class='col-md-4 col-sm-6 col-12'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<img src=\"images/poissons/{$poisson['chemin_image']}\" />";
                echo "<p class='card-text'>Nom : {$poisson['nom']}</p>";
                echo "<p class='card-text'>Famille : {$poisson['groupe_nom']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Erreur : Aucun poisson dans la BDD</p>";
        }
        ?>
    </div>
</div>
