<?php
require_once 'assets/functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

$appats = getAppats();
?>
<div class="container">
    <div class="row justify-content-center">
        <?php
        if (!empty($appats)) {
            foreach ($appats as $appat) {
                echo "<div class='col-md-4 col-sm-6 col-12'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<img src=\"images/appats/{$appat['chemin_image']}\" />";
                echo "<p class='card-text'>Nom : {$appat['nom']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Erreur : Aucun appât dans la BDD</p>";
        }
        ?>
    </div>
</div>
