<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 02/04/2015
 * Time: 10:50 AM
 * ---------------------------------------------------
 * Project: annamchi.website
 * @name: Captcha.php
 * @package: libs\utils
 * @author: nbchicong
 */
/**
 * Class Captcha
 * @package libs\utils
 */

namespace libs\utils;

session_start();

class Captcha {
  const ANC_SS_CAPTCHA_CT1905 = 'ANC_CAPT_SLASH_FILE_CONTENT_BY_CT1905';
  private $ssCaptImg = self::ANC_SS_CAPTCHA_CT1905;
  private $captExt = '.png';
  private $captCharArr = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","p","q","r","s","t","u","v","w","x","y","x","0","1","2","3","4","5","6","7","8","9");

  private function getCaptImgName () {
    return $this->ssCaptImg.$this->captExt;
  }

  private function getCaptCharArr () {
    return $this->captCharArr;
  }

  private function getCaptSSImgPath () {
    return $_SESSION[$this->getCaptImgName()];
  }

  private function registerSession($key, $value) {
    $_SESSION[$key] = $value;
  }

  private function getCaptSSName() {
    return $this->ssCaptImg;
  }

  public function getCaptchaCached() {
    return $_SESSION[self::getCaptSSName()];
  }

  public function renderSimple() {
    if (@is_file(self::getCaptSSImgPath())) {
      @unlink(self::getCaptSSImgPath());
    }
    $charsArr = self::getCaptCharArr();
    $keys = @array_rand($charsArr, 6);
    $str = "";
    foreach($keys as $chars=>$char) {
      $str .= $charsArr[$char];
    }
    if (!@empty($str)) {
      self::registerSession(self::getCaptSSName(), $str);
    }
    return $str;
  }
}