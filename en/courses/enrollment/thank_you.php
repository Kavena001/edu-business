<?php
require_once __DIR__ . '/../../../includes/functions.php';

$current_lang = 'en';
$enrollment_id = $_GET['enrollment_id'] ?? null;

// If no enrollment ID, redirect to courses page
if (!$enrollment_id) {
    header("Location: /en/courses.php");
    exit;
}

// Get enrollment details from database
$db = DB::getInstance();
$enrollment = $db->prepare("SELECT e.*, c.title as course_title 
                           FROM enrollments e
                           LEFT JOIN courses c ON e.course_id = c.id
                           WHERE e.id = ?");
$enrollment->execute([$enrollment_id]);
$enrollment_data = $enrollment->fetch();

include __DIR__ . '/../../../includes/header.php';
include __DIR__ . '/../../../includes/navigation.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <!-- Success Icon -->
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        
                        <!-- Main Heading -->
                        <h1 class="mb-3">Enrollment Confirmed!</h1>
                        
                        <!-- Confirmation Message -->
                        <p class="lead text-muted mb-4">
                            Thank you for enrolling in our training program. Your registration is now complete.
                        </p>
                        
                        <!-- Enrollment Details -->
                        <div class="card mb-4 border-primary">
                            <div class="card-body text-start">
                                <h5 class="card-title">Enrollment Details</h5>
                                <ul class="list-unstyled">
                                    <?php if ($enrollment_data['course_title']): ?>
                                    <li><strong>Course:</strong> <?= htmlspecialchars($enrollment_data['course_title']) ?></li>
                                    <?php endif; ?>
                                    <li><strong>Reference ID:</strong> <?= htmlspecialchars($enrollment_id) ?></li>
                                    <li><strong>Date:</strong> <?= date('F j, Y', strtotime($enrollment_data['created_at'])) ?></li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Next Steps -->
                        <div class="alert alert-info text-start mb-4">
                            <h5 class="alert-heading">What Happens Next?</h5>
                            <ul class="mb-0">
                                <li>You'll receive a confirmation email with course details</li>
                                <li>Our team will contact you within 24 hours</li>
                                <li>Access instructions will be sent before the course starts</li>
                            </ul>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-3 d-md-block mt-4">
                            <a href="/en/courses.php" class="btn btn-primary px-4">
                                <i class="bi bi-book me-2"></i>Browse More Courses
                            </a>
                            <a href="/en/index.php" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-house me-2"></i>Return Home
                            </a>
                        </div>
                        
                        <!-- Support Info -->
                        <div class="mt-5 pt-3 border-top">
                            <p class="small text-muted">
                                Need help? Contact our support team at 
                                <a href="mailto:support@trainingpro.com">support@trainingpro.com</a>
                                or call +1 (800) 123-4567
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>