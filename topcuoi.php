<? if(!defined("hdc")) exit ();?>

<table  border="0" cellspacing="0" cellpadding="0">


       <tr>
           <td  id="amenutop"  align="center">  <a href="index.php" id="menutop"> Home</a>   </td>
	 
	   
         <? $sqlstr=mysql_query("SELECT * FROM ".guide." 
		  ORDER BY id ASC");
		  if(mysql_num_rows($sqlstr)>0) { $k = 0;
		   
   		  while($row=mysql_fetch_array($sqlstr)) { $k +=1;
             ?> 
              <td   id="amenutop"  align="center"> <a href="intro_<?=$row['id']?><?=$vip?>" id="menutop"> <?=$row['title']?></a>                 </td>
             <? } } ?>  
   <td  id="amenutop"  align="center">  <a href="anh.html" id="menutop">Album</a>   </td>

	            <td  id="amenutop"  align="center">  <a href="contact<?=$vip?>" id="menutop"> Liên hệ</a>   </td>

	 
               <td>&nbsp;</td>
            </tr>
            
   	

</table>








