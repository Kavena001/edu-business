<?php
require_once __DIR__ . '/../../includes/functions.php';

// Vérifier que la méthode est POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /fr/contact.php");
    exit;
}

// Valider les champs obligatoires
$erreurs = [];
$champs_obligatoires = [
    'name' => 'Nom complet',
    'email' => 'Adresse email',
    'subject' => 'Sujet',
    'message' => 'Message',
    'consent' => 'Consentement'
];

foreach ($champs_obligatoires as $champ => $nom) {
    if (empty($_POST[$champ])) {
        $erreurs[] = "Le champ '$nom' est obligatoire.";
    }
}

// Valider l'email
if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'adresse email n'est pas valide.";
}

// Si erreurs, retourner au formulaire
if (!empty($erreurs)) {
    session_start();
    $_SESSION['form_erreurs'] = $erreurs;
    $_SESSION['form_data'] = $_POST;
    header("Location: /fr/contact.php");
    exit;
}

$db = DB::getInstance();
try {
    // Préparer la requête d'insertion
    $stmt = $db->prepare("INSERT INTO contact_submissions (
        name,
        email,
        phone,
        company,
        subject,
        message,
        ip_address,
        user_agent,
        language,
        created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'fr', NOW())");
    
    // Exécuter avec les données nettoyées
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
    
    // Envoyer un email de notification
    $to = "contact@formationpro.com";
    $subject = "Nouveau message de contact : " . htmlspecialchars($_POST['subject']);
    $message = "Vous avez reçu un nouveau message via le formulaire de contact :\n\n";
    $message .= "Nom : " . htmlspecialchars($_POST['name']) . "\n";
    $message .= "Email : " . htmlspecialchars($_POST['email']) . "\n";
    $message .= "Téléphone : " . (isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : "Non fourni") . "\n";
    $message .= "Entreprise : " . (isset($_POST['company']) ? htmlspecialchars($_POST['company']) : "Non fournie") . "\n";
    $message .= "Sujet : " . htmlspecialchars($_POST['subject']) . "\n";
    $message .= "Message :\n" . htmlspecialchars($_POST['message']) . "\n";
    
    $headers = "From: " . htmlspecialchars($_POST['email']) . "\r\n";
    $headers .= "Reply-To: " . htmlspecialchars($_POST['email']);
    
    mail($to, $subject, $message, $headers);
    
    // Envoyer un email de confirmation au visiteur
    $visitor_subject = "Confirmation de réception de votre message";
    $visitor_message = "Bonjour " . htmlspecialchars($_POST['name']) . ",\n\n";
    $visitor_message .= "Nous avons bien reçu votre message et vous en remercions.\n";
    $visitor_message .= "Notre équipe vous répondra dans les plus brefs délais.\n\n";
    $visitor_message .= "Voici un récapitulatif de votre message :\n";
    $visitor_message .= "Sujet : " . htmlspecialchars($_POST['subject']) . "\n";
    $visitor_message .= "Message : " . htmlspecialchars($_POST['message']) . "\n\n";
    $visitor_message .= "Cordialement,\nL'équipe de Formation Professionnelle";
    
    mail($_POST['email'], $visitor_subject, $visitor_message, $headers);
    
    // Rediriger vers la page de remerciement
    header("Location: /fr/contact_merci.php");
    exit;
    
} catch (PDOException $e) {
    error_log("Erreur du formulaire de contact : " . $e->getMessage());
    die("Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer plus tard.");
}
?>