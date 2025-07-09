<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'en';
$page_content = DB::getPageContent('about', $current_lang);
$team_members = DB::getTeamMembers($current_lang);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<!-- Mission Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mb-4">Our Mission</h2>
                <p class="lead fw-bold text-primary mb-4">Transform your employees' skills into a competitive advantage</p>
                <p class="mb-5">We help companies develop key skills for their teams through targeted professional training adapted to current market needs.</p>
            </div>
        </div>
        
        <!-- Platform Features would go here -->
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="mb-3">Our Team of Experts</h2>
                <p class="lead">Passionate trainers with significant field experience</p>
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

<?php include __DIR__ . '/../../includes/footer.php'; ?>