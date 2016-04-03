<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 20:44
 * ---------------------------------------------------
 * Project: annamchi
 * @name: AbstractService.php
 * @package: libs\core
 * @author: nbchicong
 */

namespace libs\core;

include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB']."libs/core/Base.php";
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB']."libs/core/Db.php";

class AbstractService extends Base {
  protected $table;
  protected $connection;
  protected $queryStr;
  private $dB;

  /**
   * AbstractService constructor.
   */
  public function __construct() {
    $this->dB = new Db();
    $this->dB->connectDb();
    $this->connection = $this->dB->selectDb();
  }

  protected function setQueryStr($str) {
    $this->queryStr = $str;
  }

  protected function getQueryStr() {
    return $this->queryStr;
  }

  protected function queryDb() {
    return $this->dB->query($this->getQueryStr());
  }

  protected function getTableName() {
    return TABLE_PREFIX.$this->table;
  }

  protected function fetchData($data, $both = false) {
    if ($both) {
      return $this->dB->fetch2ArrayBoth($data);
    }
    return $this->dB->fetch2ArrayAssoc($data);
  }

  protected function getNumRow($data) {
    return $this->dB->getNumRow($data);
  }

  protected function affectedRow() {
    return $this->dB->affectedRow();
  }
}