<? if(!defined("hdc")) exit ();?>
								<!-- BEGIN MODULE Home Featured Products -->
								<!-- BEGIN Breadcrumb -->
								<script language="JavaScript" type="text/javascript">
									scrool_auto();
								</script>
                                <div class="breadcrumb">
								<?php
									$sqlstr=mysql_query("SELECT * FROM ".menu_product." WHERE status='true' AND id='".$_GET['viewParent']."' ");
									if(mysql_num_rows($sqlstr)>0){
										$k = 0;
										while($row=mysql_fetch_array($sqlstr)){
											$k += 1;
											echo $row['category'];
											$tda= $row['category'];
										}
									}
									if(isset($_GET['viewSub']) && $_GET['viewSub']!='')
									$sqlstr=mysql_query("SELECT * FROM ".menu_product." WHERE status='true' AND id='".$_GET['viewSub']."' ");
									if(mysql_num_rows($sqlstr)>0){
										$k = 0;
										while($row=mysql_fetch_array($sqlstr)){
											$k +=1;
											echo "<span class=\"navigation-pipe\">&gt;</span><span class=\"navigation_end\">".$row['category']."</span>";
											$tdb= $row['category'];
										}
									}
								?>
                                </div>
                                <!-- END Breadcrumb -->
                                <div id="featured-products_block_center">
                                    <div class="block_content">
                                        <ul>
										<?php
											$p = 9;
											if(isset($_GET['viewParent']) && $_GET['viewParent']!='')  $sqlstr = "SELECT *	FROM ".product." WHERE status='true' AND category = '".intval($_GET['viewParent'])."' ";
											if(isset($_GET['viewSub']) && $_GET['viewSub']!='') $sqlstr = "SELECT *	FROM ".product." WHERE status='true' AND subCategory = '".intval($_GET['viewSub'])."' ";
											$page=mysql_query($sqlstr);
											$n_record=mysql_num_rows($page);
											num_page();
											if(isset($_GET['viewParent']) && isset($_GET['viewSub']) && isset($_GET['view'])){
												$link="product_".$_GET['viewParent']."_".$_GET['viewSub']."";
												$view=$_GET['view']?intval($_GET['view']):1;
												$s=($view-1)*$p;
												$sqlstr .=" ORDER BY postdate DESC limit $s,$p";
											}
											$sqlstr=mysql_query($sqlstr);
											if(mysql_num_rows($sqlstr)>0){
												$i = 0;
												while($row = mysql_fetch_array($sqlstr)){
													$i += 1;
										?>
                                            <li class="ajax_block_product">
                                                <a class="product_image" href="product-detail-<?=$row['category']?>-0-<?=$row['subCategory']?>-0-<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>">
													<img src="images/product/thumbs/<?=$row['picture']?>" alt="<?=$row['title']?>">
												</a>
                                                <div class="product_info">
                                                    <a class="product_image" href="product-detail-<?=$row['category']?>-0-<?=$row['subCategory']?>-0-<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"></a>
                                                    <h5>
														<a class="product_image" href="product-detail-<?=$row['category']?>-0-<?=$row['subCategory']?>-0-<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"></a>
														<a class="product_link" href="product-detail-<?=$row['category']?>-0-<?=$row['subCategory']?>-0-<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"><?=$row['title']?></a>
													</h5>
                                                </div>
											</li>
										<?php
													if($i%3 == 0)
														echo "<br />";
												}
											}
											else{
										?>
                                            <li style="width:100%; height:50px; color:#ff0000; font-size:15px; font-weight:bold; text-align:center;">
                                                Chưa có sản phẩm nào!.
                                            </li>
										<?php
											}
										?>
                                        </ul>
                                    </div>
									<div style="border:1px solid #f0f0f0; height:20px; margin:5px 0 0 20px; float:right; font-size:15px; color:#008000; font-weight:bold;">
										<?php
											view_page_view2($link);
										?>
									</div>
                                </div>
                                <!-- END MODULE Home Featured Products -->

<? if(isset($_GET['view'])){ ?>
<title> <?=$tda?> , <?=$tdb ?> ,<?=$tde?>, trang  <?=$_GET['view']?></title> 
<meta name="keywords" content="<?=$tda?> , <?=$tdb ?> , <?=$key?> , trang  <?=$_GET['view']?>" />
<meta name="description" content="<?=$tda?> , <?=$tdb ?> , <?=$mota?> , trang  <?=$_GET['view']?>" />
<? } ?>
