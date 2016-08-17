<?php
namespace V1\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use V1\Entity\UserEntity;


class Users {

  public function get(Request $request, Application $app) {

    $users = $app['repository.user']->findAll(0);

    return $app->json($users);
  }

  public function getUser(Request $request, Application $app,  $uid) {
    $user = $app['repository.user']->find($uid);
    return $app->json($user);
  }

  public function post(Request $request, Application $app) {

    $user = new UserEntity();
    $user->setName($request->request->get('name'));

    $app['repository.user']->save($user);

    $uData = array(
      'id' => $user->getId(),
      'name' => $user->getName(),
      'created_at' => $user->getCreatedAt(),
    );

    return $app->json($uData, 201);
  }

  public function update(Request $request, Application $app, $uid) {

    $user = new UserEntity();
    $user->setName($request->request->get('name'));
    $user->setId($uid);

    $app['repository.user']->save($user);


    $uData = array(
      'id' => $user->getId(),
      'name' => $user->getName(),
      'created_at' => $user->getCreatedAt(),
    );


    return $app->json($uData, 201);
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