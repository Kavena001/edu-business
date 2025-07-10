<?php 
// Enable error reporting at the VERY TOP
error_reporting(E_ALL);
ini_set('display_errors', 1);
$page_title = "Accueil";
$current_language = "fr";
require_once '../includes/header.php';
require_once '../includes/db_connect.php';

// Rest of your French index page...

<!-- Carousel Banner -->
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/img/banner/banner1.jpg" class="d-block w-100" alt="Formation professionnelle">
            <div class="carousel-caption d-none d-md-block">
                <h2>Développez les compétences de votre équipe</h2>
                <p>Formations professionnelles adaptées aux besoins de votre entreprise</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/img/banner/banner2.jpg" class="d-block w-100" alt="Développement des compétences">
            <div class="carousel-caption d-none d-md-block">
                <h2>Formations certifiantes</h2>
                <p>Améliorez la productivité et l'efficacité de vos employés</p>
            </div>
        </div>
        <!-- Other carousel items... -->
    </div>
    <!-- Carousel controls... -->
</div>

<!-- How We Help Businesses Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Comment nous aidons les entreprises</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                            <i class="bi bi-graph-up text-primary"></i>
                        </div>
                        <h4>Amélioration de la productivité</h4>
                        <p>Nos formations ciblées permettent à vos employés d'acquérir des compétences pratiques qui améliorent immédiatement leur performance au travail.</p>
                    </div>
                </div>
            </div>
            <!-- Other cards... -->
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Cours en vedette</h2>
        <div class="row g-4">
            <?php
            // Example database query for featured courses
            $featured_courses = [
                [
                    'image' => '../assets/img/courses/course1.jpg',
                    'title' => 'Gestion de projet',
                    'description' => 'Maîtrisez les fondamentaux de la gestion de projet et apprenez à mener vos projets à terme avec succès.',
                    'link' => 'courses/course1.php'
                ],
                // Add other courses...
            ];
            
            foreach ($featured_courses as $course) {
                echo '<div class="col-md-4">
                    <div class="card h-100">
                        <img src="'.$course['image'].'" class="card-img-top" alt="'.$course['title'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$course['title'].'</h5>
                            <p class="card-text">'.$course['description'].'</p>
                            <a href="'.$course['link'].'" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
        <div class="text-center mt-5">
            <a href="courses.php" class="btn btn-outline-primary btn-lg">Voir tous nos cours</a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Ce que disent nos clients</h2>
        <div class="row">
            <?php
            // Example testimonials data
            $testimonials = [
                [
                    'rating' => 5,
                    'text' => '"Les formations ont considérablement amélioré les compétences de notre équipe commerciale..."',
                    'image' => '../assets/img/testimonial1.jpg',
                    'name' => 'Marie Dubois',
                    'position' => 'Directrice RH, TechSolutions'
                ],
                // Add other testimonials...
            ];
            
            foreach ($testimonials as $testimonial) {
                echo '<div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="mb-3 text-warning">';
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $testimonial['rating']) {
                                    echo '<i class="bi bi-star-fill"></i>';
                                } else {
                                    echo '<i class="bi bi-star"></i>';
                                }
                            }
                            echo '</div>
                            <p class="card-text">'.$testimonial['text'].'</p>
                            <div class="d-flex align-items-center mt-auto">
                                <img src="'.$testimonial['image'].'" alt="Client" class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-0">'.$testimonial['name'].'</h6>
                                    <small class="text-muted">'.$testimonial['position'].'</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="mb-4">Prêt à transformer les compétences de votre équipe?</h2>
        <p class="lead mb-4">Contactez-nous pour une consultation gratuite et découvrez comment nous pouvons répondre aux besoins spécifiques de votre entreprise.</p>
        <a href="contact.php" class="btn btn-light btn-lg me-3">Nous contacter</a>
        <a href="courses.php" class="btn btn-outline-light btn-lg">Explorer nos cours</a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>