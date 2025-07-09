<?php
require_once __DIR__ . '/../../../includes/functions.php';

$current_lang = 'fr';
$enrollment_id = $_GET['id'] ?? null;

include __DIR__ . '/../../../includes/header.php';
include __DIR__ . '/../../../includes/navigation.php';
?>

<section class="py-5 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h1 class="mb-3">Merci pour votre inscription!</h1>
                        <p class="lead mb-4">Votre demande d'inscription a bien été enregistrée.</p>
                        
                        <?php if ($enrollment_id): ?>
                        <div class="alert alert-info mb-4">
                            <p class="mb-0">Votre numéro de référence : <strong><?= htmlspecialchars($enrollment_id) ?></strong></p>
                        </div>
                        <?php endif; ?>
                        
                        <p>Nous avons envoyé une confirmation à votre adresse email. Notre équipe vous contactera sous peu pour finaliser votre inscription.</p>
                        
                        <div class="mt-5">
                            <a href="/fr/courses.php" class="btn btn-primary me-2">Voir nos autres formations</a>
                            <a href="/fr/index.php" class="btn btn-outline-primary">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>