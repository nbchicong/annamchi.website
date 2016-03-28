<? if(!defined("hdc")) exit ();?>
						<!-- BEGIN MODULE Home Featured Products -->
                                <script type="text/javascript">
                                    // <![CDATA[
                                    // PrestaShop internal settings
                                    var currencySign = '$';
                                    var currencyRate = '1';
                                    var currencyFormat = '1';
                                    var currencyBlank = '0';
                                    var taxRate = 0;
                                    var jqZoomEnabled = false;
                                    //JS Hook
                                    var oosHookJsCodeFunctions = new Array();
                                    // Parameters
                                    var id_product = '1';
                                    var productHasAttributes = false;
                                    var quantitiesDisplayAllowed = true;
                                    var quantityAvailable = 96;
                                    var allowBuyWhenOutOfStock = false;
                                    var availableNowValue = '';
                                    var availableLaterValue = '';
                                    var productPriceTaxExcluded = 18 - 0.000000;
                                    var reduction_percent = 5;
                                    var reduction_price = 0;
                                    var specific_price = 0.000000;
                                    var specific_currency = false;
                                    var group_reduction = '1';
                                    var default_eco_tax = 0.000000;
                                    var ecotaxTax_rate = 0;
                                    var currentDate = '2011-06-13 06:05:42';
                                    var maxQuantityToAllowDisplayOfLastQuantityMessage = 3;
                                    var noTaxForThisProduct = true;
                                    var displayPrice = 0;
                                    var productReference = '';
                                    var productAvailableForOrder = '1';
                                    var productShowPrice = '1';
                                    var productUnitPriceRatio = '0.000000';
                                    var idDefaultImage = 1;
                                    // Customizable field
                                    var img_ps_dir = '/images/';
                                    var customizationFields = new Array();
                                    customizationFields[0] = new Array();
                                    customizationFields[0][0] = 'img0';
                                    customizationFields[0][1] = 0;
                                    // Images
                                    var img_prod_dir = '/images/';
                                    var combinationImages = new Array();
                                    combinationImages[0] = new Array();
                                    combinationImages[0][0] = 1;
                                    combinationImages[0][1] = 2;
                                    combinationImages[0][2] = 3;
                                    // Translations
                                    var doesntExist = 'The product does not exist in this model. Please choose another.';
                                    var doesntExistNoMore = 'This product is no longer in stock';
                                    var doesntExistNoMoreBut = 'with those attributes but is available with others';
                                    var uploading_in_progress = 'Uploading in progress, please wait...';
                                    var fieldRequired = 'Please fill in all required fields';
                                    //]]>
                                </script>
                                <!-- BEGIN Breadcrumb ->
                                <div class="breadcrumb">
                                    <a href="#" title="return to Home">Home</a>
                                    <span class="navigation-pipe">&gt;</span>
                                    <span class="navigation_end">Bouquet of tulips </span>
                                </div>
                                <!-- END Breadcrumb -->
								<?php
									$sqlstr = mysql_query("SELECT * FROM ".product."  WHERE status='true' AND id = '".intval($_GET['id'])."' ");
									mysql_query("UPDATE  ".product."  SET solan=solan+1 WHERE id='".intval($_GET['id'])."'");
									$tda = "Chi tiết sản phẩm";
									if(mysql_num_rows($sqlstr)>0){
										$row = mysql_fetch_array($sqlstr);
									}
								?>
								<script language="JavaScript" type="text/javascript">
									scrool_auto();
								</script>
                                <div id="primary_block" class="clearfix">
                                    <h1><?=$row['title']?></h1>
                                    <div class="primary_block_extra">
                                        <!-- right infos-->
                                        <div id="pb-right-column">
                                            <!-- product img-->
                                            <div id="image-block">
											<?php
												if($row['picture2']){
												$name = $row['title'];
											?>
                                                <img src="images/product/goc/<?=$row['picture2']?>" title="<?=$row['title']?>" alt="<?=$row['title']?>" id="bigpic" height="358" width="308">
											<?php
												}
											?>
                                            </div>
											<span id="wrapResetImages" style="display:none;">
                                                <div>
                                                    <a id="resetImages" href="#" onclick="$('span#wrapResetImages').hide('slow');return (false);">Display all pictures</a>
                                                </div>
                                            </span>
                                            <!-- usefull links-->
                                            <ul id="usefull_link_block">
                                                <li>
                                                    <a href="javascript:print();">In trang này.</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- left infos-->
                                        <div id="pb-left-column">
                                            <div id="short_description_block">
                                                <div id="short_description_content" class="rte align_justify">
                                                    <?=textContent($row['tomtat'])?>
                                                </div>
                                                <p class="buttons_bottom_block">
                                                    <a href="javascript:{}" class="button">Chi tiết thêm</a>
                                                </p>
                                            </div>
                                            <!-- add to cart form--><!-- prices -->
                                            <p class="price" style="color:#FF0000;">
                                                <style>
                                                    .discount {
                                                        font-weight: bold;
                                                        font-size: 14px;
                                                    }
                                                    
                                                    .values {
                                                        font-size: 13px;
                                                        font-weight: bold;
                                                    }
                                                </style>
                                                <span class="discount">Giá:</span>
                                                <span class="values">Call</span>
                                            </p>
                                            <div class="clearblock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- description and features -->
                                <div id="more_info_block" class="clear">
                                    <ul id="more_info_tabs" class="idTabs idTabsShort">
                                        <li>
                                            <a class="selected" id="more_info_tab_more_info" href="#idTab1">Thông tin thêm</a>
                                        </li>
                                    </ul>
                                    <div id="more_info_sheets" class="sheets align_justify">
                                        <!-- full description -->
                                        <div class="" id="idTab1">
                                            <p>
                                                <?=textContent($row['tomtat'])?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Customizable products -->
								<!-- END MODULE Home Featured Products -->
<title><?=$tda?> <?=$name?></title>