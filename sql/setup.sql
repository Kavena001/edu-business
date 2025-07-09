-- Create database
CREATE DATABASE IF NOT EXISTS professional_training CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user
CREATE USER IF NOT EXISTS 'training_user'@'localhost' IDENTIFIED BY 'secure_password_123';
GRANT ALL PRIVILEGES ON professional_training.* TO 'training_user'@'localhost';
FLUSH PRIVILEGES;

USE professional_training;

-- Pages table
CREATE TABLE pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_name VARCHAR(50) NOT NULL,
    language ENUM('fr', 'en') NOT NULL,
    title VARCHAR(255) NOT NULL,
    meta_description TEXT,
    section1_title VARCHAR(255),
    section1_content TEXT,
    section2_title VARCHAR(255),
    section2_content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY (page_name, language)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Courses table
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    language ENUM('fr', 'en') NOT NULL,
    short_description TEXT,
    long_description TEXT,
    learning_objectives TEXT,
    target_audience TEXT,
    duration VARCHAR(50),
    effort VARCHAR(50),
    level VARCHAR(50),
    image_path VARCHAR(255),
    featured BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY (slug, language)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Banners table
CREATE TABLE banners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language ENUM('fr', 'en') NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_path VARCHAR(255) NOT NULL,
    alt_text VARCHAR(255),
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Benefits table
CREATE TABLE benefits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language ENUM('fr', 'en') NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(50) NOT NULL,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Team members table
CREATE TABLE team_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language ENUM('fr', 'en') NOT NULL,
    name VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
    description TEXT,
    image_path VARCHAR(255) NOT NULL,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data for English pages
INSERT INTO pages (page_name, language, title, meta_description, section1_title, section2_title) VALUES
('index', 'en', 'Professional Training | Home', 'Professional training courses to develop your team\'s skills', 'How We Help Businesses', 'Featured Courses'),
('courses', 'en', 'Professional Training | Courses', 'Browse all our professional training courses', 'Course Catalog', NULL),
('about', 'en', 'Professional Training | About', 'Learn about our mission and team of experts', 'Our Mission', 'Our Team of Experts'),
('course1', 'en', 'Professional Training | Project Management', 'Master the fundamentals of project management', NULL, NULL);

-- Sample data for French pages
INSERT INTO pages (page_name, language, title, meta_description, section1_title, section2_title) VALUES
('index', 'fr', 'Formation Professionnelle | Accueil', 'Formations professionnelles pour développer les compétences de votre équipe', 'Comment nous aidons les entreprises', 'Cours en vedette'),
('courses', 'fr', 'Formation Professionnelle | Cours', 'Parcourez tous nos cours de formation professionnelle', 'Catalogue de cours', NULL),
('about', 'fr', 'Formation Professionnelle | À propos', 'Découvrez notre mission et notre équipe d\'experts', 'Notre Mission', 'Notre équipe d\'experts'),
('course1', 'fr', 'Formation Professionnelle | Gestion de projet', 'Maîtrisez les fondamentaux de la gestion de projet', NULL, NULL);

-- Sample courses data (English)
INSERT INTO courses (title, slug, language, short_description, long_description, learning_objectives, target_audience, duration, effort, level, image_path, featured) VALUES
('Project Management', 'project-management', 'en', 'Master the fundamentals of project management and learn to successfully complete your projects.', 
'This comprehensive project management course will provide you with the tools and techniques needed to plan, execute and close projects successfully. You will learn modern project management methodologies and how to apply them in various professional contexts.',
'Understand the fundamentals of project management\nMaster planning and tracking tools\nLearn to manage risks and stakeholders\nDevelop project team leadership skills\nKnow how to use Agile and Waterfall methodologies',
'This course is aimed at beginner project managers, project team members, and any professional wishing to acquire project management skills.',
'6 weeks', '4-6 hours/week', 'Intermediate', '/img/courses/course1.jpg', 1),
('Business Communication', 'business-communication', 'en', 'Improve your communication skills for more effective interactions in the workplace.', 
'This course focuses on developing essential communication skills for professional environments. You will learn techniques for effective written and verbal communication, presentation skills, and how to handle difficult conversations.',
'Develop clear and concise writing skills\nImprove verbal communication and presentation skills\nLearn active listening techniques\nMaster professional email etiquette\nHandle difficult conversations effectively',
'Professionals at all levels who want to improve their workplace communication skills.',
'4 weeks', '3-5 hours/week', 'Beginner', '/img/courses/course2.jpg', 1);

