<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 02/04/2015
 * Time: 10:01 AM
 * ---------------------------------------------------
 * Project: annamchi.website
 * @name: ContactService.php
 * @package: libs\service
 * @author: nbchicong
 */
/**
 * Class ContactService
 * @package libs\service
 */


namespace libs\service;

include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB'].'libs/core/AbstractService.php';
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB'].'libs/data/ObjectWebService.php';
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB'].'libs/model/ContactModel.php';

use libs\core\AbstractService;
use libs\data\ObjectWebService;
use libs\model\ContactModel;

class ContactService extends AbstractService{
  protected $table = "contact";

  public function createContact(ContactModel $contact) {
    $this->setQueryStr('INSERT INTO `'.$this->getTableName().'` SET
                        `fullname`="'.$this->getText($contact->getFullname()).'",
                        `address`="'.$this->getText($contact->getAddress()).'",
                        `telephone`="'.$this->getText($contact->getTelephone()).'",
                        `email`="'.$this->getText($contact->getEmail()).'",
                        `title`="'.$this->getText($contact->getTitle()).'",
                        `content`="'.$this->getText($contact->getContent()).'",
                        `postdate`="'.$this->getText($contact->getPostdate()).'",
                        `status`="false"');
    $this->queryDb();
    return ($this->affectedRow()>0);
  }

  public function getContactById($contactId) {
    $this->setQueryStr('SELECT * FROM `'.$this->getTableName().'` WHERE `id`="'.$contactId.'"');
    return new ObjectWebService($this->fetchData($this->queryDb()));
  }
}