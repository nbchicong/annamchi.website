<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 02/04/2015
 * Time: 10:13 AM
 * ---------------------------------------------------
 * Project: annamchi.website
 * @name: ContactModel.php
 * @package: libs\model
 * @author: nbchicong
 */
/**
 * Class ContactModel
 * @package libs\model
 */


namespace libs\model;

class ContactModel {
  private $id;
  private $fullname;
  private $address;
  private $telephone;
  private $email;
  private $title;
  private $content;
  private $postdate = "";
  private $status = false;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getFullname() {
    return $this->fullname;
  }

  /**
   * @param mixed $fullname
   */
  public function setFullname($fullname) {
    $this->fullname = $fullname;
  }

  /**
   * @return mixed
   */
  public function getAddress() {
    return $this->address;
  }

  /**
   * @param mixed $address
   */
  public function setAddress($address) {
    $this->address = $address;
  }

  /**
   * @return mixed
   */
  public function getTelephone() {
    return $this->telephone;
  }

  /**
   * @param mixed $telephone
   */
  public function setTelephone($telephone) {
    $this->telephone = $telephone;
  }

  /**
   * @return mixed
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email) {
    $this->email = $email;
  }

  /**
   * @return mixed
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @param mixed $title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * @return mixed
   */
  public function getContent() {
    return $this->content;
  }

  /**
   * @param mixed $content
   */
  public function setContent($content) {
    $this->content = $content;
  }

  /**
   * @return int
   */
  public function getPostdate() {
    return $this->postdate;
  }

  /**
   * @param int $postdate
   */
  public function setPostdate($postdate) {
    $this->postdate = $postdate;
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
  }

}