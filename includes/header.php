<?php
$current_lang = strpos($_SERVER['REQUEST_URI'], '/fr/') !== false ? 'fr' : 'en';
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/<?= $current_lang ?>/index.php">
                <img src="<?= IMG_PATH ?>logo.png" alt="Logo" height="40" onerror="this.style.display='none'">
            </a>
            
            <div class="d-flex">
                <a href="/en/index.php" class="btn btn-sm <?= $current_lang === 'en' ? 'btn-light' : 'btn-outline-light' ?>">EN</a>
                <a href="/fr/index.php" class="btn btn-sm <?= $current_lang === 'fr' ? 'btn-light' : 'btn-outline-light' ?> ms-2">FR</a>
            </div>
        </div>
    </nav>
</header>