<?php
$current_lang = (strpos($_SERVER['REQUEST_URI'], '/fr/') !== false) ? 'fr' : 'en';
$menu_items = [
    'index.php' => ($current_lang == 'en') ? 'Home' : 'Accueil',
    'courses.php' => ($current_lang == 'en') ? 'Courses' : 'Cours',
    'about.php' => ($current_lang == 'en') ? 'About' : 'À propos',
    'contact.php' => 'Contact'
];
?>
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="/<?= $current_lang ?>/index.php">
            <img src="/img/logo.png" alt="Logo" height="40">
        </a>
        <div class="navbar-nav">
            <?php foreach ($menu_items as $page => $text): ?>
                <a href="/<?= $current_lang ?>/<?= $page ?>" 
                   class="nav-link <?= basename($_SERVER['SCRIPT_NAME']) == $page ? 'active' : '' ?>">
                    <?= $text ?>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="language-switcher">
            <a href="/en/<?= basename($_SERVER['SCRIPT_NAME']) ?>" class="<?= $current_lang == 'en' ? 'active' : '' ?>">EN</a>
            <a href="/fr/<?= basename($_SERVER['SCRIPT_NAME']) ?>" class="<?= $current_lang == 'fr' ? 'active' : '' ?>">FR</a>
        </div>
    </div>
</nav>