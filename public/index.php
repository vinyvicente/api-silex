<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;

$app = new \Silex\Application();
$app['api_service'] = function () use ($app) {
    return new \Api\Service($app);
};

$app->get('/{version}', function($version) use ($app) {
    return $app->json([
        'version' => $version,
        'timestamp' => (new DateTime())->format(DateTime::ISO8601),
    ]);
});

$app->match('/{version}/{context}/edit/{args}', function($version, $context, $args) {

})->method('GET|POST');

$app->match('/{version}/{context}/{args}', function($version, $context, $args) {

})->method('DELETE');

$app->match('/{version}/{context}', function($version, $context) {

})->method('GET');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return $app->json(['message' => $message], 400);
});

$app->run();
