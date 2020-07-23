<?php
$path = "./";
require_once 'require.php';
$sql = "select * from webseting";
getSimplequerryOne($sql);
?>
<div class="nav">
    <ul>
        <li><a href="login.php">Đăng nhập</a></li>
        <li>Đăng ký</li>
    </ul>
</div>
<div class="header">
    <img src="images/<?= $result['banner'] ?>" alt="banner">
</div>
<div class="nav">
    <ul>
        <li><a href="category.php?id=1">Sơ mi</a></li>
        <li><a href="category.php?id=2">Quần âu</a></li>
        <li><a href="category.php?id=3">Áo thun</a></li>
        <li><a href="category.php?id=4">Giày da</a></li>
        <li><a href="category.php?id=5">Thắt lưng</a></li>

    </ul>
</div>