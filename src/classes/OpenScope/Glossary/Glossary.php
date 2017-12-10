<?php
namespace OpenScope\Glossary;

class Glossary {
    private static $instance;
    private $database;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Glossary();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->database = Database::getInstance();
    }

    public function getEntry($word) {
        $connection = $this->database->getConnection();
        return null;
    }
}
