<footer class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5><?= $current_lang == 'fr' ? 'Formation Professionnelle' : 'Professional Training' ?></h5>
                <p class="small"><?= $current_lang == 'fr' ? 'Améliorez vos compétences pour exceller dans votre carrière.' : 'Improve your skills to excel in your career.' ?></p>
            </div>
            <div class="col-md-4">
                <h5><?= $current_lang == 'fr' ? 'Liens rapides' : 'Quick Links' ?></h5>
                <ul class="list-unstyled small">
                    <li><a href="/<?= $current_lang ?>/index.php" class="text-white"><?= $current_lang == 'fr' ? 'Accueil' : 'Home' ?></a></li>
                    <li><a href="/<?= $current_lang ?>/courses.php" class="text-white"><?= $current_lang == 'fr' ? 'Cours' : 'Courses' ?></a></li>
                    <li><a href="/<?= $current_lang ?>/about.php" class="text-white"><?= $current_lang == 'fr' ? 'À propos' : 'About' ?></a></li>
                    <li><a href="/<?= $current_lang ?>/contact.php" class="text-white"><?= $current_lang == 'fr' ? 'Contact' : 'Contact' ?></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5><?= $current_lang == 'fr' ? 'Contact' : 'Contact' ?></h5>
                <address class="small">
                    <?= $current_lang == 'fr' ? 'Email' : 'Email' ?>: info@formationpro.com<br>
                    <?= $current_lang == 'fr' ? 'Téléphone' : 'Phone' ?>: +1 234 567 8900
                </address>
            </div>
        </div>
        <div class="text-center mt-2">
            <p class="small mb-0">&copy; <?= date('Y') ?> <?= $current_lang == 'fr' ? 'Formation Professionnelle. Tous droits réservés.' : 'Professional Training. All rights reserved.' ?></p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/language-switcher.js"></script>
<script src="/js/script.js"></script>
</body>
</html>