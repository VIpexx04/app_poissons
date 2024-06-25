<div class="header">
    <nav>
        <ul class="navbar">
            <?php if ($Connected): ?>
                <li><a href="index.php?page=accueil">ACCUEIL</a></li>
                <li><a href="index.php?page=appats">APPATS</a></li>
                <li><a href="index.php?page=cannes">CANNES</a></li>
                <li><a href="index.php?page=poissons">POISSONS</a></li>
                <li><a href="index.php?page=logout">DECONNEXION</a></li>
            <?php else: ?>
                <li><a href="index.php?page=accueil">ACCUEIL</a></li>
                <li><a href="index.php?page=login">CONNEXION</a></li>
                <li><a href="index.php?page=register">INSCRIPTION</a></li>
            <?php endif; ?>
        </ul>
    </nav>  
</div>
