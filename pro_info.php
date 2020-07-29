<?php
session_start();
$path = ".";
$title = "Thông tin sản phẩm";
require_once './htassets/require.php';
$id = $_GET['id'];
$sql = "select * from products where pro_id = $id";
$r = getSimplequerryOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './htassets/head.php';
?>

<body>
    <div class="content">
        <?php include './htassets/header.php'; ?>
        <div class="main">
            <h2>Thông tin sản phẩm</h2>
            <div class="side-bar-proinfo">
                <img class="pro-info-image" src="images/products/<?= $r['pro_avatar'] ?>" alt="">
            </div>
            <div class="side-bar-proinfo">
                <br>
                <h2><?= $r['pro_name'] ?></h2> <br>
                <p>Size: <?= $r['pro_size'] ?></p> <br>
                <p>Màu: <?= $r['pro_color'] ?></p>
                <hr>
                <br>
                <p>Giá gốc: <strike><?= $r['pro_price'] ?> </strike> VND</p> <br>
                <p style="color: red;"> Giá Sale: <?= $r['pro_sale'] ?> VND</p><br> <br>
                <p style="width:500px"><?= $r['pro_desc'] ?></p><br>
                <img style="width:175px" src="images/products/<?= $r['pro_img1'] ?>" alt="">
                <img style="width:175px" src="images/products/<?= $r['pro_img2'] ?>" alt="">
                <img style="width:175px" src="images/products/<?= $r['pro_img3'] ?>" alt="">
                <button type="submit">Mua ngay</button>
            </div>

        </div>
        <?php include './htassets/footer.php'; ?>
    </div>

</body>

</html>