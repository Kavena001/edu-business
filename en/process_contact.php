<?php
require_once __DIR__ . '/../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /en/contact.php");
    exit;
}

// Validate and sanitize input
$required_fields = ['name', 'email', 'subject', 'message', 'consent'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        die("Error: Required field '$field' is missing.");
    }
}

$db = DB::getInstance();
try {
    $stmt = $db->prepare("INSERT INTO contact_submissions (
        name,
        email,
        phone,
        company,
        subject,
        message,
        ip_address,
        user_agent,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    
    $stmt->execute([
        htmlspecialchars($_POST['name']),
        filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : null,
        isset($_POST['company']) ? htmlspecialchars($_POST['company']) : null,
        htmlspecialchars($_POST['subject']),
        htmlspecialchars($_POST['message']),
        $_SERVER['REMOTE_ADDR'],
        $_SERVER['HTTP_USER_AGENT']
    ]);
    
    // Send email notification
    $to = "info@trainingpro.com";
    $subject = "New Contact Form Submission: " . htmlspecialchars($_POST['subject']);
    $message = "You have received a new contact form submission:\n\n";
    $message .= "Name: " . htmlspecialchars($_POST['name']) . "\n";
    $message .= "Email: " . htmlspecialchars($_POST['email']) . "\n";
    $message .= "Phone: " . (isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "N/A") . "\n";
    $message .= "Company: " . (isset($_POST['company']) ? htmlspecialchars($_POST['company']) : "N/A") . "\n";
    $message .= "Message:\n" . htmlspecialchars($_POST['message']) . "\n";
    
    $headers = "From: " . htmlspecialchars($_POST['email']);
    
    mail($to, $subject, $message, $headers);
    
    // Redirect to thank you page
    header("Location: /en/contact_thank_you.php");
    exit;
    
} catch (PDOException $e) {
    error_log("Contact form error: " . $e->getMessage());
    die("An error occurred while submitting your message. Please try again later.");
}
?>