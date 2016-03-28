	<?php
		if(!defined("hdc"))
			exit ();
	?>
<!-- BEGIN Block categories module -->
                                <div id="categories_block_left" class="block">
                                    <h4>Danh mục sản phẩm</h4>
                                    <div class="block_content">
                                        <ul class="tree">
										<?php
											$sqlstr = mysql_query("SELECT * FROM ".menu_product." WHERE status='true' 
																	AND parent = '0' ORDER BY stt ASC");
											if(mysql_num_rows($sqlstr)>0){
												$k = 0;
												while($row = mysql_fetch_array($sqlstr)){
													$k += 1;
										?>
                                            <li>
                                                <a href="product-<?=$row['id']?><?=$vip?>" title=""><?=$row['category']?></a>
                                                <ul>
												<?php
													if(isset($_GET['viewParent']) && $_GET['viewParent']!=""){
														$sqlstrSub = mysql_query("SELECT * FROM ".menu_product." WHERE status='true' 
																				AND parent='".intval($_GET['viewParent'])."' 
																				AND parent='".$row['id']."' ORDER BY stt ASC");
														if(mysql_num_rows($sqlstrSub)>0){
															while($rowSub = mysql_fetch_array($sqlstrSub)){
												?>
                                                    <li>
                                                        <a href="product-<?=$row['id']?>1101<?=$rowSub['id']?><?=$vip?>" title=""><?=$rowSub['category']?></a>
                                                    </li>
												<?php
															}
														}
													}
												?>
                                                </ul>
                                            </li>
										<?php
												}
											}
										?>
                                        </ul>
                                    </div>
                                </div>
                                <div id="help_online" class="block">
                                    <h4 style="font-size:16px;">Hỗ trợ trực tuyến</h4>
									<div class="block_content">
										<ul class="tree">
										<?php
											$sqlstr = mysql_query("SELECT * FROM ".support." WHERE status='true' ORDER BY stt ASC");
											if(mysql_num_rows($sqlstr)>0){
												while($row = mysql_fetch_array($sqlstr)){
													if($row['kind'] != '2'){
										?>
											<li style="text-align:center;">
												<a href="ymsgr:sendIM?<?=$row['nick']?>">
												<img src="http://opi.yahoo.com/online?u=<?=$row['nick']?>&m=g&t=2" alt="YM:<?=$row['fullname']?>" border=0><br/><?=$row['fullname']?><br/>0<?=$row['phone']?></a>
											</li>
										<?php
													}
													else{
										?>
											<li style="text-align:center;">
												<a href="skype:<?=$row['nick']?>?chat">
												<img src="images1/skypecall.gif" alt="Skype:<?=$row['fullname']?>" border=0><br/><?=$row['fullname']?><br/>0<?=$row['phone']?></a>
											</li>
										<?php
													}
												}
											}
										?>
										</ul>
									</div>
                                </div>
								<div id="new_soft" class="block">
									<h4 style="font-size:16px;">Sản phẩm mới</h4>
									<div class="block_content">
										<ul class="tree">
										<marquee direction="up" scrollamount="3" height="200px" onmouseover="this.stop()" onmouseout="this.start()">
										<?php
											$p = 10;
											$sqlstr = mysql_query("SELECT *	FROM ".product." WHERE status='true'  and picture <>'' ORDER BY postdate DESC limit $p");
											if(mysql_num_rows($sqlstr)>0){
												$i = 0;
												while($row = mysql_fetch_array($sqlstr)){
													$i += 1;
										?>
											<li>
												<a href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" id="tieudenho" title="<?=$row['title']?>">
													<img src="images/product/thumbs/<?=$row['picture']?>" width="150" border="0" title="<?=$row['title']?>" alt="<?=$row['title']?>" />
												</a>
												<a href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" id="tieude" title="<?=$row['title']?>"><?=$row['title']?></a>
												<div style="font-size: 1px; height: 5px;"></div>
											</li>
										<?php
												}
											}
										?>
										</marquee>
										</ul>
									</div>
								</div>
                              <div id="counter_online" class="block">
                                    <h4 style="font-size:16px;">Số lượt truy cập</h4>
									<div class="block_content">
										<ul class="tree">
<!-- Start counter code -->
<a href="http://annamchi.com" target="blank" >
<img alt="An Nam Chí Corp., counter" hspace="0" vspace="0" border="0" src="http://legitfreecounters.com/6014124-B0763F499CA788A01C28B4C4C84C9C9B/counter.img?theme=27&digits=6&siteId=6"/>
</a>
<noscript><br/><a href="http://www.slotgames-vote.com">www.slotgames-vote.com</a><br>The following text will not be seen after you upload your website, please keep it in order to retain your counter functionality <br> <a href="http://www.mcsweeneys.net/articles/ireel-a-users-guide" target="_blank">ireel</a></noscript>
<!-- End counter code -->
                                                                                </ul>
									</div>
                                </div><!--
								<div id="mapvietbando" class="block" style="position:absolute;">
									<script language="JavaScript">
										loadMap();
									</script>
								</div>-->
                                <script type="text/javascript">
                                    // <![CDATA[
                                    // we hide the tree only if JavaScript is activated
                                    $('div#categories_block_left ul.dhtml').hide();
                                    // ]]>
                                </script>
                                <!-- END Block categories module -->
								