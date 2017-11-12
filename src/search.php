<?php
require 'database.php';

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

class SearchResults implements JsonSerializable {
  private $translations = [];
  private $original;

  public function __construct($original) {
    $this->original = $original;
  }

  public function addTranslation($translation) {
    $this->translations[] = $translation;
  }

  public function jsonSerialize() {
    return get_object_vars($this);
  }
}

class Translation implements JsonSerializable {
  private $context;
  private $word;
  private $comment;

  public function __construct($word) {
    $this->word = $word;
  }

  public function jsonSerialize() {
    return get_object_vars($this);
  }
}
