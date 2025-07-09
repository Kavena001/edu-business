<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Path Test</title>
    <link href="<?= CSS_PATH ?>style.css" rel="stylesheet">
</head>
<body>
    <h1>PHP Path Test</h1>
    
    <div class="test-box">
        <img src="<?= IMG_PATH ?>logo.png" alt="Logo">
        <p>Testing paths:</p>
        <ul>
            <li><a href="/en/index.php">English Home</a></li>
            <li><a href="/fr/index.php">French Home</a></li>
        </ul>
    </div>
    
    <script src="<?= JS_PATH ?>script.js"></script>
</body>
</html>