// language-switcher.js

document.addEventListener('DOMContentLoaded', function() {
    const languageButtons = document.querySelectorAll('.language-switcher');
    
    languageButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const targetLang = this.getAttribute('data-lang');
            const currentPath = window.location.pathname;
            
            // Determine new path based on current location
            let newPath;
            
            if (currentPath.includes('/fr/')) {
                // Replace /fr/ with /en/ in the path
                newPath = currentPath.replace('/fr/', '/en/');
            } else if (currentPath === '/fr' || currentPath === '/fr/' || currentPath === '/fr/index.html') {
                // Handle root French page
                newPath = '/en/index.html';
            } else {
                // Default fallback (shouldn't normally happen)
                newPath = '/en/index.html';
            }
            
            // Redirect to the English version
            window.location.href = newPath;
        });
        
        // Set active state
        const currentLang = window.location.pathname.includes('/fr/') ? 'fr' : 'en';
        if (this.getAttribute('data-lang') === currentLang) {
            this.classList.add('active');
            this.classList.remove('btn-outline-light');
            this.classList.add('btn-light');
        } else {
            this.classList.remove('active');
            this.classList.add('btn-outline-light');
            this.classList.remove('btn-light');
        }
    });
});