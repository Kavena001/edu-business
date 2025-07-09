<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'fr';
$page_content = DB::getPageContent('about', $current_lang);
$team_members = DB::getTeamMembers($current_lang);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<!-- Section Mission -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-4">Notre Mission</h2>
                <p class="lead fw-bold text-primary mb-4">Transformer les compétences de vos employés en avantage concurrentiel</p>
                <p class="mb-5">Nous aidons les entreprises à développer les compétences clés de leurs équipes grâce à des formations professionnelles ciblées et adaptées aux besoins du marché actuel.</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-people-fill text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4>Experts du secteur</h4>
                        <p>Nos formateurs sont des professionnels en activité avec une expertise pratique dans leur domaine.</p>
                    </div>
                </div>
            </div>
            <!-- Plus d'avantages... -->
        </div>
    </div>
</section>

<!-- Section Équipe -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="mb-3">Notre équipe d'experts</h2>
                <p class="lead">Des formateurs passionnés avec une expérience terrain significative</p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php foreach($team_members as $member): ?>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="<?= htmlspecialchars($member['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($member['name']) ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($member['name']) ?></h5>
                        <p class="text-muted small"><?= htmlspecialchars($member['position']) ?></p>
                        <p class="card-text small"><?= htmlspecialchars($member['description']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Appel à l'action -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="mb-4">Prêt à développer les compétences de votre équipe?</h2>
        <p class="lead mb-4">Contactez-nous pour discuter de vos besoins en formation et découvrir nos solutions sur mesure.</p>
        <a href="/<?= $current_lang ?>/contact.php" class="btn btn-light btn-lg">Nous contacter</a>
    </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>