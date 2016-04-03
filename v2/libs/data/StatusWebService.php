<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 02/04/2016
 * Time: 10:30 AM
 * ---------------------------------------------------
 * Project: annamchi.website
 * @name: StatusWebService.php
 * @package: libs\data
 * @author: nbchicong
 */
/**
 * Class StatusWebService
 * @package libs\data
 */


namespace libs\data;


class StatusWebService {
  private $output = array('status' => false);
  private $status = false;

  /**
   * StatusWebService constructor.
   * @param $status
   * @param array $data
   */
  public function __construct($status, $data = array()) {
    return $this->renderOutput($status, $data);
  }

  /**
   * @return boolean
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * @param boolean $status
   */
  public function setStatus($status) {
    $this->status = $status;
    $this->output['status'] = $this->getStatus();
  }

  /**
   * @return array
   */
  public function getOutput() {
    return $this->output;
  }

  public function renderOutput($status, $errors=array()) {
    $this->setStatus($status);
    if (!$this->getStatus()) {
      $this->output['errors'] = $errors;
    }
    return $this->output;
  }

}