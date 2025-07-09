<?php
// Enable all error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Basic configuration
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT_PATH . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Page</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <h1>Basic Test</h1>
    <p>If you see this, HTML is working.</p>
    <img src="/img/logo.png" alt="Test Logo" width="200">
    
    <?php
    echo "<p>PHP is working. Current time: " . date('Y-m-d H:i:s') . "</p>";
    
    // Test database connection
    try {
        require_once ROOT_PATH . '/includes/db_connect.php';
        echo "<p>Database connection successful</p>";
    } catch(PDOException $e) {
        echo "<p style='color:red'>Database error: " . $e->getMessage() . "</p>";
    }
    ?>
</body>
</html>