<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 08/08/2015
 * Time: 4:17 PM
 * ---------------------------------------------------
 * Project: anmamchi
 * @name: ObjectWebService.php
 * @package: libs\data
 * @author: nbchicong
 */
/**
 * Class ObjectWebService
 * @package libs\data
 */


namespace libs\data;

class ObjectWebService {
  private $output = array(
      'total' => 0,
      'items' => array()
  );

  private $total = 0;

  /**
   * @param array $data
   * @param array $columns
   */
  public function __construct($data, $columns = array()) {
    return $this->renderData($data, $columns);
  }


  /**
   * @return int
   */
  public function getTotal() {
    return $this->total;
  }

  /**
   * @param int $total
   */
  public function setTotal($total) {
    $this->total = $total;
  }

  /**
   * @return array
   */
  public function getOutput() {
    return $this->output;
  }

  /**
   * @param array $output
   */
  public function setOutput($output) {
    $this->output = $output;
  }

  public function getItems() {
    $output = $this->getOutput();
    return $output['items'];
  }

  /**
   * @param array $data
   * @param array $columns
   * @return array
   */
  public function renderData($data, $columns = array()) {
    if ($data != null) {
      $this->setTotal(count($data));
      if (!@empty($columns)) {
        for ($i = 0; $i < count($data); $i++) {
          $row = array();
          for ($j = 0; $j < count($columns); $j++) {
            $column = $columns[$j];
            $row[$column] = $data[$i][$columns[$j]];
          }
          $this->output['items'] = $row;
        }
      } else {
        if ($this->getTotal() > 0) {
          $this->output['items'] = $data;
        }
      }
      $this->output['total'] = $this->getTotal();
    }
    return $this->output;
  }
}