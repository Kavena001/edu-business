// contact-form.js - Form validation and submission

document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');

    // Form validation
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
        
        // Check form validity
        if (!contactForm.checkValidity()) {
            contactForm.classList.add('was-validated');
            return;
        }
        
        // If form is valid, process submission
        processFormSubmission();
    });

    // Process form submission (simulated)
    function processFormSubmission() {
        // In a real implementation, you would send the data to a server here
        console.log('Form submitted with data:', {
            firstName: document.getElementById('firstName').value,
            lastName: document.getElementById('lastName').value,
            company: document.getElementById('company').value,
            position: document.getElementById('position').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            interest: document.getElementById('interest').value,
            message: document.getElementById('message').value
        });
        
        // Show success message
        contactForm.classList.remove('was-validated');
        contactForm.reset();
        successMessage.classList.remove('d-none');
        
        // Scroll to success message
        successMessage.scrollIntoView({ behavior: 'smooth' });
        
        // Hide success message after 5 seconds
        setTimeout(() => {
            successMessage.classList.add('d-none');
        }, 5000);
    }

    // Custom validation for email field
    const emailField = document.getElementById('email');
    emailField.addEventListener('input', function() {
        if (emailField.validity.typeMismatch) {
            emailField.setCustomValidity('Veuillez entrer une adresse email valide.');
        } else {
            emailField.setCustomValidity('');
        }
    });
});