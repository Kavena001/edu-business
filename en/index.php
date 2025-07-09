<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'en';
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
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- How We Help Businesses Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5"><?= htmlspecialchars($page_content['section1_title'] ?? 'How We Help Businesses') ?></h2>
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
        <h2 class="text-center mb-5"><?= htmlspecialchars($page_content['section2_title'] ?? 'Featured Courses') ?></h2>
        <div class="row g-4">
            <?php foreach($featured_courses as $course): ?>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="<?= htmlspecialchars($course['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($course['short_description']) ?></p>
                        <a href="/<?= $current_lang ?>/courses/<?= htmlspecialchars($course['slug']) ?>.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="/<?= $current_lang ?>/courses.php" class="btn btn-outline-primary btn-lg">View All Courses</a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">What Our Clients Say</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="mb-3 text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="card-text">"The training has significantly improved our sales team's skills. We saw concrete results in just 3 months."</p>
                        <div class="d-flex align-items-center mt-auto">
                            <img src="/img/testimonial1.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Marie Dubois</h6>
                                <small class="text-muted">HR Director, TechSolutions</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- More testimonials... -->
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="mb-4">Ready to transform your team's skills?</h2>
        <p class="lead mb-4">Contact us for a free consultation and discover how we can meet your company's specific needs.</p>
        <a href="/<?= $current_lang ?>/contact.php" class="btn btn-light btn-lg me-3">Contact Us</a>
        <a href="/<?= $current_lang ?>/courses.php" class="btn btn-outline-light btn-lg">Explore Our Courses</a>
    </div>
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>