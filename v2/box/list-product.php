<?php
  include_once 'libs/service/ProductService.php';
  use libs\service\ProductService;
  $finder = new ProductService();
  $hasCate = false;
  $cateInfo = null;
  $listProducts = $finder->getListProduct();
?>
<div class="list-product">
  <?php
  if ($hasCate && @isset($cateInfo)) {
  ?>
  <div class="breadcrumb">
    <h2><?=$cateInfo[0]['name']?></h2>
  </div>
  <?php
  }
  ?>
  <div class="list-content">
    <ul class="list-group">
      <?php
      if ($listProducts['total'] > 0) {
        foreach ($listProducts['items'] as $item) {
      ?>
      <li class="item">
        <a class="product-image" href="index.php?box=product-detail&id=<?= $item['id'] ?>" title="<?= $item['name'] ?>">
          <img src="<?= $imgRoot . $item['thumbImage'] ?>" alt="<?= $item['name'] ?>">
        </a>
        <div class="product-info">
          <h5>
            <a class="product-link" href="index.php?box=product-detail&id=<?= $item['id'] ?>" title="<?= $item['name'] ?>"><?= $item['name'] ?></a>
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