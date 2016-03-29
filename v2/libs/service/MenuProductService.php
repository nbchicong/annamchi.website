<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 30/03/2015
 * Time: 06:08
 * ---------------------------------------------------
 * Project: annamchi
 * @name: MenuProductService.php
 * @package: libs\service
 * @author: nbchicong
 */

namespace libs\service;

include_once 'libs/core/AbstractService.php';
include_once 'libs/data/ObjectWebService.php';

use libs\core\AbstractService;
use libs\data\ObjectWebService;;

class MenuProductService extends AbstractService {
  protected $table = 'menu_product';
  public function getList() {
    $this->setQueryStr('SELECT * FROM `'. $this->getTableName() .'` WHERE `status`="true" 
                        AND `parent` = "0" ORDER BY `stt` ASC');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }
}