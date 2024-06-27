<?php
require_once 'assets/functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

$cannes = getCannes();
?>
<div class="container">
    <div class="row justify-content-center">
        <?php
        if (!empty($cannes)) {
            foreach ($cannes as $canne) {
                echo "<div class='col-md-4 col-sm-6 col-12'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<img src=\"images/cannes/{$canne['chemin_image']}\" />";
                echo "<p class='card-text'>Nom : {$canne['nom']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Erreur : Aucune canne dans la BDD</p>";
        }
        ?>
    </div>
</div>
