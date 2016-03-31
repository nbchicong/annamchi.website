<?php
  include_once 'libs/service/MenuProductService.php';
  include_once 'libs/service/ProductService.php';
  use libs\service\ProductService;
  use libs\service\MenuProductService;
  $finder = new ProductService();
  $category = new MenuProductService();
  $hasCate = false;
  $hasSub = false;
  $keywords = null;
  $cateId = null;
  $subId = null;
  if (@isset($_GET['cate'])) {
    if (!@empty($_GET['cate'])) {
      $cateId = $_GET['cate'];
      $hasCate = true;
    }
  }
  if (@isset($_GET['sub'])) {
    if (!@empty($_GET['sub'])) {
      $subId = $_GET['sub'];
      $hasSub = true;
    }
  }
  if (@isset($_GET['keywords'])) {
    if (!@empty($_GET['keywords'])) {
      $keywords = $_GET['keywords'];
    }
  }
?>
<div class="list-product">
  <?php
  if ($hasCate) {
    $cateInfo = $category->getCate($cateId);
    if (@isset($cateInfo)) {
  ?>
  <div class="breadcrumb">
    <h2><?=$cateInfo[0]['category'];if($hasSub){$subInfo=$category->getCate($subId);?> &gt; <?=$subInfo[0]['category'];}?></h2>
  </div>
  <?php
    }
  }
  if (@isset($keywords)) {
  ?>
  <div class="breadcrumb">
    <h2>Kết quả tìm kiếm với từ khóa: <?=$keywords?></h2>
  </div>
  <?php
  }
  ?>
  <div class="list-content">
    <ul class="list-group">
      <?php
      $listProducts = $finder->getListProduct(!$hasCate);
      if ($listProducts->getTotal() > 0) {
        foreach ($listProducts->getItems() as $item) {
      ?>
      <li class="item">
        <a class="product-image" href="product-detail-<?=$item['category'].SLASH.$item['subCategory'].SLASH.$item['id']?>.html" title="<?=$item['title']?>">
          <img src="images/product/thumbs/<?=$item['picture']?>" alt="<?=$item['title']?>">
        </a>
        <div class="product-info">
          <h5>
            <a class="product-link" href="product-detail-<?=$item['category'].SLASH.$item['subCategory'].SLASH.$item['id']?>.html" title="<?= $item['title'] ?>"><?=$item['title']?></a>
          </h5>
        </div>
      </li>
      <?php
        }
      }
      ?>
    </ul>
  </div>
</div>