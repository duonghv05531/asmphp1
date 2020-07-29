<?php
session_start();
$path = '.';
$title = "Trang chủ";
require_once './htassets/require.php';
$sql = "select * from products";
getSimplequerry($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './htassets/head.php';
?>

<body>
    <div class="content">
        <?php
        include './htassets/header.php';
        ?>
        <div class="main">
            <h2>Sản phẩm nổi bật</h2>
            <?php
            foreach ($values as $pro) :
            ?>
                <div class="fa_pro">
                    <div class="pro_img">
                        <img src="images/products/<?= $pro['pro_avatar'] ?>" alt="">
                    </div>
                    <div class="pro_info">
                        <p class="pro_title"><?= $pro['pro_name'] ?></p>
                        <p class="pro_p"><?= $pro['pro_price'] . " " ?>VND</p>
                        <p class="pro_p"><?= $pro['pro_sortdesc'] ?></p>
                        <a href="pro_info.php?id=<?= $pro['pro_id'] ?>"><button type="submit">Xem chi tiết</button></a>
                    </div>
                </div>
            <?php
            endforeach
            ?>
        </div>
        <?php include './htassets/footer.php'; ?>
    </div>
</body>

</html>