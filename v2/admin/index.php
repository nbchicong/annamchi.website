<?
ob_start();
session_start();
header("Pragma: no-cache");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
define("hdc","hdc",true);
if(!isset($_SESSION['idadminhdc5'])) {
	 header('location:login.php');
}
include "define_data.php";
include "config.php";
include "connect.php";
include "sql.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/style.css"  rel="stylesheet" type="text/css">

<title>Hệ thống quản trị nội dung website</title>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="table">
  <tr>
    <td colspan="2"  height="50" bgcolor="#fff" align="center">
	<img src="images/anclogo.jpg" alt="" style="float:top;" /> 
	</td>    
  </tr>
  <tr>
  	<td colspan="2" height="40" bgcolor="#8080ff">
	<span id="TextLeftCenter3m">Quản Trị Website</span>
	<?php
		$username = $_SESSION['fullname'];
		echo "<span id=\"thongbao\"> Chào ".$username." </span>";
	?>
	</td>
  </tr>
   <tr>
    <td width="180" rowspan="3"  valign="top">
	<?php include "left.php";?>
		</td>
    <td width="100%" valign="top" style="padding-left:10px" >		
			<?php
	if(file_exists("./".$_GET['site'].".php"))	  {
	   include "./".$_GET['site'].".php";
	   
	}
                else {
                include "center.php";
                }
                ?> 
	</td>
  </tr>
 
  <tr>
    <td colspan="2" height="50px">&nbsp;</td>   
  </tr>
</table>
</body>