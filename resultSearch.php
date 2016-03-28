<? if(!defined("hdc")) exit ();?>
								<!-- BEGIN MODULE Home Featured Products -->
								<!-- BEGIN Breadcrumb -->
								<script language="JavaScript" type="text/javascript">
									scrool_auto();
								</script>
                                <div class="breadcrumb">
									Kết Quả Tìm Kiếm Với Từ Khóa <span style="font-color:#ff0000;"><?=$_GET['KeyWord']?></span>
                                </div>
                                <!-- END Breadcrumb -->
                                <div id="featured-products_block_center">
                                    <div class="block_content">
                                        <ul>
										<?php
											$name = text($_GET['KeyWord']);
											$p=21;
											$sqlstr = "SELECT * FROM ".product." WHERE status='true'   AND (title like '%".$name."%' OR full like '%".$name."%'  OR tomtat like '%".$name."%') ";
											if($_GET['category']!='') $sqlstr .=" AND ".product.".category = '".intval($_GET['category'])."'";
												if($_GET['subCategory']!='') $sqlstr .=" AND ".product.".subCategory = '".intval($_GET['subCategory'])."'";
												$page=mysql_query($sqlstr);
												$n_record=mysql_num_rows($page);
												num_page();
												$link="index.php?page=resultSearch&KeyWord=".$_GET['KeyWord']."";
												$view=$_GET['view']?intval($_GET['view']):1;
												$s=($view-1)*$p;
												$sqlstr.=" ORDER BY postdate DESC limit $s,$p";
												$sqlstr=mysql_query($sqlstr);
												if(mysql_num_rows($sqlstr)>0){
													$i = 0;
													while($row = mysql_fetch_array($sqlstr)){
														$i += 1;
										?>
                                            <li class="ajax_block_product">
                                                <a class="product_image" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>">
													<img src="images/product/thumbs/<?=$row['picture']?>" alt="<?=$row['title']?>">
												</a>
                                                <div class="product_info">
                                                    <a class="product_image" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"></a>
                                                    <h5>
														<a class="product_image" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"></a>
														<a class="product_link" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"><?=$row['title']?></a>
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
                                                Xin lỗi! Chưa có sản phẩm này!.
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
<link rel="stylesheet" type="text/css" href="balloontip.css" />
<script type="text/javascript" src="balloontip.js">

/***********************************************
* Rich HTML Balloon Tooltip- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<title>Kết quả tìm kiếm</title>