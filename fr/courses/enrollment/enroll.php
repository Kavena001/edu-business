<?php
require_once __DIR__ . '/../../../includes/functions.php';

$current_lang = 'fr';
$course_slug = $_GET['course'] ?? '';
$course = $course_slug ? DB::getCourseBySlug($course_slug, $current_lang) : null;

include __DIR__ . '/../../../includes/header.php';
include __DIR__ . '/../../../includes/navigation.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4"><?= $course ? "Inscription : " . htmlspecialchars($course['title']) : "Inscription à un cours" ?></h1>
                
                <?php if ($course): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Résumé du cours</h5>
                        <p><strong>Titre:</strong> <?= htmlspecialchars($course['title']) ?></p>
                        <p><strong>Durée:</strong> <?= htmlspecialchars($course['duration']) ?></p>
                        <p><strong>Niveau:</strong> <?= htmlspecialchars($course['level']) ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <form id="enrollmentForm" method="POST" action="/<?= $current_lang ?>/enrollment/process.php">
                    <input type="hidden" name="course_id" value="<?= $course ? htmlspecialchars($course['id']) : '' ?>">
                    
                    <h3 class="mb-3">Informations personnelles</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    
                    <h3 class="mt-4 mb-3">Informations sur l'entreprise</h3>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="company" class="form-label">Nom de l'entreprise</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="col-12">
                            <label for="position" class="form-label">Poste occupé</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>
                    </div>
                    
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            J'accepte les <a href="/<?= $current_lang ?>/terms.php">conditions générales</a>
                        </label>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Soumettre l'inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>