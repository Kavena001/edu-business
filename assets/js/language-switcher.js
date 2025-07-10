// Language switching functionality
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.language-switcher').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.dataset.lang;
            const currentPath = window.location.pathname;
            const newPath = currentPath.replace(/^\/(en|fr)/, `/${lang}`);
            window.location.href = newPath || `/${lang}/index.php`;
        });
    });
});