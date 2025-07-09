<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once ROOT_PATH . '/includes/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Courses</title>
    <!-- Required Assets -->
    <link href="<?= CSS_PATH ?>style.css" rel="stylesheet">
    <script src="<?= JS_PATH ?>script.js" defer></script>
    <script src="<?= JS_PATH ?>enrollment.js" defer></script>
</head>
<body>
    <?php include ROOT_PATH . '/includes/header.php'; ?>
    
    <main class="container py-5">
        <h1>Course Catalog</h1>
        
        <?php
        // Fetch courses from database
        $stmt = $db->prepare("SELECT * FROM courses WHERE language = 'en'");
        $stmt->execute();
        $courses = $stmt->fetchAll();
        
        foreach ($courses as $course): ?>
            <div class="course-card">
                <img src="<?= IMG_PATH . htmlspecialchars($course['image_path']) ?>" 
                     alt="<?= htmlspecialchars($course['title']) ?>">
                <h3><?= htmlspecialchars($course['title']) ?></h3>
                <a href="/en/courses/<?= htmlspecialchars($course['slug']) ?>.php" 
                   class="btn btn-primary">View Details</a>
            </div>
        <?php endforeach; ?>
    </main>
    
    <?php include ROOT_PATH . '/includes/footer.php'; ?>
</body>
</html>