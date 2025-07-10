document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop) {
            // Scrolling down
            navbar.style.top = '0';
        } else {
            // Scrolling up
            navbar.style.top = '0';
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
});