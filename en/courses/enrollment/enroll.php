<?php
require_once __DIR__ . '/../../../includes/functions.php';

$current_lang = 'en';
$course_slug = $_GET['course'] ?? '';
$course = $course_slug ? DB::getCourseBySlug($course_slug, $current_lang) : null;

include __DIR__ . '/../../../includes/header.php';
include __DIR__ . '/../../../includes/navigation.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4"><?= $course ? "Enrollment: " . htmlspecialchars($course['title']) : "Course Enrollment" ?></h1>
                
                <?php if ($course): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Course Summary</h5>
                        <p><strong>Title:</strong> <?= htmlspecialchars($course['title']) ?></p>
                        <p><strong>Duration:</strong> <?= htmlspecialchars($course['duration']) ?></p>
                        <p><strong>Level:</strong> <?= htmlspecialchars($course['level']) ?></p>
                        <p><strong>Description:</strong> <?= htmlspecialchars($course['short_description']) ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <form id="enrollmentForm" method="POST" action="/<?= $current_lang ?>/enrollment/process_enrollment.php">
                    <input type="hidden" name="course_id" value="<?= $course ? htmlspecialchars($course['id']) : '' ?>">
                    
                    <h3 class="mb-3">Personal Information</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name*</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name*</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone Number*</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    
                    <h3 class="mt-4 mb-3">Company Information</h3>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="company" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="col-12">
                            <label for="position" class="form-label">Job Position</label>
                            <input type="text" class="form-control" id="position" name="position">
                        </div>
                        <div class="col-12">
                            <label for="employees" class="form-label">Number of Employees to Enroll</label>
                            <input type="number" class="form-control" id="employees" name="employee_count" min="1" value="1">
                        </div>
                    </div>
                    
                    <h3 class="mt-4 mb-3">Payment Information</h3>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Payment Method*</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="credit_card" checked required>
                                <label class="form-check-label" for="creditCard">
                                    Credit Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="invoice" value="invoice" required>
                                <label class="form-check-label" for="invoice">
                                    Invoice My Company
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="/<?= $current_lang ?>/terms.php">terms and conditions</a>*
                        </label>
                    </div>
                    
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                        <label class="form-check-label" for="newsletter">
                            Subscribe to our newsletter
                        </label>
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Complete Enrollment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Store course in localStorage when enroll button is clicked
    const enrollButtons = document.querySelectorAll('.enroll-btn');
    enrollButtons.forEach(button => {
        button.addEventListener('click', function() {
            const courseSlug = '<?= $course_slug ?>';
            if (courseSlug) {
                localStorage.setItem('selectedCourse', courseSlug);
                localStorage.setItem('selectedCourseTitle', '<?= $course ? addslashes($course['title']) : "" ?>');
            }
        });
    });
    
    // Form validation
    const form = document.getElementById('enrollmentForm');
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});
</script>

<?php include __DIR__ . '/../../../includes/footer.php'; ?>