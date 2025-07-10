<?php
// includes/db_connect.php

// Hostinger MySQL database credentials
$host = "localhost"; // Hostinger typically uses localhost
$dbname = "u189409396_edu_business"; // Replace with your actual database name
$username = "u189409396_admin_phoenix1"; // Replace with your Hostinger MySQL username
$password = "Kavena2025"; // Replace with your Hostinger MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>