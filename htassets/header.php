<?php
$path = "./";
require_once 'require.php';
$sql = "select * from webseting";
$result = getSimplequerryOne($sql);
$catesql = "select * from categories";
getSimplequerrycate($catesql);
?>
<div class="nav">
    <p><?= isset($_SESSION['username']) ? "Xin chao: " . $_SESSION['username'] . " | Email: " . $_SESSION['email']  : "" ?></p>
    <ul>
        <li><a href="logout.php"><?= isset($_SESSION['username']) ? "Dang xuat" : "" ?></a></li>
        <li><a href="logup.php"><?= !isset($_SESSION['username']) ? "Dang ky" : "" ?></a></li>
        <li><a href="login.php"><?= !isset($_SESSION['username']) ? "Dang nhap" : "" ?></a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<li>Thành viên";
            echo "<ul class=sub-menu>";
            echo "<li><a class=link-cate href=admin/index.php>Quản trị</a></li>";
            echo "</ul>";
            echo "</li>";
        }
        ?>
    </ul>
</div>
<div class="header">
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