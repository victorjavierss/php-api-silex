<?php
/**
 * Created by PhpStorm.
 * User: vjavier
 * Date: 8/16/16
 * Time: 11:21 PM
 */

namespace V1\Entity;


class UserEntity {

  protected $id;
  protected $name;
  protected $createdAt;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTime $createdAt) {
    $this->createdAt = $createdAt;
  }

}