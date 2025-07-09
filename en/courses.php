<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'en';
$page_content = DB::getPageContent('courses', $current_lang);
$all_courses = DB::getCourses($current_lang);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<!-- Course Catalog Header -->
<header class="bg-primary text-white py-4">
    <div class="container">
        <h1><?= htmlspecialchars($page_content['title'] ?? 'Course Catalog') ?></h1>
        <p><?= htmlspecialchars($page_content['meta_description'] ?? 'All our training programs to develop your professional skills') ?></p>
    </div>
</header>

<!-- Courses Grid -->
<section class="container my-5">
    <div class="row">
        <?php foreach($all_courses as $course): ?>
        <div class="col-md-4 mb-4">
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
    
    <!-- Pagination would go here -->
</section>

<?php include __DIR__ . '/../../includes/footer.php'; ?>