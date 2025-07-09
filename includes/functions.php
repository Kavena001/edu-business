<?php
require_once __DIR__ . '/../config/db_config.php';

class DB {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DB();
        }
        return self::$instance->connection;
    }
    
    public static function getPageContent($pageName, $language) {
        $db = self::getInstance();
        $stmt = $db->prepare("SELECT * FROM pages WHERE page_name = ? AND language = ?");
        $stmt->execute([$pageName, $language]);
        return $stmt->fetch();
    }
    
    public static function getCourses($language, $featured = false, $limit = null) {
        $db = self::getInstance();
        $sql = "SELECT * FROM courses WHERE language = ?";
        
        if ($featured) {
            $sql .= " AND featured = 1";
        }
        
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        $stmt = $db->prepare($sql);
        $stmt->execute([$language]);
        return $stmt->fetchAll();
    }
    
    public static function getCourseBySlug($slug, $language) {
        $db = self::getInstance();
        $stmt = $db->prepare("SELECT * FROM courses WHERE slug = ? AND language = ?");
        $stmt->execute([$slug, $language]);
        return $stmt->fetch();
    }
    
    public static function getBanners($language) {
        $db = self::getInstance();
        $stmt = $db->prepare("SELECT * FROM banners WHERE language = ? ORDER BY display_order ASC");
        $stmt->execute([$language]);
        return $stmt->fetchAll();
    }
    
    public static function getBenefits($language) {
        $db = self::getInstance();
        $stmt = $db->prepare("SELECT * FROM benefits WHERE language = ? ORDER BY display_order ASC");
        $stmt->execute([$language]);
        return $stmt->fetchAll();
    }
    
    public static function getTeamMembers($language) {
        $db = self::getInstance();
        $stmt = $db->prepare("SELECT * FROM team_members WHERE language = ? ORDER BY display_order ASC");
        $stmt->execute([$language]);
        return $stmt->fetchAll();
    }
}
?>