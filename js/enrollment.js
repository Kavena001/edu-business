// enrollment.js - Course enrollment form handling

document.addEventListener('DOMContentLoaded', function() {
    const enrollmentForm = document.getElementById('enrollmentForm');
    const successDiv = document.getElementById('enrollmentSuccess');
    const successMessage = document.getElementById('successMessageText');
    const courseTitleDisplay = document.getElementById('courseTitleDisplay');
    const courseDescription = document.getElementById('courseDescription');
    const courseIdField = document.getElementById('courseId');
    
    // Get selected course from localStorage
    const selectedCourseId = localStorage.getItem('selectedCourse');
    const selectedCourseTitle = localStorage.getItem('selectedCourseTitle');
    
    // Display course information
    if (selectedCourseTitle) {
        courseTitleDisplay.textContent = `Inscription: ${selectedCourseTitle}`;
        courseDescription.textContent = `Vous êtes sur le point de vous inscrire au cours "${selectedCourseTitle}". Veuillez remplir le formulaire ci-dessous pour compléter votre inscription.`;
    }
    
    if (selectedCourseId) {
        courseIdField.value = selectedCourseId;
    }
    
    // Form validation and submission
    enrollmentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
        
        // Check form validity
        if (!enrollmentForm.checkValidity()) {
            enrollmentForm.classList.add('was-validated');
            return;
        }
        
        // If form is valid, process enrollment
        processEnrollment();
    });
    
    // Process enrollment (simulated)
    function processEnrollment() {
        // Get form data
        const formData = {
            courseId: selectedCourseId,
            courseTitle: selectedCourseTitle,
            firstName: document.getElementById('enrollFirstName').value,
            lastName: document.getElementById('enrollLastName').value,
            email: document.getElementById('enrollEmail').value,
            phone: document.getElementById('enrollPhone').value,
            company: document.getElementById('enrollCompany').value,
            position: document.getElementById('enrollPosition').value,
            employeeCount: document.getElementById('enrollEmployeeCount').value,
            paymentOption: document.querySelector('input[name="paymentOption"]:checked').value,
            termsAccepted: true
        };
        
        // In a real implementation, you would send this data to a server
        console.log('Enrollment submitted:', formData);
        
        // Show success message
        enrollmentForm.classList.remove('was-validated');
        enrollmentForm.reset();
        successMessage.textContent = `Merci ${formData.firstName}, votre inscription au cours "${selectedCourseTitle}" a été enregistrée avec succès.`;
        successDiv.classList.remove('d-none');
        
        // Scroll to success message
        successDiv.scrollIntoView({ behavior: 'smooth' });
        
        // Clear course selection from storage
        localStorage.removeItem('selectedCourse');
        localStorage.removeItem('selectedCourseTitle');
    }
    
    // Custom validation for email field
    const emailField = document.getElementById('enrollEmail');
    emailField.addEventListener('input', function() {
        if (emailField.validity.typeMismatch) {
            emailField.setCustomValidity('Veuillez entrer une adresse email valide.');
        } else {
            emailField.setCustomValidity('');
        }
    });
    
    // Custom validation for phone field
    const phoneField = document.getElementById('enrollPhone');
    phoneField.addEventListener('input', function() {
        const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
        if (!phoneRegex.test(phoneField.value)) {
            phoneField.setCustomValidity('Veuillez entrer un numéro de téléphone valide.');
        } else {
            phoneField.setCustomValidity('');
        }
    });
});