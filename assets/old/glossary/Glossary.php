<?php
namespace OpenScope\Glossary;

require "Database.php";

class Glossary {
    private static $instance;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Glossary();
        }
        return self::$instance;
    }

    public function __construct() {
    }

    public static function getEntry() {
        $database = new Database();
        $mysqli = $database->getConnection();
        $mysqli->set_charset("utf8");

        $json = array();
        $sql = "
        SELECT ORIGINAL.WORD AS oword, TRANSLATION.WORD AS tword, TRANSLATION.CONTEXT, TRANSLATION.comment
        FROM ORIGINAL
        INNER JOIN TRANSLATION ON ORIGINAL.ID = TRANSLATION.ORIGINAL_ID
        ";

        if($result = $mysqli->query($sql)) {

            while($row = $result->fetch_assoc()) {
                $json[] = $row;
            }
            
            $result->close();
        }

        $mysqli->close();

        return $json;
    }

}

echo json_encode(Glossary::getEntry(), JSON_UNESCAPED_UNICODE);