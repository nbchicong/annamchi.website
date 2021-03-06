<?php
/**
 * Copyright (c) 2014
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 09/11/2014
 * Time: 18:16
 * ---------------------------------------------------
 * Project: sotay
 * @name: index.php
 * @author: nbchicong
 */

ob_start();
session_start();
include_once 'common/common.php';
include_once 'libs/model/Db.php';
include_once 'libs/core/Base.php';
include_once 'libs/core/Db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi">
  <head>
    <meta content="An Nam Chí cung cấp các mặt hàng quà tặng cho Doanh nghiệp và cá nhân" name="description" />
    <meta content="An Nam Chi, An Nam Chí, Qua Tang, Quà Tặng, Doanh Nghiep, Ca Nhan" name="keywords" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="<?=$_SESSION['JQUERY_CORE'];?>"></script>
    <script type="text/javascript" src="<?=$_SESSION['SLIDER_PLUGIN'];?>"></script>
    <script type="text/javascript" src="<?=$_SESSION['EASING_PLUGIN'];?>"></script>
    <script type="text/javascript" src="<?=$_SESSION['SCROLL_PLUGIN'];?>"></script>
    <script type="text/javascript" src="<?=$_SESSION['EFFECT_PLUGIN'];?>"></script>
    <script type="text/javascript" src="<?=$_SESSION['APPLICATION_CORE'];?>"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="container-center">
          <div class="header">
            <?php include_once 'common/header.php';?>
            <?php include_once 'common/nav-top.php';?>
          </div>
          <?php include_once 'common/slider.php';?>
          <div class="content-wrapper">
            <div class="content-container">
              <?php include_once 'common/menu-left.php';?>
              <div class="box-content">
                <?php
                if (@isset($_GET['page']) && !@empty($_GET['page'])){
                  $box = $_GET['page'];
                  include_once 'box/'.$box.'.php';
                } else {
                  include_once 'box/list-product.php';
                }
                ?>
              </div>
            </div>
          </div>
          <?php include_once 'common/footer.php';?>
        </div>
      </div>
    </div>
  </body>
</html>