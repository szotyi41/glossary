<?php
# API-kérés feldolgozása
$query = parse_url($_SERVER["REQUEST_URI"])["query"];
parse_str($query, $params);

#foreach ($params as $key => $value) {
#	echo $key . " " . $value;
#}

$ALLOWED_METHODS = array("getTranslation");

$method = $params["method"];
if (!isset($method)) {
	echo "Method name missing!";
	http_response_code(400);
	return;
} else if (!in_array($method, $ALLOWED_METHODS)) {
	echo "Invalid method!";
	http_response_code(400);
	return;
}

# Visszhang
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

echo json_encode($params);

