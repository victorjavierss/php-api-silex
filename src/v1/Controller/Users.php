<?php
namespace V1\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class Users {

  public function get(Request $request, Application $app) {
    return $app->json(array('m'=>'/users GET'.$request->get('message')));
  }

  public function getUser(Request $request, Application $app,  $uid) {

    return $app->json(array('m'=>'/users GET'.$uid));
  }

  public function post(Request $request, Application $app) {
    $post = array(
      'METHOD' => 'post',
      'title' => $request->request->get('param1'),
      'body'  => $request->request->get('param2'),
    );

    return $app->json($post, 201);
  }

  public function update(Request $request, Application $app) {
    return $app->json(array('m'=>'/users PUT/PATCH'));
  }

  public function delete(Request $request, Application $app) {
    return $app->json(array('m'=>'/users delete'));
  }

  public function getLogs(Request $request, Application $app) {
    return $app->json(array('m'=>'/users/logs GET'));
  }

  public function postLog(Request $request, Application $app) {
    return $app->json(array('m'=>'/users/logs POST'));
  }

  public function getLog(Request $request, Application $app) {
    return $app->json(array('m'=>'/users/logs/{lid} GET'));
  }

  public function deleteLog(Request $request, Application $app) {
    return $app->json(array('m'=>'/users/logs DELETE'));
  }
}