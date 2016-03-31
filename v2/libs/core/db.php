<?php
/**
 * Copyright (c) 2015 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 29/03/2015
 * Time: 02:18
 * ---------------------------------------------------
 * Project: annamchi
 * @name: db.php
 * @package: libs\core
 * @author: nbchicong
 */

namespace libs\core;

include_once 'libs/model/db.php';
use libs\model\DbModel;

class Db extends Base {
  private $connection;
  private $isSelected = false;
  /**
   * @return mixed
   */
  public function getConnection() {
    return $this->connection;
  }

  /**
   * @param mixed $connection
   */
  public function setConnection($connection) {
    $this->connection = $connection;
  }

  /**
   * @return boolean
   */
  public function isSelected() {
    return $this->isSelected;
  }

  /**
   * @param boolean $isSelected
   */
  public function setSelected($isSelected) {
    $this->isSelected = $isSelected;
  }

  /**
   * Connect to database
   * @return mixed
   */
  public function connectDb() {
    $model = new DbModel();
    $connection = @mysql_connect($model->getDbHost(), $model->getDbUser(), $model->getDbPassword());
    if ($connection) {
      $this->setConnection($connection);
      return $this->selectDb();
    } else {
      die ("Can not connect to database host: " . $model->getDbHost());
    }
  }

  /**
   * @return mixed
   */
  public function selectDb() {
    $model = new DbModel();
    $isSelected = @mysql_select_db($model->getDbName(), $this->getConnection());
    if ($isSelected) {
      $this->setSelected(true);
      mysql_query("SET NAMES 'UTF8'");
      return $this->getConnection();
    } else {
      die ("Can not connect to database with name: " . $model->getDbName());
    }
  }

  /**
   * @param $str
   * @return bool
   */
  public function query($str) {
    if ($str)
      return @mysql_query($str, $this->getConnection());
    else
      return false;
  }

  public final function convert2Json($data){
    if (!!$data) {
      if (@function_exists('json_encode')) { //Lastest versions of PHP already has this functionality.
        return @json_encode($data);
      }
      $parts = array();
      $isList = false;
      //Find out if the given array is a numerical array
      $keys = @array_keys($data);
      $maxLength = @count($data) - 1;
      if (($keys[ 0 ] == 0) and ($keys[ $maxLength ] == $maxLength)) {//See if the first key is 0 and last key is length - 1
        $isList = true;
        for ($i = 0; $i < @count($keys); $i++) { //See if each key correspondes to its position
          if ($i != $keys[ $i ]) { //A key fails at position check.
            $isList = false; //It is an associative array.
            break;
          }
        }
      }

      foreach ($data as $key => $value) {
        if (@is_array($value)) { //Custom handling for arrays
          if ($isList) { /* :RECURSION: */
            $parts[] = $this->convert2Json($value);
          } else {
            $parts[] = '"' . $key . '":' . $this->convert2Json($value);
          }
        } else {
          $str = '';
          if (!$isList) {
            $str = '"' . $key . '":';
          }
          //Custom handling for multiple data types
          if (@is_numeric($value)) { //Numbers
            $str .= $value;
          } elseif ($value === false) { //The booleans
            $str .= 'false';
          } elseif ($value === true) {
            $str .= 'true';
          } else { //All other things
            $str .= '"' . @addslashes($value) . '"';
          }
          // :TODO: Is there any more datatype we should be in the lookout for? (Object?)
          $parts[] = $str;
        }
      }
      $json = @implode(',', $parts);
      if ($isList) { //Return numerical JSON
        return '[' . $json . ']';
      }
      return '{' . $json . '}';//Return associative JSON
      //      return json_encode($data);
    } else {
      return null;
    }
  }
  public function fetch2ArrayBoth($data){
    $result = array();
    if ($data) {
      while ($item = @mysql_fetch_array($data, MYSQL_BOTH)) {
        @array_push($result, $item);
      };
    }
    return $result;
  }
  public function fetch2ArrayAssoc($data){
    $result = array();
    if ($data) {
      while ($item = @mysql_fetch_assoc($data)) {
        $keys = @array_keys($item);
        $tmp = array();
        foreach ($keys as $key) {
          if ($key == 'id') {
            $tmp[ 'id' ] = $item[ $key ];
          } else {
            $tmp[ $key ] = $item[ $key ];
          }
        }
        @array_push($result, $tmp);
      };
    }
    return $result;
  }

  public function getNumRow($data) {
    if ($data) {
      return @mysql_num_rows($data);
    }
    return 0;
  }

  public function affectedRow() {
    return @mysql_affected_rows();
  }

  public function fetch2JSON($data){
    if ($data) {
      $json = $this->convert2Json($this->fetch2ArrayAssoc($data));
      return $json;
    } else {
      return null;
    }
  }
}