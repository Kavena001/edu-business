<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'fr';
$page_content = DB::getPageContent('courses', $current_lang);
$all_courses = DB::getCourses($current_lang);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<!-- En-tête du catalogue de cours -->
<header class="bg-primary text-white py-4">
    <div class="container">
        <h1><?= htmlspecialchars($page_content['title'] ?? 'Catalogue de cours') ?></h1>
        <p><?= htmlspecialchars($page_content['meta_description'] ?? 'Tous nos programmes de formation pour développer vos compétences professionnelles') ?></p>
    </div>
</header>

<!-- Grille des cours -->
<section class="container my-5">
    <div class="row">
        <?php foreach($all_courses as $course): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($course['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($course['short_description']) ?></p>
                    <a href="/<?= $current_lang ?>/courses/<?= htmlspecialchars($course['slug']) ?>.php" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Pagination -->
    <nav aria-label="Navigation des pages">
        <ul class="pagination justify-content-center">
            <li class="page-item active"><a class="page-link" href="/fr/courses.php">1</a></li>
            <li class="page-item"><a class="page-link" href="/fr/courses-page2.php">2</a></li>
            <li class="page-item"><a class="page-link" href="/fr/courses-page3.php">3</a></li>
        </ul>
    </nav>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>