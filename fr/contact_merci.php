<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'fr';
include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<section class="py-5 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="bi bi-envelope-check-fill text-primary" style="font-size: 4rem;"></i>
                        </div>
                        <h1 class="mb-3">Message envoyé avec succès!</h1>
                        <p class="lead mb-4">Nous avons bien reçu votre message et vous en remercions.</p>
                        
                        <p>Notre équipe traitera votre demande dans les plus brefs délais. Vous avez reçu une copie de votre message à l'adresse email que vous avez fournie.</p>
                        
                        <div class="mt-5">
                            <a href="/fr/index.php" class="btn btn-primary">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>