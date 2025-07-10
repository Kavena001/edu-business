<?php
session_start();

// Browser language detection
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$supportedLangs = ['fr', 'en'];

if (isset($_SESSION['lang'])) {
    header("Location: /{$_SESSION['lang']}/");
} else {
    $redirectLang = in_array($lang, $supportedLangs) ? $lang : 'fr';
    $_SESSION['lang'] = $redirectLang;
    header("Location: /$redirectLang/");
}
exit;
?>