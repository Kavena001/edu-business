<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'fr';
$course_slug = basename(__FILE__, '.php');
$course = DB::getCourseBySlug($course_slug, $current_lang);

if (!$course) {
    header("HTTP/1.0 404 Not Found");
    include __DIR__ . '/../../404.php';
    exit;
}

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<!-- En-tête du détail du cours -->
<header class="bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><?= htmlspecialchars($course['title']) ?></h1>
                <p class="lead"><?= htmlspecialchars($course['short_description']) ?></p>
            </div>
            <div class="col-md-4 text-end">
                <a href="/<?= $current_lang ?>/enrollment/enroll.php?course=<?= urlencode($course['slug']) ?>" 
                   class="btn btn-light btn-lg enroll-btn">S'inscrire maintenant</a>
            </div>
        </div>
    </div>
</header>

<!-- Contenu du cours -->
<section class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <img src="<?= htmlspecialchars($course['image_path']) ?>" class="img-fluid mb-4" alt="<?= htmlspecialchars($course['title']) ?>">
            <h2>Description du cours</h2>
            <p><?= nl2br(htmlspecialchars($course['long_description'])) ?></p>
            
            <h3 class="mt-4">Objectifs d'apprentissage</h3>
            <ul>
                <?php 
                $objectives = explode("\n", $course['learning_objectives']);
                foreach($objectives as $objective): 
                    if (trim($objective)): ?>
                    <li><?= htmlspecialchars(trim($objective)) ?></li>
                    <?php endif;
                endforeach; ?>
            </ul>
            
            <h3 class="mt-4">Public cible</h3>
            <p><?= htmlspecialchars($course['target_audience']) ?></p>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Détails du cours</h5>
                </div>
                <div class="card-body">
                    <p><strong>Durée:</strong> <?= htmlspecialchars($course['duration']) ?></p>
                    <p><strong>Effort:</strong> <?= htmlspecialchars($course['effort']) ?></p>
                    <p><strong>Niveau:</strong> <?= htmlspecialchars($course['level']) ?></p>
                    <p><strong>Langue:</strong> Français</p>
                    <p><strong>Certificat:</strong> Oui</p>
                    <a href="/<?= $current_lang ?>/enrollment/enroll.php?course=<?= urlencode($course['slug']) ?>" 
                       class="btn btn-primary btn-lg enroll-btn">S'inscrire maintenant</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>