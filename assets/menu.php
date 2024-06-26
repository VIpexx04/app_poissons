<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if ($Connected): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=accueil">ACCUEIL</a><i class="bi bi-house"></i>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=appats">APPATS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=cannes">CANNES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=poissons">POISSONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=logout">DECONNEXION</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=accueil">ACCUEIL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=login">CONNEXION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=register">INSCRIPTION</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
