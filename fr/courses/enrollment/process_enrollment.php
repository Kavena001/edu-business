<?php
require_once __DIR__ . '/../../../includes/functions.php';

// Vérifier que la requête est bien POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /fr/enrollment/enroll.php");
    exit;
}

// Valider les champs obligatoires
$champs_obligatoires = ['first_name', 'last_name', 'email', 'phone', 'terms'];
foreach ($champs_obligatoires as $champ) {
    if (empty($_POST[$champ])) {
        die("Erreur : Le champ obligatoire '$champ' est manquant.");
    }
}

// Nettoyer et valider l'email
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Erreur : L'adresse email n'est pas valide.");
}

$db = DB::getInstance();
try {
    // Préparer la requête d'insertion
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
        language,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'fr', NOW())");
    
    // Exécuter la requête avec les données nettoyées
    $stmt->execute([
        $_POST['course_id'] ?? null,
        htmlspecialchars($_POST['first_name']),
        htmlspecialchars($_POST['last_name']),
        $email,
        htmlspecialchars($_POST['phone']),
        isset($_POST['company']) ? htmlspecialchars($_POST['company']) : null,
        isset($_POST['position']) ? htmlspecialchars($_POST['position']) : null,
        $_POST['employee_count'] ?? 1,
        $_POST['payment_method'] ?? 'credit_card',
        isset($_POST['newsletter']) ? 1 : 0
    ]);
    
    // Envoyer un email de confirmation
    $to = $email;
    $subject = "Confirmation d'inscription à la formation";
    $message = "Bonjour " . htmlspecialchars($_POST['first_name']) . ",\n\n";
    $message .= "Nous avons bien reçu votre inscription. Voici les détails :\n\n";
    
    if (!empty($_POST['course_id'])) {
        $course = DB::getCourseBySlug($_POST['course_id'], 'fr');
        if ($course) {
            $message .= "Formation : " . htmlspecialchars($course['title']) . "\n";
            $message .= "Durée : " . htmlspecialchars($course['duration']) . "\n";
        }
    }
    
    $message .= "\nNous vous contacterons sous peu pour finaliser votre inscription.\n\n";
    $message .= "Cordialement,\nL'équipe de Formation Professionnelle";
    
    $headers = "From: noreply@formationpro.com";
    mail($to, $subject, $message, $headers);
    
    // Rediriger vers la page de remerciement
    header("Location: /fr/enrollment/merci.php?id=" . $db->lastInsertId());
    exit;
    
} catch (PDOException $e) {
    error_log("Erreur d'inscription : " . $e->getMessage());
    die("Une erreur s'est produite lors de votre inscription. Veuillez réessayer plus tard.");
}
?>