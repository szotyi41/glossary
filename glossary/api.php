<?php
require 'search.php';

# Parsing API query
$query = parse_url($_SERVER["REQUEST_URI"])["query"];
parse_str($query, $params);

if (!isset($params["method"])) {
	echo "Method name missing!";
	http_response_code(400);
	return;
}

$glossary = Glossary::getInstance();

switch ($params["method"]) {
	case 'searchGlossary':
		$word = $params["word"];
		if (!isset($word)) {
			echo "Search word missing!";
			http_response_code(400);
			return;
		}
		$result = new SearchResults($word);
		$translation = new Translation($glossary->getEntry($word));
		$result->addTranslation($translation);

		if ($result === null) {
			echo "No result found!";
		} else {
			echo json_encode($result);
		}
		break;

	default:
		echo "Invalid method!";
		http_response_code(400);
		return;
}


# Visszhang
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
