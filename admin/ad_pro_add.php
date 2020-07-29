<?php
require_once '../permission.php';
$path = "../";
$href = "ad_pro_add.php";
$title = "Thêm mới sản phẩm";
require_once '../htassets/dbconnection.php';
// cau sql
$sql = "select * from categories";
// goi ham thuc thi sql
getSimplequerry($sql);
//xet va thuc hien insert
if (isset($_POST["btn"])) {
    //lay du lieu tu form
    $cate_id = $_POST['cate_id'];
    $pro_name = $_POST['pro_name'];
    $pro_quantity = $_POST['pro_quantity'];
    $pro_price = $_POST['pro_price'];
    $pro_sale = $_POST['pro_sale'];
    $pro_sortdesc = $_POST['pro_sortdesc'];
    $pro_desc = $_POST['pro_desc'];
    $pro_mate = $_POST['pro_mate'];
    $pro_size = $_POST['pro_size'];
    $pro_color = $_POST['pro_color'];
    // goi ham va lay du lieu file anh
    $pro_avatar = getNameImg("pro_avatar");
    $pro_img1 = getNameImg("pro_img1");
    $pro_img2 = getNameImg("pro_img2");
    $pro_img3 = getNameImg("pro_img3");
    $addsql = "INSERT INTO products(cate_id,pro_name,pro_avatar,pro_img1,pro_img2,pro_img3,pro_quantity,pro_price,pro_sale,pro_sortdesc,pro_desc,pro_mate,pro_size,pro_color) VALUES
    ('$cate_id','$pro_name','$pro_avatar','$pro_img1','$pro_img2','$pro_img3','$pro_quantity','$pro_price','$pro_sale','$pro_sortdesc','$pro_desc','$pro_mate','$pro_size','$pro_color')";
    // thuc hien insert
    addValuesquery($addsql);
    //sau khi insert chuyen trang ve product
    header("location:product.php?message=themdulieuthanhcong");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../htassets/head.php'; ?>

<body>
    <div class="content">
        <?php include './admin_asset/header.php'; ?>
        <div class="main">
            <div class="side-bar">
                <h2>Thêm mới sản phẩm</h2>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="side">
                        <p class="ad-pro-p">Danh mục</p><br>
                        <select name="cate_id">
                            <?php foreach ($values as $cate) : ?>
                                <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <p class="ad-pro-p">Tên sản phẩm</p><br>
                        <input class="ad-pro-in" type="text" name="pro_name"> <br> <br>
                        <p class="ad-pro-p">Avatar</p> <br> <br>
                        <input class="ad-pro-in" type="file" name="pro_avatar"> <br> <br>
                        <p class="ad-pro-p">Ảnh 1</p>
                        <input class="ad-pro-in" type="file" name="pro_img1"> <br> <br>
                        <p class="ad-pro-p">Ảnh 2</p>
                        <input class="ad-pro-in" type="file" name="pro_img2"> <br> <br>
                        <p class="ad-pro-p">Ảnh 3</p>
                        <input class="ad-pro-in" type="file" name="pro_img3"> <br> <br>
                        <button type="submit" name="btn">Thêm</button>
                    </div>
                    <div class="side">
                        <br> <br>
                        <p class="ad-pro-p">Số lượng</p> <br>
                        <input class="ad-pro-in" type="number" name="pro_quantity"> <br>
                        <p class="ad-pro-p">Giá gốc</p> <br>
                        <input class="ad-pro-in" type="number" name="pro_price"> <br>
                        <p class="ad-pro-p">Giá khuyến mại</p> <br>
                        <input class="ad-pro-in" type="number" name="pro_sale"><br>
                        <p class="ad-pro-p">Mô tả ngắn</p> <br>
                        <input class="ad-pro-in" type="text" name="pro_sortdesc"> <br>
                        <p class="ad-pro-p">Chất liệu</p>
                        <input class="ad-pro-in" type="text" name="pro_mate"> <br>
                        <p class="ad-pro-p">Kích cỡ</p>
                        <input class="ad-pro-in" type="text" name="pro_size"><br>
                        <p class="ad-pro-p">Màu sắc</p>
                        <input class="ad-pro-in" type="text" name="pro_color"><br> <br>
                        <p class="ad-pro-p">Mô tả chi tiết</p> <br>
                        <textarea name="pro_desc" cols="40" rows="5"></textarea>

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>