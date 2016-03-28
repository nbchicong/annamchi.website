<? if(!defined("hdc")) exit ();?>
<title> <?=$tde?></title> 
<meta name="keywords" content=" <?=$key?> " />
<meta name="description" content="<?=$mota?> " />
<!-- BEGIN MODULE Home Featured Products -->
                                <div id="featured-products_block_center">
                                    <div class="block_content">
                                        <ul>
										<?php
											$p = 9;
											$sqlstr = mysql_query("SELECT * FROM ".product." WHERE status='true' 
																	AND special='true' ORDER BY postdate DESC limit $p");
											if(mysql_num_rows($sqlstr)>0){
												$i = 0;
												while($row = mysql_fetch_array($sqlstr)){
													$i +=1;
										?>
                                            <li class="ajax_block_product">
                                                <a class="product_image" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>">
													<img src="images/product/thumbs/<?=$row['picture']?>" alt="<?=$row['title']?>">
												</a>
                                                <div class="product_info">
                                                    <a class="product_image" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"></a>
                                                    <h5>
														<a class="product_image" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="Bouquet of tulips "></a>
														<a class="product_link" href="product-detail-<?=$row['category']?>1101<?=$row['subCategory']?>1011<?=$row['id']?><?=$vip?>" title="<?=$row['title']?>"><?=$row['title']?></a>
													</h5>
                                                </div>
										<?php
											if($i%3==0)
												echo "</li>";
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
                                </div>
                                <!-- END MODULE Home Featured Products -->
								
								
