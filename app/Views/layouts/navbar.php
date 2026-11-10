<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isSignedIn = isset($_SESSION['utilisateur']);
?>
<nav class="navbar" aria-label="Navigation principale">
    <a class="brand" href="../recherche/recherche.php" aria-label="Click & Go, accueil">
        <span class="brand__mark" aria-hidden="true">
            <svg viewBox="0 0 42 42" focusable="false">
                <path d="M37.5 4.5 22 37l-4.1-13.2L4.5 19.7 37.5 4.5Z"></path>
                <path d="m17.9 23.8 8.7-8.6"></path>
            </svg>
        </span>
        <span class="brand__name">CLICK <span>&amp; GO</span></span>
    </a>
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
