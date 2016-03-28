<?php
import('app.admin.action.product.FindHotProductAction');
$finder = new FindHotProductAction();
$hotProduct = $finder->execute();
$imgRoot = _WEB_ROOT_.'/web/'.$_SESSION[$sessionPrefix].'/';
?>
<div id="slider-product" class="slider-top">
<?php
if ($hotProduct['total'] > 0) {
    $items = $hotProduct['items'];
    for($i = 0; $i < count($items); $i++) {
        $item = $items[$i];
?>
    <a href="javascript:;" class="show"><img src="<?=$imgRoot.$item['thumbImage']?>" title="<?=$item['name']?>"></a>
<?php
    }
}
?>
</div>