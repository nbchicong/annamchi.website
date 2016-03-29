<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 02:16
 * ---------------------------------------------------
 * Project: annamchi
 * @name: base.php
 * @package: libs\core
 * @author: nbchicong
 */

namespace libs\core;

class Base {
  private $configPath = "";
  
  public function setConfigPath($config) {
    $this->configPath = $config;
  }

  public function getConfigPath() {
    return $this->configPath;
  }

  public function getText(&$string) {
    $string = trim($string);
    $string = str_replace("\\'","'",$string);
    $string = str_replace("'","''",$string);
    $string = str_replace('\"',"&quot;",$string);
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    return $string;
  }
}