<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'fr';
$page_content = DB::getPageContent('index', $current_lang);
$banners = DB::getBanners($current_lang);
$benefits = DB::getBenefits($current_lang);
$featured_courses = DB::getCourses($current_lang, true, 3);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<!-- Banner Carousel -->
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach($banners as $index => $banner): ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <img src="<?= htmlspecialchars($banner['image_path']) ?>" class="d-block w-100" alt="<?= htmlspecialchars($banner['alt_text']) ?>">
            <div class="carousel-caption d-none d-md-block">
                <h2><?= htmlspecialchars($banner['title']) ?></h2>
                <p><?= htmlspecialchars($banner['description']) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>

<!-- How We Help Businesses Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5"><?= htmlspecialchars($page_content['section1_title'] ?? 'Comment nous aidons les entreprises') ?></h2>
        <div class="row g-4">
            <?php foreach($benefits as $benefit): ?>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi <?= htmlspecialchars($benefit['icon']) ?> text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <h4><?= htmlspecialchars($benefit['title']) ?></h4>
                        <p><?= htmlspecialchars($benefit['description']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5"><?= htmlspecialchars($page_content['section2_title'] ?? 'Cours en vedette') ?></h2>
        <div class="row g-4">
            <?php foreach($featured_courses as $course): ?>
            <div class="col-md-4">
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
        <div class="text-center mt-5">
            <a href="/<?= $current_lang ?>/courses.php" class="btn btn-outline-primary btn-lg">Voir tous nos cours</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>