<?php
$current_lang = substr($_SERVER['REQUEST_URI'], 1, 2) == 'fr' ? 'fr' : 'en';
$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');
$page_content = DB::getPageContent($page_name, $current_lang);
?>
<!DOCTYPE html>
<html lang="<?= $current_lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_content['title'] ?? SITE_NAME) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_content['meta_description'] ?? '') ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>