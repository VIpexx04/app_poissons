<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="row">
                <div class="col-12 text-center">
                    <img id="logo-fishseek" src="images/other/fishseek_icon.png" alt="Logo FishSeek">
                </div>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if ($Connected): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=accueil">ACCUEIL</a>
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

