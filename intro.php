<? if(!defined("hdc")) exit ();?>
								<!-- BEGIN MODULE Home Featured Products -->
                                <!-- BEGIN Breadcrumb ->
                                <div class="breadcrumb">
                                <a href="#" title="return to Home">Home</a>
                                <span class="navigation-pipe">&gt;</span>
                                <span class="navigation_end">Bouquet of tulips </span>
                                </div>
                                <!-- END Breadcrumb -->
								<?php
									$sqlstr=mysql_query("SELECT * FROM ".guide."  WHERE  id='".intval($_GET['id'])."' limit 1");
									if(mysql_num_rows($sqlstr)>0){
										while($row = mysql_fetch_array($sqlstr)){
								?>
								<title><?=$row['title']?> , <?=$tde?> </title>
								<meta name="keywords" content=" <?=$row['title']?> , <?=$key?>" />
								<meta name="description" content="<?=$row['title']?> , <?=$mota?>" />
								<script language="JavaScript" type="text/javascript">
									scrool_auto();
								</script>
                                <div id="primary_block" class="clearfix">
                                    <h1><?=$row['title']?></h1>
                                    <div class="primary_block_extra">
                                        <!-- show intro -->
                                        <style type="text/css">
                                            #pb-show-column {
                                                width: auto;
                                                float: left;
                                                padding: 17px 20px 0 20px;
                                            }
                                        </style>
                                        <div id="pb-show-column">
                                            <div id="short_description_block">
                                                <div id="short_description_content" class="rte align_justify">
													<?=$row['full']?>
                                                </div>
                                            </div>
                                            <div class="clearblock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php
										}
									}
								?>
								<!-- END MODULE Home Featured Products -->