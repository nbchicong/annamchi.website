<?php
import('app.admin.action.page.LoadPageItemAction');
$loadPage = new LoadPageItemAction();
$pageItem = $loadPage->execute();
$imgRoot = _WEB_ROOT_.'/web/'.$_SESSION[$sessionPrefix].'/';
if ($pageItem['total'] > 0) {
  $item = $pageItem['items'][0];
?>
<div class="page-content">
  <div class="breadcrumb">
    <h2><?=$item['name'];?></h2>
  </div>
  <div class="detail clearfix">
    <div class="" style="padding:15px">
      <?=$item['contents']?>
    </div>
  </div>
</div>
<?php
}
?>