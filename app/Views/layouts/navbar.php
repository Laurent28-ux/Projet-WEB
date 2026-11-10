<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isSignedIn = isset($_SESSION['utilisateur']);
?>
<nav class="navbar" aria-label="Navigation principale">
    <img src="../../../public/img/CLICK.png" alt="" height="80px" width="80px">
    <ul class="nav-links">
        <li><a href="../recherche/recherche.php#top" class="<?= $currentPage === 'index.php' ? 'is-active' : '' ?>">Accueil</a></li>
        <li><a href="../recherche/recherche.php" class="<?= in_array($currentPage, ['recherche.php', 'resultats.php'], true) ? 'is-active' : '' ?>">Explorer</a></li>
        <li><a href="../recherche/recherche.php#results-title">Destinations</a></li>
        <li><a href="../recherche/recherche.php#inspiration">Guides</a></li>
        <li><a href="../recherche/recherche.php#about">À propos</a></li>
    </ul>
    <div class="nav-actions">
        <?php if ($isSignedIn): ?>
            <a class="button button--outline" href="../reservation/reservation.php">Mon compte</a>
            <a class="button button--primary" href="../reservation/reservation.php">Mes réservations</a>
        <?php else: ?>
            <a class="button button--outline" href="../auth/connexion.php">Se connecter</a>
            <a class="button button--primary" href="../auth/inscription.php">S’inscrire</a>
        <?php endif; ?>
    </div>
</nav>
