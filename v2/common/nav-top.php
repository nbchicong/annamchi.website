<?php
import('app.admin.action.page.FindPageItem');
$pageItem = new FindPageItem();
?>
<ul class="menu-top">
  <li>
    <a href="/" class="active">Trang chủ</a>
  </li>
  <?php
  $pageList = $pageItem->execute();
  if ($pageList['total'] > 0) {
    foreach($pageList['items'] as $page) {
  ?>
  <li>
    <a href="index.php?box=page-content&id=<?=$page['id']?>"><?=$page['name']?></a>
  </li>
  <?php
    }
  }
  ?>
  <li>
    <a href="contact.php">Liên hệ</a>
  </li>
</ul>