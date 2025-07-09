<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/<?= $current_lang ?>/index.php">
            <img src="/img/logo.png" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'index' ? 'active' : '' ?>" href="/<?= $current_lang ?>/index.php">
                        <?= $current_lang == 'fr' ? 'Accueil' : 'Home' ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'courses' ? 'active' : '' ?>" href="/<?= $current_lang ?>/courses.php">
                        <?= $current_lang == 'fr' ? 'Cours' : 'Courses' ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'about' ? 'active' : '' ?>" href="/<?= $current_lang ?>/about.php">
                        <?= $current_lang == 'fr' ? 'À propos' : 'About' ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page_name == 'contact' ? 'active' : '' ?>" href="/<?= $current_lang ?>/contact.php">
                        <?= $current_lang == 'fr' ? 'Contact' : 'Contact' ?>
                    </a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="<?= str_replace("/$current_lang/", '/en/', $_SERVER['REQUEST_URI']) ?>" 
                   class="btn btn-sm <?= $current_lang == 'en' ? 'btn-light active' : 'btn-outline-light' ?> me-2">EN</a>
                <a href="<?= str_replace("/en/", '/fr/', $_SERVER['REQUEST_URI']) ?>" 
                   class="btn btn-sm <?= $current_lang == 'fr' ? 'btn-light active' : 'btn-outline-light' ?>">FR</a>
            </div>
        </div>
    </div>
</nav>