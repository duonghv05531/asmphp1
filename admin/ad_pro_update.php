<?php
require_once '../permission.php';
$id = $_GET['id'];
$title = "Sửa sản phẩm";
$path = "../";
require '../htassets/dbconnection.php';
$sql = "select * from products where pro_id = $id";
$pro = getSimplequerryOne($sql);
$catesql = "select * from categories";
getSimplequerry($catesql);
if (isset($_POST['btn'])) {
    extract($_REQUEST);
    if (
        $cate_id == "" || $pro_name == "" || $pro_quantity == "" || $pro_price == "" || $pro_sale == "" || $pro_sortdesc == "" || $pro_sortdesc == "" ||
        $pro_mate == "" || $pro_size == "" || $pro_color == ""
    ) {
        $fillerror = "mời nhập đủ thông tin";
    } else {
        $pro_avatar = getNameImgUpdate("pro_avatar");
        move_uploaded_file($_FILES['pro_avatar']['tmp_name'], '../images/products/' . $_FILES['pro_avatar']['name']);

        $pro_img1 = getNameImgUpdate("pro_img1");
        move_uploaded_file($_FILES['pro_img1']['tmp_name'], '../images/products/' . $pro_img1);

        $pro_img2 = getNameImgUpdate("pro_img2");
        move_uploaded_file($_FILES['pro_img2']['tmp_name'], '../images/products/' . $pro_img2);

        $pro_img3 = getNameImgUpdate("pro_img3");
        move_uploaded_file($_FILES['pro_img3']['tmp_name'], '../images/products/' . $pro_img3);

        $updatesql = "update products set cate_id = '$cate_id', pro_name = '$pro_name'$pro_avatar $pro_img1
        $pro_img2 $pro_img3, pro_quantity = '$pro_quantity', pro_price = '$pro_price', pro_sale = '$pro_sale', 
        pro_sortdesc = '$pro_sortdesc', pro_desc = '$pro_desc', pro_mate = '$pro_mate', pro_size = '$pro_size', pro_color = '$pro_color' 
        where pro_id = $id
        ";
        addValuesquery($updatesql);
        header("location:product.php?message=suadulieuthanhcong");
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../htassets/head.php'; ?>

<body>
    <div class="content">
        <?php include './admin_asset/header.php' ?>
        <div class="main">
            <div class="side-bar">
                <h2 style="margin-left: 50%;margin-top:1px">Sửa sản phẩm</h2>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="side">
                        <br> <br>
                        <p class="ad-pro-p">Danh mục</p>
                        <select style="margin-left: 30%;margin-top:1px" name=" cate_id">
                            <?php foreach ($values as $cate) : ?>
                                <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
                            <?php endforeach ?>
                        </select><br> <br>
                        <p class="ad-pro-p">Tên sản phẩm</p>
                        <input class="ad-pro-in" type="text" name="pro_name" value="<?= $pro['pro_name'] ?>"> <br> <br>
                        <p class="ad-pro-p">Kích cỡ</p>
                        <input class="ad-pro-in" type="text" name="pro_size" value="<?= $pro['pro_size'] ?>"><br> <br>
                        <p class="ad-pro-p">Mô tả chi tiết</p>
                        <textarea style="margin-left: 30%;" name="pro_desc" cols="30" rows="8"><?= $pro['pro_desc'] ?></textarea> <br><br>
                        <br>
                        <p class="ad-pro-p">Avatar</p>
                        <img style="width:170px" src="../images/products/<?= $pro['pro_avatar'] ?>" alt="">
                        <input class="ad-pro-in" type="file" name="pro_avatar"> <br> <br>
                        <p class="ad-pro-p">Ảnh 2</p>
                        <img style="width:170px" src="../images/products/<?= $pro['pro_img2'] ?>" alt="">
                        <input class="ad-pro-in" type="file" name="pro_img2"> <br> <br>
                        <?= isset($fillerror) ? "<p>" . $fillerror . "</p>" : "" ?> <br>
                        <button style="margin-left: 30%;" type="submit" name="btn">Lưu</button>
                    </div>
                    <div class="side">
                        <br> <br>
                        <p class="ad-pro-p">Số lượng</p>
                        <input class="ad-pro-in" type="number" name="pro_quantity" value="<?= $pro['pro_quantity'] ?>"> <br> <br>
                        <p class="ad-pro-p">Giá gốc</p>
                        <input class="ad-pro-in" type="number" name="pro_price" value="<?= $pro['pro_price'] ?>"> <br> <br>
                        <p class="ad-pro-p">Giá khuyến mại</p>
                        <input class="ad-pro-in" type="number" name="pro_sale" value="<?= $pro['pro_sale'] ?>"><br> <br>
                        <p class="ad-pro-p">Mô tả ngắn</p>
                        <input class="ad-pro-in" type="text" name="pro_sortdesc" value="<?= $pro['pro_sortdesc'] ?>"> <br> <br>
                        <p class="ad-pro-p">Chất liệu</p>
                        <input class="ad-pro-in" type="text" name="pro_mate" value="<?= $pro['pro_mate'] ?>"> <br> <br>
                        <p class="ad-pro-p">Màu sắc</p>
                        <input class="ad-pro-in" type="text" name="pro_color" value="<?= $pro['pro_color'] ?>"><br> <br> <br>
                        <p style="margin-top:8px" class="ad-pro-p">Ảnh 1</p>
                        <img style="width:170px" src="../images/products/<?= $pro['pro_img1'] ?>" alt="">
                        <input class="ad-pro-in" type="file" name="pro_img1"> <br> <br>
                        <p class="ad-pro-p">Ảnh 3</p>
                        <img style="width:170px" src="../images/products/<?= $pro['pro_img3'] ?>" alt="">
                        <input class="ad-pro-in" type="file" name="pro_img3">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>