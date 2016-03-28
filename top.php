<? if(!defined("hdc")) exit ();?>
<!-- BEGIN Block Menu TOP -->
<ul id="header_links">
	<li>
		<a href="<?=$tenmien?>" class="active">Trang chủ</a>
	</li>
	<?php
	$sqlstr=mysql_query("SELECT * FROM ".guide." ORDER BY id ASC");
	if(mysql_num_rows($sqlstr)>0){
		$k = 0;
		while($row=mysql_fetch_array($sqlstr)){
			$k +=1;
	?>
    <li>
		<a href="page-<?=$row['id']?><?=$vip?>"><?=$row['title']?></a>
	</li>
	<?php
	}}
	?>
	<li>
		<a href="contact<?=$vip?>">Liên hệ</a>
	</li>
</ul>
<!-- END Block Menu TOP -->