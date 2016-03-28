<?
	$dbhost = "112.78.2.100";
		$dbuser = "annamchi_test";
		$dbpassword = "test@123456";
		$db = "annamchi_cloud_anc";
		$tenmien="http://annamchi.com";
		$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword") or die("Could not connect");
        mysql_select_db("$db") or die("Could not select database");
		mysql_query("SET NAMES 'UTF8'");
?>
