<?php
namespace V1\ControllerProvider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use V1\Repository\UserRepository;


class V1ControllerProvider implements ControllerProviderInterface {

  public function connect(Application $app) {
    $factory = $app['controllers_factory'];


    // Inject USER repository
    $app['repository.user'] = $app->share(function ($app) {
      return new UserRepository($app['db']);
    });

    // Users
    $factory->get('/users',  'V1\Controller\Users::get');
    $factory->post('/users', 'V1\Controller\Users::post');
    $factory->get('/users/{uid}', 'V1\Controller\Users::getUser');
    $factory->put('/users/{uid}', 'V1\Controller\Users::update');
    $factory->post('/users/{uid}', 'V1\Controller\Users::update');
    $factory->patch('/users/{uid}', 'V1\Controller\Users::update');
    $factory->delete('/users/{uid}', 'V1\Controller\Users::delete');


    // Users -> Log
    $factory->get('/users/{uid}/logs',  'V1\Controller\Users::getLogs');
    $factory->post('/users/{uid}/logs', 'V1\Controller\Users::postLog');
    $factory->get('/users/{uid}/logs/{lid}', 'V1\Controller\Users::getLog');
    $factory->delete('/users/{uid}/logs/{lid}', 'V1\Controller\Users::deleteLog');


    return $factory;
  }

}