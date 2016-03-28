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

include_once $_SERVER['DOCUMENT_ROOT'].'/libs/utils/common/Common.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/static/cmheader.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
  <meta content="An Nam Chí cung cấp các mặt hàng quà tặng cho Doanh nghiệp và cá nhân" name="description" />
  <meta content="An Nam Chi, An Nam Chí, Qua Tang, Quà Tặng, Doanh Nghiep, Ca Nhan" name="keywords" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="<?=$appHome;?>images/favicon.ico" type="image/x-icon" />
  <link href="<?=$appHome;?>css/style.css" rel="stylesheet" type="text/css" media="all">
  <script type="text/javascript" src="<?=STATIC_JQUERY;?>"></script>
  <script type="text/javascript" src="<?=$appHome;?>js/jquery/plugins/jquery.slider.js"></script>
  <script type="text/javascript" src="<?=$appHome;?>js/jquery/plugins/jquery.easing.js"></script>
  <script type="text/javascript" src="<?=$appHome;?>js/jquery/plugins/jquery.serialscroll.js"></script>
  <script type="text/javascript" src="<?=$appHome;?>js/jquery/plugins/jquery.effect.js"></script>
  <script type="text/javascript" src="<?=$appHome;?>js/jquery/application.js"></script>
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
              include_once 'box/contact.php';
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