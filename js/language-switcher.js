document.addEventListener('DOMContentLoaded', function() {
    // This functionality is now handled server-side in the navigation.php
    // This file can be used for additional client-side language switching if needed
    
    // Example: Save language preference in localStorage
    const languageLinks = document.querySelectorAll('.language-switcher');
    
    languageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const lang = this.textContent.trim().toLowerCase();
            localStorage.setItem('preferred_language', lang);
        });
    });
    
    // Check for preferred language on page load
    const preferredLang = localStorage.getItem('preferred_language');
    if (preferredLang) {
        const currentLang = window.location.pathname.includes('/fr/') ? 'fr' : 'en';
        if (preferredLang !== currentLang) {
            // Redirect to preferred language version if different
            window.location.href = window.location.href.replace(
                `/${currentLang}/`, 
                `/${preferredLang}/`
            );
        }
    }
});