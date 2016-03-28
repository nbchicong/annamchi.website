<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 02:18
 * ---------------------------------------------------
 * Project: annamchi
 * @name: db.php
 * @package: v2\libs\core
 * @author: nbchicong
 */

namespace v2\libs\core;

use v2\libs\data\Constraints;

class Db extends Base {
  private $connection;
  private $isSelected = false;
  /**
   * @return mixed
   */
  public function getConnection() {
    return $this->connection;
  }

  /**
   * @param mixed $connection
   */
  public function setConnection($connection) {
    $this->connection = $connection;
  }

  /**
   * @return boolean
   */
  public function isSelected() {
    return $this->isSelected;
  }

  /**
   * @param boolean $isSelected
   */
  public function setSelected($isSelected) {
    $this->isSelected = $isSelected;
  }

  /**
   * Connect to database
   * @return mixed
   */
  public function connectDb() {
    $const = new Constraints();
    $connection = @mysql_connect($const->getDbHost(), $const->getDbUser(), $const->getDbPassword());
    if ($connection) {
      $this->setConnection($connection);
      return $this->selectDb();
    } else {
      die ("Can not connect to database host: " . $const->getDbHost());
    }
  }

  /**
   * @return mixed
   */
  public function selectDb() {
    $const = new Constraints();
    $isSelected = @mysql_select_db($const->getDbName(), $this->getConnection());
    if ($isSelected) {
      $this->setSelected(true);
      return $this->getConnection();
    } else {
      die ("Can not connect to database with name: " . $const->getDbName());
    }
  }

  /**
   * @param $str
   * @return bool
   */
  public function query($str) {
    if ($str)
      return @mysql_query($str, $this->getConnection());
    else
      return false;
  }
}