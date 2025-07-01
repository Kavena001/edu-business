document.addEventListener('DOMContentLoaded', function() {
    const languageButtons = document.querySelectorAll('.language-switcher');
    
    languageButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang');
            
            if (lang === 'en') {
                window.location.href = '../en/index.html';
            } else {
                window.location.href = '../fr/index.html';
            }
        });
        
        // Update active state based on current path
        const isFrench = window.location.pathname.includes('/fr/');
        if ((isFrench && this.getAttribute('data-lang') === 'fr') || 
            (!isFrench && this.getAttribute('data-lang') === 'en')) {
            this.classList.add('active', 'btn-light');
            this.classList.remove('btn-outline-light');
        } else {
            this.classList.remove('active', 'btn-light');
            this.classList.add('btn-outline-light');
        }
    });
});