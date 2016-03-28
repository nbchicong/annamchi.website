	
	<? if(!defined("hdc")) exit ();?>
<div style="font-size: 1px; height: 2px;"></div>
<script src="subCategory.js"></script>

 
   <table width="210" border="0" cellspacing="2" cellpadding="2" align="center"  bgcolor="#FFFFFF" id="bomd"  >
   <form action="index.php" method="get">
 <input type="hidden" name="page" value="resultSearch"> 
  <tr id="amdphai">
   <td ><span id="mdphai" >
   
 Tìm kiếm 
  
   </span></td>
  </tr>
 <tr >
	   
	   <td>
		<select name="category"   style="width:165" onChange="Category(this.value)">
		<option value="">-Chọn nhóm sản phẩm-</option>
		<? CategoryParent($_GET['category'],menu_product) ?>
	   </select>   </td>
	 </tr>
	 <tr >
	  
	   <td>
	   <div id="showSubCategory">
	   <select name="subCategory"  style="width:165" >
		<option value="">---Chọn tất cả--</option>        
		<?=Category($_GET['subCategory'],$_GET['category'],menu_product)?>
       
	   </select>   
		</div>   </td>
	 </tr>
   <tr>
   
    <td  align="left"> <input type="text" name="KeyWord" value="Từ khóa" size="15"   onfocus="this.value=''" > <input type="submit" name="button" id="button" value="Tìm"></td>
  </tr>
  
 </form>
  </table>
  
<div style="font-size: 1px; height: 2px;"></div>
<table width="210" border="0" cellspacing="0" cellpadding="0" align="center" id="bomd">
<tr>
<td id="amdphai" align="center"><span id="mdphai" >GIỎ HÀNG CỦA BẠN</span></td>
</tr>
<tr>
<td class="menuleft-top"></td>
</tr>
<tr>
<td class="menuleft-body">
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
<tr>
<td height="23" align="center"><b>Tổng: <?=number_format($_SESSION['total'],0,",",".")?> <?=$explode[1]?></b></td>
</tr>

<tr>
<td align="center"><a href="<?=$domain?>/at/shoppingCart<?=$vip?>" id="TextLeftCenter1"><img src="<?=$domain?>/at/images/icon_viewcart.gif" border="0" style="vertical-align:middle">&nbsp;Xem giỏ hàng</a></td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="menuleft-bottom"></td>
</tr>
</table>
<div style="font-size: 1px; height: 2px;"></div>

	<table width="210" border="0" cellspacing="0" cellpadding="0" align="center" id="bomd"  >
                
				 <tr>
                <td id="amdtrai" align="center"><span id="mdtrai" >sản phẩm mới nhất</span></td>
              </tr>	  
       
				 <tr>
                <td align="center" >
  


  <marquee   direction="up"   width="180" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">
<?
  $p=10;				 
					  $sqlstr = "SELECT *	FROM ".product." WHERE status='true'  and picture <>'' ";
				
		  $sqlstr .=" ORDER BY postdate DESC limit $p";
		  $sqlstr=mysql_query($sqlstr);	
		   if(mysql_num_rows($sqlstr)>0) {	     $i=0; 
            while($row=mysql_fetch_array($sqlstr)) {      $i+=1;
           ?>
	 			 <div align="center"> 
    	<a  href="productView_<?=$row['category']?>_<?=$row['subCategory']?>_<?=$row['id']?><?=$vip?>" id="tieude" title="<?=$row['title']?>"><?=$row['title']?></a> 
	 </div> 
	 <div align="center">    <a  href="productView_<?=$row['category']?>_<?=$row['subCategory']?>_<?=$row['id']?><?=$vip?>" id="tieudenho" title="<?=$row['title']?>">
<strong>Giá: </strong> <span id="gia"><? if($row['price']) {?>  <?=number_format($row['price']*$explode[0],0,",",".")?> <?=$explode[1]?> <? } else {?>Call <? }?>

	 <img src="images/product/thumbs/<?=$row['picture']?>"  width="150" border="0"  title="<?=$row['title']?>" alt="<?=$row['title']?>"  /> </a> </div>
	 <div style="font-size: 1px; height: 5px;"></div>
              <? } }	 ?>   
   
         
			  
         

   </marquee> 

   </td>
              </tr>	  
         </table> 
		 
		  <div style="font-size: 1px; height: 5px;"></div>
		 
		
  <table width="210" border="0" cellspacing="0" cellpadding="0" align="center"  id="bomd">
   <tr>
                <td id="amdphai" align="center" colspan="2"><span id="mdphai" >Tin BÀI nổi bật</span></td>
              </tr>	  


