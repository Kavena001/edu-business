<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'fr';
$page_content = DB::getPageContent('contact', $current_lang);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="mb-4">Contactez-nous</h1>
                <p class="lead">Nous sommes là pour répondre à vos questions sur nos formations.</p>
                
                <form id="contactForm" class="mt-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Sujet</label>
                        <input type="text" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer le message</button>
                </form>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Informations de contact</h3>
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-geo-alt text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Adresse</h5>
                                <p class="mb-0">123 Rue de la Formation<br>75000 Paris, France</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-telephone text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Téléphone</h5>
                                <p class="mb-0">+33 1 23 45 67 89</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-envelope text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p class="mb-0">contact@formationpro.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>