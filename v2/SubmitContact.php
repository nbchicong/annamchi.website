<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 02/04/2015
 * Time: 10:44 AM
 * ---------------------------------------------------
 * Project: annamchi.website
 * @name: submit.php
 * @package: dataservice\contact
 * @author: nbchicong
 */
/**
 * Class SubmitContact
 * @package dataservice\contact
 */

namespace libs\service;

include_once "common/common.php";
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB']."libs/model/ContactModel.php";
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB']."libs/data/StatusWebService.php";
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB']."libs/service/ContactService.php";
include_once $_SERVER['DOCUMENT_ROOT'].$_SESSION['SUB']."libs/utils/Captcha.php";

use libs\model\ContactModel;
use libs\data\StatusWebService;
use libs\utils\Captcha;

session_start();

class SubmitContact {
  public function submit() {
    $errors = array();
    $status = true;
    if (!$this->checkCaptcha($_POST["captcha"])) {
      $errors["captcha"] = "ERROR_CAPTCHA";
      $status = false;
    }
    if (@empty($_POST["fullname"])) {
      $errors["fullname"] = "FULLNAME_NOT_EMPTY";
      $status = false;
    }
    if (@empty($_POST["address"])) {
      $errors["address"] = "ADDRESS_NOT_EMPTY";
      $status = false;
    }
    if (@empty($_POST["telephone"])) {
      $errors["telephone"] = "TELEPHONE_NOT_EMPTY";
      $status = false;
    }
    if (@empty($_POST["email"])) {
      $errors["email"] = "EMAIL_NOT_EMPTY";
      $status = false;
    }
    if (@empty($_POST["title"])) {
      $errors["title"] = "TITLE_NOT_EMPTY";
      $status = false;
    }
    if (@empty($_POST["content"])) {
      $errors["content"] = "CONTENT_NOT_EMPTY";
      $status = false;
    }
    if ($status) {
      $contactService = new ContactService();
      $contact = new ContactModel();
      $contact->setFullname($_POST["fullname"]);
      $contact->setAddress($_POST["address"]);
      $contact->setTelephone($_POST["telephone"]);
      $contact->setEmail($_POST["email"]);
      $contact->setTitle($_POST["title"]);
      $contact->setContent($_POST["content"]);
      $contact->setPostdate(@time());
      $contact->setStatus(false);
      if (!$contactService->createContact($contact)) {
        $errors["create"] = "ERROR_CREATE";
      }
    }
    header("Content-type:application/json");
    echo $this->responseJSON(new StatusWebService(@empty($errors), $errors));
  }

  private function checkCaptcha($captcha) {
    $captchaCls = new Captcha();
    return $captchaCls->getCaptchaCached()==$captcha;
  }

  private function responseJSON(StatusWebService $data) {
    return json_encode($data->getOutput());
  }
}
$cls = new SubmitContact();
$cls->submit();