<?
  $p=10;				 
					  $sqlstr = "SELECT *	FROM ".product2." WHERE status='true' AND special = 'true' and picture <>'' ";
				
		  $sqlstr .=" ORDER BY postdate DESC limit $p";
		  $sqlstr=mysql_query($sqlstr);	
		   if(mysql_num_rows($sqlstr)>0) {	     $i=0; 
            while($row=mysql_fetch_array($sqlstr)) {      $i+=1;
           ?>
	  <tr>
       <td   id="ttat" width="5%">
                     <img  src="images/product/thumbs/<?=$row['picture']?>" class="drag" width="50" border="0" align="left" title="<?=$row['title']?>" alt="<?=$row['title']?>"  /> </td>
    <td    id="ttat"  width="80%"> 	<a  href="serviceView_<?=$row['category']?>_<?=$row['subCategory']?>_<?=$row['id']?><?=$vip?>" id="tieudenho" title="<?=$row['title']?>"><?=$row['title']?></a> 
	  </td>
   </tr>
              <? } }	 ?>   
   
        
			  
         
</table>


	
		 
		 
		 
		 
		 	 <div style="font-size: 1px; height: 2px;"></div>

<table width="210" border="0" cellspacing="0" cellpadding="0" align="center" id="bomd"  >
                
				 <tr>
                <td align="center">
<?
          $sqlstr=mysql_query("SELECT * FROM ".intro." where id='4'");
		  if(mysql_num_rows($sqlstr)>0) {
		   
		   while($row=mysql_fetch_array($sqlstr)) {
		   
		   echo $row['full_intro'];
		  $em= $row['email'];
		   
	} } ?>


</td>
              </tr>	  
			  </table>


		 
	
	
	

    
  	  <div style="font-size: 1px; height: 5px;"></div>
			
		
		 			<table width="210" border="0" cellspacing="0" cellpadding="0" align="center"  id="bomd"  >
  
					 <tr>
                <td id="amdphai" align="center"><span id="mdphai" >QUẢNG CÁO</span></td>
              </tr>	  
					
					  <?
                      $sqlstr=mysql_query("SELECT * FROM ".ads." WHERE status='true' AND alignment='2' ORDER BY stt");
                      if(mysql_num_rows($sqlstr)>0) {
                       
                      while($row=mysql_fetch_array($sqlstr)) {
          	 $ext = substr($row['picture'],-3,3);
					  ?>   
					  <? if($ext=='swf') { ?>          
					  <tr >
						<td height="23"  align="center" >
						
						<? $width=getimagesize("images/ads/".$row['picture']);	?>
						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="180" height="<?=number_format($width[1]*180/$width[0],0)?>">
            <param name="movie" value=" images/ads/<?=$row['picture']?>">
            <param name="quality" value="high">
            <embed src="  images/ads/<?=$row['picture']?> " quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="180" height="<?=number_format($width[1]*180/$width[0],0)?>"></embed>
          </object> 
						
						</td>
					  </tr>
					   <? } else { ?> 
					   
					    <tr >
						<td height="23"  align="center" >
						<a href="<?=$row['link']?>" target="_blank" > <img src="images/ads/<?=$row['picture']?>"  border="0" width="178"/></a>
						</td>
					  </tr>
					   
					   
					   <? } ?>   
					 <? } }?>  
					
					
					
					
					
					
					
					
					                     
        </table>
	 <div style="font-size: 1px; height: 5px;"></div>
			
		 			<table width="210" border="0" cellspacing="0" cellpadding="0" align="center"  id="bomd"  >
  			  <tr>
                <td id="amdphai" align="center"><span id="mdphai" >Thống kê</span></td>
              </tr>	  
               <tr>
                <td height="23"  style="padding-left:10px; font-weight:bold">Đang truy cập: <? echo $online; ?>  </td></tr>
             
              
			  <?
                      $sqlstr=mysql_query("SELECT * FROM ".bodem." ORDER BY ID DESC limit 1 ");
					  
				
                      if(mysql_num_rows($sqlstr)>0) {
                       
                      while($row=mysql_fetch_array($sqlstr)) {
						mysql_query("UPDATE  ".bodem." SET tong=tong +1 ");
					
					  ?>             
					 
					 <tr>
                <td height="23"  style="padding-left:10px; font-weight:bold">Lượt truy cập: <?=$row['tong']+19000?>  </td></tr>
				
					 <? } }?>  
					
				        
</table>

			
			<br>
