<header>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <?php include __DIR__ . '/navbar.php'; ?>
</header>