<?php
	$sqlstr=mysql_query("SELECT * FROM ".ads." WHERE status='true' AND alignment='2' ORDER BY stt");
	if(mysql_num_rows($sqlstr)>0){
		while($row=mysql_fetch_array($sqlstr)){
			$ext = substr($row['picture'],-3,3);
			if($ext=='swf'){
				$width=getimagesize("images/ads/".$row['picture']);
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function() { 
		function tabContainer()
		{    	    
			var tab = $("<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"180\" height=\"<?=number_format($width[1]*180/$width[0],0)?>\">");
			var content = $("<param name=\"movie\" value=\"images/ads/<?=$row['picture']?>\"><param name=\"quality\" value=\"high\"><embed src=\"images/ads/<?=$row['picture']?>\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"180\" height=\"<?=number_format($width[1]*180/$width[0],0)?>\"></embed></object>");	    
	    
			if ($.browser.msie && $.browser.version.substr(0,1) < 7)
				tab.css({
					'position': 'absolute',
					'right': '16px'
				});
			else
				tab.css('position', 'fixed');
			
			tab.append(content);
    	
			$(document.body).append(tab);
		}		
		
		tabContainer();		
	});
</script>
<?php
			}else{
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function() { 
		function tabContainer()
		{    	    
			var tab = $("<div>");
			var content = $("<a href=\"<?=$row['link']?>\" target=\"_blank\" > <img src=\"images/ads/<?=$row['picture']?>\"  border=\"0\" width=\"178\"/></a></div>");	    
	    
			if ($.browser.msie && $.browser.version.substr(0,1) < 7)
				tab.css({
					'position': 'absolute',
					'right': '16px'
				});
			else
				tab.css('position', 'fixed');
			
			tab.append(content);
    	
			$(document.body).append(tab);
		}		
		
		tabContainer();		
	});
</script>
<?php
			}
		}
	}
?>