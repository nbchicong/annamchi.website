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
<style>
	.copyright{padding:5px 100px 0px 0; height:28px; width:65px; color:#000; font:11px tahoma; text-decoration:none;}
	.logo{background:url('images/ncnalogo.png') no-repeat; background-position:75px 0px;}
</style>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="table">
  <tr>
    <td colspan="2">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
			<tr>
				<td align="center" width="20%">
					<a href="http://www.annamchi.com"><img src="images/anclogo.jpg" border="0"/></a>
				</td>
				<td width="80%">
					<table bgcolor="#fff" width="100%" border="0">
						<tr>
							<td height="60" align="center">
								<span id="TextLeftCenter3m" style="font:20px Arial; color:#f00;">QUẢN TRỊ WEBSITE</span>
							</td>
						</tr>
						<tr>
							<td align="right">
								<a href="http://www.nbchicong.oni.cc">
									<p class="copyright logo">CopyRight &copy; </p>
								</a>
							<td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>    
  </tr>
   <tr>
    <td width="180" rowspan="3"  valign="top">
	<? include "left.php";?>
		</td>
    <td width="100%" valign="top" style="padding-left:10px;>		
			<?
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