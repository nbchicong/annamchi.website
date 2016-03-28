<?php
import('app.admin.provider.product.FindProduct');
$findProduct = new FindProduct();
$product = $findProduct->execute();
$imgRoot = _WEB_ROOT_.'/web/'.$_SESSION[$sessionPrefix].'/';
if ($product['total'] > 0) {
  $item = $product['items'][0];
?>
<div class="product-info">
  <div class="breadcrumb">
    <h2><?=$item['name'];?></h2>
  </div>
  <div class="detail clearfix">
    <div class="col left-col">
      <div class="detail-image">
        <img src="<?=$imgRoot.$item['originImage'];?>"/>
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
      <div id="tab-more-info" class="tab-panel"><?=$item['otherinfo']?></div>
    </div>
  </div>
</div>
<?php
}
?>