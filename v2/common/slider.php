<?php
include_once 'libs/service/ProductService.php';
use libs\service\ProductService;
$finder = new ProductService();
$hotProduct = $finder->getHotProduct();
?>
<div id="slider-product" class="slider-top">
<?php
if ($hotProduct->getTotal() > 0) {
    $items = $hotProduct->getItems();
    for($i = 0; $i < count($items); $i++) {
        $item = $items[$i];
?>
    <a href="javascript:;" class="show"><img src="images/product/thumbs/<?=$item['picture']?>" title="<?=$item['title']?>"></a>
<?php
    }
}
?>
</div>