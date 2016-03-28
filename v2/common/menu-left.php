<?php
import('app.admin.provider.category.FindCategory');
import('app.admin.provider.product.NewProduct');
$category = new FindCategory();
$imgRoot = _WEB_ROOT_.'/web/'.$_SESSION[$sessionPrefix].'/';
?>
<div class="menu-left">
  <!-- BEGIN Block categories module -->
  <div class="cate-block block">
    <h4>Danh mục sản phẩm</h4>
    <div class="block-content">
      <ul class="tree">
        <?php
        $listCate = $category->getCateNoParent();
        $items = $listCate['items'];
        for ($i = 0; $i < $listCate['total']; $i ++) {
          $item = $items[$i];
        ?>
        <li>
          <a href="index.php?box=list-product&cate=<?=$item['id']?>" title="<?=$item['name']?>"><?=$item['name']?></a>
          <ul class="submenu">
          <?php
          if (@isset($_GET['cate'])) {
            $requestItem = $_GET['cate'];
            if (!@empty($requestItem) && $requestItem == $item['id']) {
              $subItems = $category->getByParent($item['id']);
              if ($subItems['total'] > 0) {
                for ($j = 0; $j < $subItems['total']; $j ++) {
                  $sub = $subItems['items'][$j];
                  ?>
            <li><a href="index.php?box=list-product&cate=<?=$requestItem?>&sub=<?=$sub['id']?>"><?=$sub['name']?></a></li>
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
        <li>
          <a href="ymsgr:sendIM?hongdieu_2000">
            <img src="http://opi.yahoo.com/online?u=hongdieu_2000&amp;m=g&amp;t=2" alt="YM:" border="0"><br><br>0932775549</a>
        </li>
        <li>
          <a href="ymsgr:sendIM?nbthien216">
            <img src="http://opi.yahoo.com/online?u=nbthien216&amp;m=g&amp;t=2" alt="YM:" border="0"><br><br>0937880056</a>
        </li>
      </ul>
    </div>
  </div>
  <?php
  $newProduct = new NewProduct();
  $newProductList = $newProduct->execute();
  if ($newProductList['total'] > 0) {
  ?>
  <div id="hot-product" class="new-block block">
    <h4 style="font-size:16px;">Sản phẩm mới</h4>
    <div class="block-content">
      <ul class="tree">
        <marquee direction="up" scrollamount="3" height="200px" onmouseover="this.stop()" onmouseout="this.start()"
                 style="height: 200px;">
          <?php
          foreach($newProductList['items'] as $product) {
            ?>
          <li>
            <a href="index.php?box=product-detail&id=<?=$product['id']?>" title="<?=$product['name']?>">
              <img src="<?= $imgRoot . $product['thumbImage']?>" width="150" border="0" title="<?=$product['name']?>" alt="<?=$product['name']?>">
            </a>
            <a href="index.php?box=product-detail&id=<?=$product['id']?>" title="<?=$product['name']?>"><?=$product['name']?></a>
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