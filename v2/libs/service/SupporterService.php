<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 30/03/2016
 * Time: 20:48
 * ---------------------------------------------------
 * Project: annamchi
 * @name: SupporterService.php
 * @package: libs\service
 * @author: nbchicong
 */

namespace libs\service;

include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB'].'libs/core/AbstractService.php';
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB'].'libs/data/ObjectWebService.php';

use libs\core\AbstractService;
use libs\data\ObjectWebService;

class SupporterService extends AbstractService{
  protected $table = 'support';

  public function getList() {
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `status`="true" ORDER BY `stt` ASC');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }
}