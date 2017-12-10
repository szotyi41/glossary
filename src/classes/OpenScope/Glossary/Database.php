<?php
namespace OpenScope\Glossary;

use mysqli;

class Database {
  private static $instance;
  private $connection;

  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  private function __construct() {
  }

  public function getConnection() {
    if ($this->connection === null) {
      $this->connection = new mysqli("172.17.0.1", "openscope", "openscope", "openscope");
      if ($this->connection->connect_errno) {
        die("Failed to connect to MySQL: " . $this->connection->connect_error);
      }
    }
    return $this->connection;
  }
}
