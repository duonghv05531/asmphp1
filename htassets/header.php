<?php
$path = "./";
require_once 'require.php';
$sql = "select * from webseting";
$result = getSimplequerryOne($sql);
$catesql = "select * from categories";
getSimplequerrycate($catesql);
?>
<div class="nav">
    <p><?= isset($_SESSION['user_name']) ? "Xin chao: " . $_SESSION['user_name'] . " | Email: " . $_SESSION['user_email']  : "" ?></p>
    <ul>
        <li><a onclick="return confirm('Bạn có chắc chắn muốn đăng xuất')" href="logout.php"><?= isset($_SESSION['user_name']) ? "Đăng xuất" : "" ?></a></li>
        <li><a href="logup.php"><?= !isset($_SESSION['user_name']) ? "Đăng ký" : "" ?></a></li>
        <li><a href="login.php"><?= !isset($_SESSION['user_name']) ? "Đăng nhập" : "" ?></a></li>
        <li><?php if (isset($_SESSION['user_name'])) : ?>
                <a class=link-cate href=admin/index.php>Quản trị</a> <?php endif ?> </li> </ul> </div> <div class="header">
                    <img src="images/<?= $result['banner'] ?>" alt="banner">
</div>
<div class="nav">
    <ul>
        <li><a href="./">Trang chủ</a></li>
        <li>Sản phẩm
            <ul class="sub-menu">
                <?php foreach ($value as $c) : ?>
                    <li><a class="link-cate" href="category.php?id=<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </li>
        <li>Liên hệ</li>
        <li>Tuyển dụng</li>
        <li>Giới thiệu</li>
    </ul>
</div>