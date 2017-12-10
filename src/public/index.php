<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \OpenScope\Glossary\Glossary;
use \OpenScope\Glossary\SearchResults;
use \OpenScope\Glossary\Translation;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/search/{word}', function (Request $request, Response $response) {
    $word = $request->getAttribute('word');

    $glossary = Glossary::getInstance();
    $result = new SearchResults($word);
    $translation = new Translation($glossary->getEntry($word));
    $result->addTranslation($translation);

    if ($result !== null) {
        $response->getBody()->write(json_encode($result));
    }
});
$app->run();
