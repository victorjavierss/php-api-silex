<?php
namespace Clock\Api;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;


class Logs implements ControllerProviderInterface {

  public function connect(Application $app) {
    $factory=$app['controllers_factory'];
    $factory->get('/', 'Clock\Api\Users::get');
    $factory->get('dem', 'Clock\Api\Users::dem');
    return $factory;
  }


  public function get(Request $request, Application $app)
  {
    return $app->json(array('m'=>'hello world'));
  }

  public function dem(Request $request, Application $app)
  {
    return $app->json(array('m'=>'demo'));
  }
}