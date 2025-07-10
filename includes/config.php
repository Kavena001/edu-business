<?php
// Site Settings
define('SITE_NAME', 'Edu-Business');
define('DEFAULT_LANG', 'fr');

// Start session
session_start();

// Set language
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = in_array($_GET['lang'], ['en', 'fr']) ? $_GET['lang'] : DEFAULT_LANG;
} elseif (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = DEFAULT_LANG;
}

// Include database connection
require_once 'db_connect.php';
?>