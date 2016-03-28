<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 02:26
 * ---------------------------------------------------
 * Project: annamchi
 * @name: constraints.php
 * @package: v2\libs\data
 * @author: nbchicong
 */

namespace v2\libs\data;

class Constraints {
  private $dbHost = "";
  private $dbUser = "";
  private $dbPassword = "";
  private $dbName = "";
  private $domain = "http://annamchi.com";

  /**
   * @return string
   */
  public function getDbHost() {
    return $this->dbHost;
  }

  /**
   * @param string $dbHost
   */
  public function setDbHost($dbHost) {
    $this->dbHost = $dbHost;
  }

  /**
   * @return string
   */
  public function getDbUser() {
    return $this->dbUser;
  }

  /**
   * @param string $dbUser
   */
  public function setDbUser($dbUser) {
    $this->dbUser = $dbUser;
  }

  /**
   * @return string
   */
  public function getDbPassword() {
    return $this->dbPassword;
  }

  /**
   * @param string $dbPassword
   */
  public function setDbPassword($dbPassword) {
    $this->dbPassword = $dbPassword;
  }

  /**
   * @return string
   */
  public function getDbName() {
    return $this->dbName;
  }

  /**
   * @param string $dbName
   */
  public function setDbName($dbName) {
    $this->dbName = $dbName;
  }

  /**
   * @return string
   */
  public function getDomain() {
    return $this->domain;
  }

  /**
   * @param string $domain
   */
  public function setDomain($domain) {
    $this->domain = $domain;
  }
}