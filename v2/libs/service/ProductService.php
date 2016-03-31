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

  public function getListProduct($special=false) {
    $cate = "";
    $hasCate = false;
    $hasSub = false;
    if (@isset($_GET['cate'])) {
      if (!@empty($_GET['cate'])) {
        $cate = intval($_GET['cate']);
        $hasCate = true;
      }
    }
    if (@isset($_GET['sub'])) {
      if (!@empty($_GET['sub'])) {
        $cate = intval($_GET['sub']);
        $hasSub = true;
      }
    }
    if (@isset($_GET['keywords'])) {
      if (!@empty($_GET['keywords'])) {
        $keywords = $this->getText($_GET['keywords']);
        $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `status`="true" 
                            AND (`title` LIKE "%'.$keywords.'%" OR FULL LIKE "%'.$keywords.'%" OR `tomtat` LIKE "%'.$keywords.'%")');
        return new ObjectWebService($this->fetchData($this->queryDb()));
      }
    }
    if ($special) {
      return $this->getSepcialProduct();
    }
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` ORDER BY id ASC');
    if ($hasSub) {
      $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `status`="true" AND `subCategory`="'.$cate.'" ORDER BY id ASC');
      return new ObjectWebService($this->fetchData($this->queryDb()));
    }
    if ($hasCate) {
      $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `status`="true" AND `category`="'.$cate.'" ORDER BY id ASC');
      return new ObjectWebService($this->fetchData($this->queryDb()));
    }
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getSepcialProduct() {
    $this->setQueryStr('SELECT *	FROM `'. $this->getTableName() .'` WHERE `status`="true" AND `picture`<>"" ORDER BY `postdate` DESC LIMIT 12');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getHotProduct() {
    $this->setQueryStr('SELECT *	FROM `'. $this->getTableName() .'` WHERE `status`="true" AND `picture`<>"" ORDER BY `postdate` DESC LIMIT 12');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getProduct($productId="") {
    if (@empty($productId)) {
      $productId = $_GET['id'];
    }
    $this->updateCountView($productId);
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `status`="true" AND `id`="'.intval($productId).'"');
    return $this->fetchData($this->queryDb());
  }

  private function updateCountView($productId) {
    $this->setQueryStr('UPDATE `'.$this->getTableName().'` SET solan=solan+1 WHERE `id`="'.intval($productId).'"');
    $this->queryDb();
  }
}