        </main> <!-- Close main container from header -->

        <!-- Footer -->
        <footer class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h5>Formation Professionnelle</h5>
                        <p class="small">
                            <?= ($current_language == 'fr') 
                                ? 'Améliorez vos compétences pour exceller dans votre carrière.'
                                : 'Improve your skills to excel in your career.' ?>
                        </p>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h5><?= ($current_language == 'fr') ? 'Liens rapides' : 'Quick Links' ?></h5>
                        <ul class="list-unstyled small">
                            <li><a href="index.php" class="text-white"><?= $page_titles['index'][$current_language] ?></a></li>
                            <li><a href="courses.php" class="text-white"><?= $page_titles['courses'][$current_language] ?></a></li>
                            <li><a href="about.php" class="text-white"><?= $page_titles['about'][$current_language] ?></a></li>
                            <li><a href="contact.php" class="text-white"><?= $page_titles['contact'][$current_language] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5><?= ($current_language == 'fr') ? 'Contact' : 'Contact' ?></h5>
                        <address class="small">
                            <?php
                            // You could even pull this from database
                            $contact_info = [
                                'fr' => [
                                    'email' => 'Email: info@formationpro.com',
                                    'phone' => 'Téléphone: +1 (514) 123-4567'
                                ],
                                'en' => [
                                    'email' => 'Email: info@formationpro.com',
                                    'phone' => 'Phone: +1 (514) 123-4567'
                                ]
                            ];
                            ?>
                            <?= $contact_info[$current_language]['email'] ?><br>
                            <?= $contact_info[$current_language]['phone'] ?>
                        </address>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="small mb-0">
                        &copy; <?= date('Y') ?> Formation Professionnelle. 
                        <?= ($current_language == 'fr') 
                            ? 'Tous droits réservés.' 
                            : 'All rights reserved.' ?>
                    </p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Language Switcher JS -->
        <script src="/assets/js/language-switcher.js"></script>
        
        <!-- Page-specific JS -->
        <?php if (file_exists("/assets/js/$current_page.js")): ?>
            <script src="/assets/js/<?= $current_page ?>.js"></script>
        <?php endif; ?>
        
        <!-- Initialize Bootstrap components -->
        <script>
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Initialize popovers
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            });
        </script>
    </body>
</html>