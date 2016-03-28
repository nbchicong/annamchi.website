<? if(!defined("hdc")) exit ();?>
<!-- BEGIN Block Slider -->
							<style>
								#gallery {
    position: relative;
    height: 345px;
	background: url(template/bg-slider.png) no-repeat;
}

#gallery a {
    float: left;
    position: absolute;
	margin: 25px 0 0 130px;
}

#gallery a img {
    border: none;
}

#gallery a.show {
    z-index: 500;
	margin: 25px 0 0 130px;
}

#gallery .caption {
    z-index: 600;
    background-color: #000;
    color: #ffffff;
    height: 100px;
    width: 100%;
    position: absolute;
    bottom: 0;
}

#gallery .caption .content {
    margin: 5px
}

#gallery .caption .content h3 {
    margin: 0;
    padding: 0;
    color: #1DCCEF;
}
							</style>
                            <div id="gallery">
									<?php
											$p = 10;
											$sqlstr = mysql_query("SELECT *	FROM ".product." WHERE status='true'  and picture <>'' ORDER BY postdate DESC limit $p");
											if(mysql_num_rows($sqlstr)>0){
												$i = 0;
												while($row = mysql_fetch_array($sqlstr)){
													$i += 1;
										?>
                                    <a href="#" class="show"><img src="images/product/thumbs/<?=$row['picture']?>" alt="" style="" title="<?=$row['title']?>" rel=""></a>
									<?php
												}
											}
										?>
                            </div>
                            <!-- END Block Slider -->