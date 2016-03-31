<?php
include_once 'libs/service/PageGuide.php';
use libs\service\PageGuide;
$pageGuide = new PageGuide();
$pageList = $pageGuide->getListPage();
?>
<ul class="menu-top">
  <li>
    <a href="<?=HOME_URL;?>" class="active">Trang chủ</a>
  </li>
  <?php
  if ($pageList->getTotal() > 0) {
    foreach($pageList->getItems() as $page) {
  ?>
  <li>
    <a href="page-<?=$page['id']?>.html"><?=$page['title']?></a>
  </li>
  <?php
    }
  }
  ?>
  <li>
    <a href="contact.html">Liên hệ</a>
  </li>
</ul>