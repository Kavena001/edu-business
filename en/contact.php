<?php
require_once __DIR__ . '/../../includes/functions.php';

$current_lang = 'en';
$page_content = DB::getPageContent('contact', $current_lang);

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/navigation.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="mb-4">Contact Us</h1>
                <p class="lead">Have questions about our training programs? We're here to help.</p>
                
                <form id="contactForm" class="mt-4" method="POST" action="/<?= $current_lang ?>/process_contact.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name*</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company" name="company">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject*</label>
                        <select class="form-select" id="subject" name="subject" required>
                            <option value="" selected disabled>Select a subject</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Course Information">Course Information</option>
                            <option value="Corporate Training">Corporate Training</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Feedback">Feedback</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message*</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                        <label class="form-check-label" for="consent">
                            I consent to having this website store my submitted information*
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Contact Information</h3>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-geo-alt text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Address</h5>
                                <p class="mb-0">123 Training Street<br>Toronto, ON M5V 3L9<br>Canada</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-telephone text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Phone</h5>
                                <p class="mb-0">+1 (416) 123-4567<br>Mon-Fri, 9am-5pm EST</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-envelope text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p class="mb-0">info@trainingpro.com<br>Response within 24 hours</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                    <i class="bi bi-calendar-event text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5>Book a Consultation</h5>
                                <p class="mb-0"><a href="#" class="text-primary">Schedule a call</a> with our training advisor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.getElementById('contactForm');
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>