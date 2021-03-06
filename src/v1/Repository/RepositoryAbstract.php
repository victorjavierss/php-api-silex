<?php
/**
 * Created by PhpStorm.
 * User: vjavier
 * Date: 8/17/16
 * Time: 12:36 AM
 */

namespace V1\Repository;

use Doctrine\DBAL\Connection;


abstract class RepositoryAbstract implements RepositoryInterface {
  protected $_db;
  protected $_table = null;
  protected $_table_index = null;

  public function __construct(Connection $db) {
    $this->_db = $db;
  }

  public function delete($id) {

  }

  public function getCount() {

  }

  public function find($id){
    $sql = "SELECT * FROM {$this->_table} WHERE {$this->_table}_id = ?";

    return  $this->_db->fetchAssoc($sql, array($id));
  }

  public function findAll($limit, $offset = 0, $orderBy = '', $filterBy = array()) {

    $sql = "SELECT * FROM {$this->_table}";


    if ($orderBy) {
      $fieldsOrderBy = str_replace(':',' ', $orderBy);
      $sql .= ' ODER BY ' .$fieldsOrderBy;
    }

    return  $this->_db->fetchAll($sql);
  }
}