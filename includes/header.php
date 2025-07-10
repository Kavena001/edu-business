<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set default language to French if not set
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr';
}

// Get current language from session
$current_language = $_SESSION['lang'];

// Define page titles for different languages
$page_titles = [
    'index' => ['fr' => 'Accueil', 'en' => 'Home'],
    'courses' => ['fr' => 'Cours', 'en' => 'Courses'],
    'about' => ['fr' => 'À propos', 'en' => 'About'],
    'contact' => ['fr' => 'Contact', 'en' => 'Contact']
];

// Get current page name
$current_page = basename($_SERVER['PHP_SELF'], '.php');
if (!array_key_exists($current_page, $page_titles)) {
    $current_page = 'index'; // Default to index if page not found
}

// Set page title
$page_title = $page_titles[$current_page][$current_language] ?? 'Formation Professionnelle';
?>
<!DOCTYPE html>
<html lang="<?= $current_language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> | Formation Professionnelle</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link href="/assets/css/style.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="/assets/img/logo.png" alt="Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'index') ? 'active' : '' ?>" href="index.php">
                            <?= $page_titles['index'][$current_language] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'courses') ? 'active' : '' ?>" href="courses.php">
                            <?= $page_titles['courses'][$current_language] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'about') ? 'active' : '' ?>" href="about.php">
                            <?= $page_titles['about'][$current_language] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'contact') ? 'active' : '' ?>" href="contact.php">
                            <?= $page_titles['contact'][$current_language] ?>
                        </a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="?lang=fr" class="btn btn-sm <?= ($current_language == 'fr') ? 'btn-light' : 'btn-outline-light' ?> me-2 language-switcher <?= ($current_language == 'fr') ? 'active' : '' ?>">FR</a>
                    <a href="?lang=en" class="btn btn-sm <?= ($current_language == 'en') ? 'btn-light' : 'btn-outline-light' ?> language-switcher <?= ($current_language == 'en') ? 'active' : '' ?>">EN</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="container-fluid px-0">