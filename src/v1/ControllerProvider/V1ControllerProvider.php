<?php
namespace V1\ControllerProvider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;


class V1ControllerProvider implements ControllerProviderInterface {

  public function connect(Application $app) {
    $factory = $app['controllers_factory'];


    // Users
    $factory->get('/users',  'V1\Controller\Users::get');
    /*$factory->post('/users', [$this, 'post']);
    $factory->get('/users/{uid}', [$this, 'getUser']);
    $factory->put('/users/{uid}', [$this, 'update']);
    $factory->patch('/users/{uid}', [$this, 'update']);
    $factory->delete('/users/{uid}', [$this, 'delete']);


    $factory->get('/users/{uid}/logs',  [$this, 'getLogs']);
    $factory->post('/users/{uid}/logs', [$this, 'postLog']);
    $factory->get('/users/{uid}/logs/{lid}', [$this, 'getLog']);
    $factory->delete('/users/{uid}/logs/{lid}', [$this, 'deleteLog']);*/


    return $factory;
  }

}