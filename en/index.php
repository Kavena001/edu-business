<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Training | Home</title>
    
    <!-- Required Assets -->
    <link href="<?= CSS_PATH ?>style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <script src="<?= JS_PATH ?>script.js" defer></script>
    <script src="<?= JS_PATH ?>language-switcher.js" defer></script>
</head>
<body>
    <?php include ROOT_PATH . '/includes/header.php'; ?>
    
    <main class="container py-5">
        <h1>Welcome to Professional Training</h1>
        <img src="<?= IMG_PATH ?>banner.jpg" alt="Training Banner" class="img-fluid">
        
        <!-- Your content here -->
    </main>
    
    <?php include ROOT_PATH . '/includes/footer.php'; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>