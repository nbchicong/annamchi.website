<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 20:44
 * ---------------------------------------------------
 * Project: annamchi
 * @name: PageGuide.php
 * @package: libs\service
 * @author: nbchicong
 */

namespace libs\service;

include_once 'libs/core/AbstractService.php';
include_once 'libs/data/ObjectWebService.php';

use libs\core\AbstractService;
use libs\data\ObjectWebService;

class PageGuide extends AbstractService {
  protected $table = 'guide';

  public function getListPage() {
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` ORDER BY `id` ASC');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }

  public function getPage($pageId) {
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `id`='.$this->getText($pageId));
    return $this->fetchData($this->queryDb());
  }
}