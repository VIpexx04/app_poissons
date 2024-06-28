<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: index.php?page=poissons');
    exit;
}

$poisson_id = $_GET['id'];
$poisson = getPoissonById($poisson_id);
$cannes = getCannesByPoissonId($poisson_id);

if (!$poisson) {
    echo "<p>Erreur : Poisson non trouvé</p>";
    exit;
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <img src="images/poissons/<?php echo $poisson['chemin_image']; ?>" style="width: 100%; height: 200px; object-fit: contain;" />
                    <p class="card-text">Nom : <?php echo $poisson['nom']; ?></p>
                    <p class="card-text">Famille : <?php echo $poisson['groupe_nom']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($cannes)) : ?>
        <div class="row justify-content-center mt-4">
            <?php foreach ($cannes as $canne) : ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/cannes/<?php echo $canne['chemin_image']; ?>" style="width: 100%; height: 200px; object-fit: contain;" />
                            <p class="card-text">Nom : <?php echo $canne['nom']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 col-sm-6 col-12">
                <p>Aucune canne associée.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
