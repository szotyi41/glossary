<?php

namespace OpenScope\Glossary;

require "Database.php";

class Glossary {

    private static $instance;
    public $database;
    public $connection;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Glossary();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->database = Database::getInstance();
        $this->connection = $this->database->getConnection(); 
        $this->connection->set_charset("utf8");
    }

    public function getResults($word) {

        $json = array();
        $sql = "
	      SELECT ORIGINAL.WORD AS oword, TRANSLATION.WORD AS tword, TRANSLATION.CONTEXT, TRANSLATION.comment
	      FROM ORIGINAL
	      INNER JOIN TRANSLATION ON ORIGINAL.ID = TRANSLATION.ORIGINAL_ID
	      WHERE ORIGINAL.WORD LIKE '" . $word . "%'
	      LIMIT 10
        ";

        if($result = $this->connection->query($sql)) {

            while($row = $result->fetch_assoc()) {
                $json[] = $row;
            }
            
            $result->close();
        }

        $this->connection->close();

        return json_encode($json, JSON_UNESCAPED_UNICODE);
    }

}

echo (new Glossary())->getResults($_GET["word"]);