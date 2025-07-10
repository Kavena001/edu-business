<?php 
$page_title = "Contact";
$current_language = "fr";
require_once '../includes/header.php'; 

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data and insert into database
    // You would typically sanitize and validate the input first
    $name = $_POST['firstName'] . ' ' . $_POST['lastName'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $message = $_POST['message'];
    
    // Example of inserting into database
    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, company, message, language) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $company, $message, $current_language]);
        
        // Set success message
        $success_message = "Merci pour votre message ! Nous vous contacterons dès que possible.";
    } catch (PDOException $e) {
        $error_message = "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>

<!-- Contact Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center mb-4">Contactez-nous</h2>
                <p class="text-center mb-5">Vous avez des questions sur nos programmes de formation ? Remplissez le formulaire ci-dessous et notre équipe vous répondra dès que possible.</p>
                
                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?= $success_message ?></div>
                <?php elseif (isset($error_message)): ?>
                    <div class="alert alert-danger"><?= $error_message ?></div>
                <?php endif; ?>
                
                <form id="contactForm" method="POST" novalidate>
                    <!-- Form fields remain the same as in HTML -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Prénom *</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                            <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                        </div>
                        <!-- Other form fields... -->
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary px-4 py-2" type="submit">Envoyer le message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                    <i class="bi bi-geo-alt text-primary"></i>
                </div>
                <h4>Adresse</h4>
                <p>123 Rue de la Formation<br>Montréal, QC H3B 2Y5</p>
            </div>
            <!-- Other contact info... -->
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>