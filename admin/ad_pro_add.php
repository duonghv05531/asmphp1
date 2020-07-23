<?php
$path = "../";
$title = "Thêm mới sản phẩm";
require_once '../htassets/dbconnection.php';
$sql = "select * from categories";
getSimplequerry($sql);
if (isset($_POST["btn"])) {
    $cate_id = $_POST['cate_id'];
    $pro_name = $_POST['pro_name'];
    $pro_quantity = $_POST['pro_quantity'];
    $pro_price = $_POST['pro_price'];
    $pro_sale = $_POST['pro_sale'];
    $pro_sortdesc = $_POST['pro_sortdesc'];
    $pro_desc = $_POST['pro_desc'];

    if ($_FILES["pro_image"]['size'] > 0) {
        $pro_image = $_FILES["pro_image"]["name"];
    } else {
        $pro_image = "";
    }
    $addsql = "INSERT INTO products(cate_id,pro_name,pro_image,pro_quantity,pro_price,pro_sale,pro_sortdesc,pro_desc) VALUES
    ('$cate_id','$pro_name','$pro_image','$pro_quantity','$pro_price','$pro_sale','$pro_sortdesc','$pro_desc')";
    addValuesquery($addsql);
    if (!empty($pro_image)) {
        move_uploaded_file($_FILES['pro_image']['tmp_name'], "../images/products/" . $pro_image);
    }
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
                        <p>Danh mục</p><br>
                        <p>Tên sản phẩm</p><br>
                        <p>Ảnh sản phẩm</p> <br>
                        <p>Số lượng</p> <br>
                        <p>Giá gốc</p> <br>
                        <p>Giá khuyến mại</p> <br>
                        <p>Mô tả ngắn</p> <br>
                        <p>Mô tả chi tiết</p>
                        <button type="submit" name="btn">Thêm</button>
                    </div>
                    <div class="side">
                        <select name="cate_id">
                            <?php foreach ($values as $cate) : ?>
                                <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <br> <br>
                        <input type="text" name="pro_name"> <br>
                        <input type="file" name="pro_image"> <br>
                        <input type="number" name="pro_quantity"> <br>
                        <input type="number" name="pro_price"> <br>
                        <input type="number" name="pro_sale"><br>
                        <input type="text" name="pro_sortdesc"> <br> <br>
                        <textarea name="pro_desc" cols="30" rows="10"></textarea>

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>