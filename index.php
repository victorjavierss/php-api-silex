<?php

require_once __DIR__ . '/vendor/autoload.php';

use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;

use V1\ControllerProvider;

define ('RESPONSE_CODE_ERROR', 400);
define ('RESPONSE_CODE_OK', 200);

date_default_timezone_set('America/Mexico_City');


$app = new Silex\Application();

$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/settings.yml'));

$app['debug'] = true;

$app->register(new DoctrineServiceProvider(), array(
  'db.options' => $app['config']['database']
));


// Parsing JSON body request
$app->before(function (Request $request) {
  if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
    $data = json_decode($request->getContent(), true);
    $request->request->replace(is_array($data) ? $data : array());
  }
});

//Enabling CORS
/*$app->after(function (Request $request, Response $response) {
  //$response->headers->set('Access-Control-Allow-Origin', '*');
}); */


//Routing Set Up
$app->mount('/v1', new V1\ControllerProvider\V1ControllerProvider());


$app->run();