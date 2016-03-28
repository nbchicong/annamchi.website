<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta content="An Nam Chí cung cấp các mặt hàng quà tặng cho Doanh nghiệp và cá nhân" name="description" />
<meta content="An Nam Chi, An Nam Chí, Qua Tang, Quà Tặng, Doanh Nghiep, Ca Nhan" name="keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
header("Pragma: no-cache");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
if(($_SESSION['rate'] == '')||(!isset($_SESSION['rate']))) $_SESSION['rate'] = '1'.' '.'VND';
$explode = explode(' ',$_SESSION['rate']);
?>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link href="template/global.css" rel="stylesheet" type="text/css" media="all">
<link href="template/jquery.css" type="text/css" media="all">
<script type="text/javascript" src="template/js/jquery-1.3.1.min.js"></script>
							<script type="text/javascript" src="template/js/jQuery_Slider.js">
                            </script>
<script type="text/javascript">
							$(document).ready(function(){
								slideShow(); 
							});
							</script>
<script type="text/javascript" src="template/js/jQuery-Easing.js">
</script>
<script type="text/javascript" src="template/js/jQuery.SerialScroll.js">
</script>
<script type="text/javascript" src="template/js/js.effect.js">
</script>
<script type="text/javascript" language="JavaScript">
function scrool_auto() {
var vitri_top = document.getElementById("columns").offsetTop + 10;
self.scrollTo(0, vitri_top);
}
</script>
</head>
<body>
	<div id="wrapper1">
            <div id="wrapper2">
                <div id="wrapper3">
                    <!-- Header -->
<!-- BEGIN BANNER -->
					<div id="header">
                        <div id="header_right">
<? include "banner.php";?>
<!-- END BANNER -->
<?php
include "admin/define_data.php";
include "admin/config.php";
include "admin/sql.php";
include "admin/connect.php";
include "counter.php";
?>
<!-- BEGIN MENU TOP -->
 <? include "top.php";?>
<!-- END MENU TOP -->
<!-- BEGIN SLIDER -->
<? include "chuchay.php";?>
<!-- END SLIDER -->
						</div>
                    </div>
                    <div id="columns">
                        <div class="bg_center">
<!-- BEGIN LEFT -->
<!-- BEGIN CATEGORIES -->
                            <div id="left_column" class="column">
<? include "MenuLeft.php";?>
                            </div>
<!-- END CATEGORIES -->
<!-- END LEFT -->
<!-- BEGIN CENTER -->
                            <div id="center_column" class="center_column">
<?
	if(isset($_GET['page'])){
		if(file_exists("./".$_GET['page'].".php")){
			include "./".$_GET['page'].".php";
		}
	}else {
			include "center.php";
		}
?>
                            </div>
<!-- END CENTER -->
                        </div>
                    </div>
<!-- BEGIN FOOTER -->
                    <div id="footer_wrapper">
                        <div id="footer">
<? include "bottom.php";?>
                        </div>
                    </div>
<!-- END FOOTER -->
                </div>
            </div>
        </div>
</body>
</html>