<?php

require_once __DIR__ . '/vendor/autoload.php';

use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Provider\SerializerServiceProvider;

use V1\ControllerProvider;

define ('RESPONSE_CODE_ERROR', 400);
define ('RESPONSE_CODE_OK', 200);

date_default_timezone_set('America/Mexico_City');


$app = new Silex\Application();

$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/settings.yml'));
$app->register(new SerializerServiceProvider());


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

$app->view(function (array $controllerResult, Request $request) use ($app) {
  $acceptHeader = $request->headers->get('Accept');
  //$bestFormat = $app['negotiator']->getBest($acceptHeader, array('json', 'xml'));

  $format = 'json';

    return new Response($app['serializer']->serialize($controllerResult, $format), 200, array(
      "Content-Type" => $request->getMimeType($format)
    ));
});


//Enabling CORS
$app->after(function (Request $request, Response $response) {
  $response->headers->set('Access-Control-Allow-Origin', '*');
});


$app->error(function (\Exception $e, Request $request, $code) {
  switch ($code) {
    case 404:
      $message = 'The requested page could not be found.';
      break;
    default:
      $message = 'We are sorry, but something went terribly wrong.';
  }

  return new Response($message);
});


//Routing Set Up
$app->mount('/v1', new V1\ControllerProvider\V1ControllerProvider());



$app->run();