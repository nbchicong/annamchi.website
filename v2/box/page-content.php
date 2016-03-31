<?php
include_once 'libs/service/PageGuide.php';
use libs\service\PageGuide;
$pageGuide = new PageGuide();
$pageItem = $pageGuide->getPage();
if (count($pageItem) > 0) {
  $item = $pageItem[0];
?>
<div class="page-content">
  <div class="breadcrumb">
    <h2><?=$item['title'];?></h2>
  </div>
  <div class="detail clearfix">
    <div class="" style="padding:15px">
      <?=$item['full']?>
    </div>
  </div>
</div>
<?php
}
?>