<?php
/**
 * Created by PhpStorm.
 * User: vjavier
 * Date: 8/16/16
 * Time: 11:27 PM
 */

namespace V1\Repository;


class UserRepository extends RepositoryAbstract{

  protected $_table = 'users';
  protected $_table_index = 'users_id';

  public function save(&$user) {

    $userData = array(
      'name' => $user->getName()
    );

    if ($user->getId()) {
      $this->_db->update($this->_table, $userData, array('users_id' => $user->getId()));
    } else {
      $userData['created_at'] = time();

      $this->_db->insert($this->_table, $userData);
      $id = $this->_db->lastInsertId();
      $user->setId($id);
      $user->setCreatedAt($userData['created_at']);
    }

  }

}