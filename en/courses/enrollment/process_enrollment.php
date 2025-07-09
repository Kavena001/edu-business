<?php
require_once __DIR__ . '/../../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /en/enrollment/enroll.php");
    exit;
}

// Validate and sanitize input
$required_fields = ['first_name', 'last_name', 'email', 'phone', 'terms'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        die("Error: Required field '$field' is missing.");
    }
}

$db = DB::getInstance();
try {
    $stmt = $db->prepare("INSERT INTO enrollments (
        course_id,
        first_name,
        last_name,
        email,
        phone,
        company,
        position,
        employee_count,
        payment_method,
        newsletter,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    
    $stmt->execute([
        $_POST['course_id'] ?? null,
        htmlspecialchars($_POST['first_name']),
        htmlspecialchars($_POST['last_name']),
        filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        htmlspecialchars($_POST['phone']),
        isset($_POST['company']) ? htmlspecialchars($_POST['company']) : null,
        isset($_POST['position']) ? htmlspecialchars($_POST['position']) : null,
        $_POST['employee_count'] ?? 1,
        $_POST['payment_method'] ?? 'credit_card',
        isset($_POST['newsletter']) ? 1 : 0
    ]);
    
    // Redirect to thank you page
    header("Location: /en/enrollment/thank_you.php?enrollment_id=" . $db->lastInsertId());
    exit;
    
} catch (PDOException $e) {
    error_log("Enrollment error: " . $e->getMessage());
    die("An error occurred during enrollment. Please try again later.");
}
?>