<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 23:21
 * ---------------------------------------------------
 * Project: annamchi
 * @name: ProductService.php
 * @package: libs\service
 * @author: nbchicong
 */

namespace libs\service;

include_once 'libs/core/AbstractService.php';
include_once 'libs/data/ObjectWebService.php';

use libs\core\AbstractService;
use libs\data\ObjectWebService;

class ProductService extends AbstractService {
  protected $table = 'product';

  public function getListProduct() {
    $cate = "";
    $hasCate = false;
    if (@isset($_GET['cate'])) {
      if (!@empty($_GET['cate'])) {
        $cate = $this->getText($_GET['cate']);
        $hasCate = true;
      }
    }
    if (@isset($_GET['sub'])) {
      if (!@empty($_GET['sub'])) {
        $cate = $_GET['sub'];
        $hasCate = true;
      }
    }
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` ORDER BY id ASC');
    if ($hasCate) {
      $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `category=`'.$cate.' ORDER BY id ASC');
    }
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getSepcialProduct() {
    $this->setQueryStr('SELECT *	FROM `'. $this->getTableName() .'` WHERE `status`="true" AND `picture`<>"" ORDER BY `postdate` DESC LIMIT 10');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getHotProduct() {
    $this->setQueryStr('SELECT *	FROM `'. $this->getTableName() .'` WHERE `status`="true" AND `picture`<>"" ORDER BY `postdate` DESC LIMIT 10');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getProduct($productId) {
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `id`='.intval($productId));
    return $this->fetchData($this->queryDb());
  }
}