-- Sample courses data (French)
INSERT INTO courses (title, slug, language, short_description, long_description, learning_objectives, target_audience, duration, effort, level, image_path, featured) VALUES
('Gestion de projet', 'gestion-de-projet', 'fr', 'Maîtrisez les fondamentaux de la gestion de projet et apprenez à mener vos projets à terme avec succès.', 
'Ce cours complet sur la gestion de projet vous fournira les outils et techniques nécessaires pour planifier, exécuter et clôturer des projets avec succès. Vous apprendrez les méthodologies modernes de gestion de projet et comment les appliquer dans divers contextes professionnels.',
'Comprendre les principes fondamentaux de la gestion de projet\nMaîtriser les outils de planification et de suivi\nApprendre à gérer les risques et les parties prenantes\nDévelopper des compétences en leadership d\'équipe projet\nSavoir utiliser les méthodologies Agile et Waterfall',
'Ce cours s\'adresse aux chefs de projet débutants, aux membres d\'équipes projet, et à tout professionnel souhaitant acquérir des compétences en gestion de projet.',
'6 semaines', '4-6 heures/semaine', 'Intermédiaire', '/img/courses/course1.jpg', 1),
('Communication d\'entreprise', 'communication-dentreprise', 'fr', 'Améliorez vos compétences en communication pour des interactions plus efficaces en milieu professionnel.', 
'Ce cours se concentre sur le développement des compétences essentielles en communication pour les environnements professionnels. Vous apprendrez des techniques pour une communication écrite et verbale efficace, des compétences en présentation et comment gérer des conversations difficiles.',
'Développer des compétences en rédaction claire et concise\nAméliorer la communication verbale et les compétences de présentation\nApprendre les techniques d\'écoute active\nMaîtriser l\'étiquette professionnelle des e-mails\nGérer efficacement les conversations difficiles',
'Professionnels de tous niveaux qui souhaitent améliorer leurs compétences en communication professionnelle.',
'4 semaines', '3-5 heures/semaine', 'Débutant', '/img/courses/course2.jpg', 1);

-- Sample banners (English)
INSERT INTO banners (language, title, description, image_path, alt_text, display_order) VALUES
('en', 'Develop Your Team\'s Skills', 'Professional training adapted to your company\'s needs', '/img/banner/banner1.jpg', 'Professional training', 1),
('en', 'Certifying Training', 'Improve the productivity and efficiency of your employees', '/img/banner/banner2.jpg', 'Skill development', 2),
('en', 'Flexible Learning', 'Online and in-person training adapted to your schedule', '/img/banner/banner3.jpg', 'Online learning', 3);

-- Sample banners (French)
INSERT INTO banners (language, title, description, image_path, alt_text, display_order) VALUES
('fr', 'Développez les compétences de votre équipe', 'Formations professionnelles adaptées aux besoins de votre entreprise', '/img/banner/banner1.jpg', 'Formation professionnelle', 1),
('fr', 'Formations certifiantes', 'Améliorez la productivité et l\'efficacité de vos employés', '/img/banner/banner2.jpg', 'Développement des compétences', 2),
('fr', 'Apprentissage flexible', 'Formations en ligne et en présentiel adaptées à vos horaires', '/img/banner/banner3.jpg', 'Apprentissage en ligne', 3);

-- Sample benefits (English)
INSERT INTO benefits (language, title, description, icon, display_order) VALUES
('en', 'Productivity Improvement', 'Our targeted training allows your employees to acquire practical skills that immediately improve their work performance.', 'bi-graph-up', 1),
('en', 'Talent Retention', 'Employees who benefit from professional development are more engaged and more likely to stay with your company.', 'bi-people', 2),
('en', 'Continuous Innovation', 'By training your teams in the latest trends and technologies, you foster a culture of innovation in your organization.', 'bi-lightbulb', 3);

-- Sample benefits (French)
INSERT INTO benefits (language, title, description, icon, display_order) VALUES
('fr', 'Amélioration de la productivité', 'Nos formations ciblées permettent à vos employés d\'acquérir des compétences pratiques qui améliorent immédiatement leur performance au travail.', 'bi-graph-up', 1),
('fr', 'Rétention des talents', 'Les employés qui bénéficient de développement professionnel sont plus engagés et plus susceptibles de rester dans votre entreprise.', 'bi-people', 2),
('fr', 'Innovation continue', 'En formant vos équipes aux dernières tendances et technologies, vous favorisez une culture d\'innovation dans votre organisation.', 'bi-lightbulb', 3);

-- Sample team members (English)
INSERT INTO team_members (language, name, position, description, image_path, display_order) VALUES
('en', 'Pierre Lefèvre', 'Business Management Expert', '15 years of experience in consulting for SMEs and management training.', '/img/team/team1.jpg', 1),
('en', 'Sophie Martin', 'HR Expert', 'Specialist in skills development and talent management.', '/img/team/team2.jpg', 2),
('en', 'Thomas Dubois', 'Digital Transformation Expert', 'Helps companies in their digital transition for 10 years.', '/img/team/team3.jpg', 3);

-- Sample team members (French)
INSERT INTO team_members (language, name, position, description, image_path, display_order) VALUES
('fr', 'Pierre Lefèvre', 'Expert en gestion d\'entreprise', '15 ans d\'expérience dans le conseil aux PME et la formation en management.', '/img/team/team1.jpg', 1),
('fr', 'Sophie Martin', 'Experte en ressources humaines', 'Spécialiste du développement des compétences et de la gestion des talents.', '/img/team/team2.jpg', 2),
('fr', 'Thomas Dubois', 'Expert en transformation digitale', 'Accompagne les entreprises dans leur transition numérique depuis 10 ans.', '/img/team/team3.jpg', 3);

-- Enrollments table
CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    company VARCHAR(255),
    position VARCHAR(255),
    employee_count INT DEFAULT 1,
    payment_method ENUM('credit_card', 'invoice') NOT NULL,
    newsletter BOOLEAN DEFAULT 0,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contact submissions table
CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    company VARCHAR(255),
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(45),
    user_agent TEXT,
    status ENUM('new', 'in_progress', 'resolved') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;