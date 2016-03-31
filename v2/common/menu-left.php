<?php
include_once 'libs/service/MenuProductService.php';
include_once 'libs/service/SupporterService.php';
use libs\service\MenuProductService;
use libs\service\SupporterService;
use libs\service\ProductService;
$category = new MenuProductService();
$supporter = new SupporterService();
$product = new ProductService();
$listCate = $category->getList();
$listSupporter = $supporter->getList();
$listNewProduct = $product->getHotProduct();
?>
<div class="menu-left">
  <!-- BEGIN Block categories module -->
  <div class="cate-block block">
    <h4>Danh mục sản phẩm</h4>
    <div class="block-content">
      <ul class="tree">
        <?php
        $items = $listCate->getItems();
        for ($i = 0; $i < $listCate->getTotal(); $i ++) {
          $item = $items[$i];
        ?>
        <li>
          <a href="product-<?=$item['id']?>.html" title="<?=$item['category']?>"><?=$item['category']?></a>
          <ul class="submenu">
          <?php
          if (@isset($_GET['cate'])) {
            $requestItem = $_GET['cate'];
            if (!@empty($requestItem) && $requestItem == $item['id']) {
              $subList = $category->getSubList($item['id']);
              if ($subList->getTotal() > 0) {
                $subItems = $subList->getItems();
                for ($j = 0; $j < $subList->getTotal(); $j ++) {
                  $sub = $subItems[$j];
                  ?>
            <li><a href="product-<?=$item['id'].SLASH.$sub['id']?>.html" title="<?=$sub['category']?>"><?=$sub['category']?></a></li>
                  <?php
                }
              }
            }
          }
          ?>
          </ul>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
  <div id="helper" class="help-block block">
    <h4 style="font-size:16px;">Hỗ trợ trực tuyến</h4>
    <div class="block-content">
      <ul class="tree">
        <?php
        $supporterItems = $listSupporter->getItems();
        for ($i = 0; $i < $listSupporter->getTotal(); $i ++) {
          $item = $supporterItems[ $i ];
          if ($item['kind'] != '2') {
        ?>
        <li>
          <a href="ymsgr:sendIM?<?=$item['nick']?>"><img src="http://opi.yahoo.com/online?u=<?=$item['nick']?>&amp;m=g&amp;t=2" alt="YM:<?=$item['fullname']?>" border="0"><br><?=$item['fullname']?><br><?=$item['phone']?></a>
        </li>
        <?php
          } else {
        ?>
        <li>
          <a href="skype:<?=$item['nick']?>?chat"><img src="images1/skypecall.gif" alt="Skype:<?=$item['fullname']?>" border="0"><br><?=$item['fullname']?><br><?=$item['phone']?></a>
        </li>
        <?php
          }
        }
        ?>
      </ul>
    </div>
  </div>
  <?php
  if ($listNewProduct->getTotal() > 0) {
  ?>
  <div id="hot-product" class="new-block block">
    <h4 style="font-size:16px;">Sản phẩm mới</h4>
    <div class="block-content">
      <ul class="tree">
        <marquee direction="up" scrollamount="3" height="200px" onmouseover="this.stop()" onmouseout="this.start()"
                 style="height: 200px;">
          <?php
          foreach($listNewProduct->getItems() as $product) {
            ?>
          <li>
            <a href="product-detail-<?=$product['category'].SLASH.$product['subCategory'].SLASH.$product['id']?>.html" title="<?=$product['title']?>">
              <img src="images/product/thumbs/<?=$product['picture']?>" width="150" border="0" title="<?=$product['title']?>" alt="<?=$product['title']?>">
            </a>
            <a href="product-detail-<?=$product['category'].SLASH.$product['subCategory'].SLASH.$product['id']?>.html" title="<?=$product['title']?>"><?=$product['title']?></a>
            <div style="font-size: 1px; height: 5px;"></div>
          </li>
          <?php
          }
          ?>
        </marquee>
      </ul>
    </div>
  </div>
  <?php
  }
  ?>
  <div id="counter-online" class="block">
    <h4 style="font-size:16px;">Số lượt truy cập</h4>
    <div class="block-content">
      <ul class="tree">
        <!-- Start counter code -->
        <a href="http://annamchi.com" target="blank">
          <img alt="An Nam Chí Corp., counter" hspace="0" vspace="0" border="0" src="http://legitfreecounters.com/6014124-B0763F499CA788A01C28B4C4C84C9C9B/counter.img?theme=27&amp;digits=6&amp;siteId=6">
        </a>
        <noscript>&lt;br/&gt;&lt;a href="http://www.slotgames-vote.com"&gt;www.slotgames-vote.com&lt;/a&gt;&lt;br&gt;The following text will not be seen after you upload your website, please keep it in order to retain your counter functionality &lt;br&gt; &lt;a href="http://www.mcsweeneys.net/articles/ireel-a-users-guide" target="_blank"&gt;ireel&lt;/a&gt;</noscript>
        <!-- End counter code -->
      </ul>
    </div>
  </div>
</div>