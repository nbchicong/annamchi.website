<?php
  import('app.admin.provider.product.FindProduct');
  $findProduct = new FindProduct();
  $hasCate = false;
  $cateInfo = null;
  $listProducts = $findProduct->execute();
  if (@isset($_GET['cate'])) {
    if (!@empty($_GET['cate'])) {
      $cateInfo = $category->getById($_GET['cate']);
      $hasCate = true;
    }
  }
  if (@isset($_GET['sub'])) {
    if (!@empty($_GET['sub'])) {
      $cateInfo = $category->getById($_GET['sub']);
      $hasCate = true;
    }
  }
  $imgRoot = _WEB_ROOT_.'/web/'.$_SESSION[$sessionPrefix].'/';
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