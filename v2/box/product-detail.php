<?php
include_once 'libs/service/ProductService.php';
use libs\service\ProductService;
$findProduct = new ProductService();
$product = $findProduct->getProduct();
if (count($product) > 0) {
  $item = $product[0];
?>
<div class="product-info">
  <div class="breadcrumb">
    <h2><?=$item['title'];?></h2>
  </div>
  <div class="detail clearfix">
    <div class="col left-col">
      <div class="detail-image">
        <?php
          if($item['picture2']) {
        ?>
        <img src="images/product/goc/<?= $item[ 'picture2' ]; ?>"/>
        <?
          } else {
        ?>
        <img src="images/product/thumbs/<?=$item['picture'];?>"/>
        <?
          }
        ?>
      </div>
    </div>
    <div class="col right-col">
      <p class="button-detail">
        <a href="#tab-more-info" class="btn" style="color:#FFFFFF;text-decoration:none">Chi tiết thêm</a>
      </p>
      <p class="price">
        <span class="discount">Giá:</span>
        <span class="values"><?=$item['price']>0?$item['price']:'Liên hệ';?></span>
      </p>
    </div>
  </div>
  <div class="more-product-info">
    <ul class="more-info-tabs">
      <li class="item">
        <a class="selected" href="#tab-more-info">Thông tin thêm</a>
      </li>
    </ul>
    <div class="more-info-tabs-content">
      <div id="tab-more-info" class="tab-panel"><?=$item['tomtat']?></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function () {
    scrool_auto();
  });
</script>
<?php
}
?>