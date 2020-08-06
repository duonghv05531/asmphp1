<?php
require_once '../permission.php';
$path = "../";
$title = "Thêm mới sản phẩm";
require_once '../htassets/dbconnection.php';
// cau sql
$sql = "select * from categories";
// goi ham thuc thi sql
getSimplequerry($sql);
//xet va thuc hien insert
if (isset($_POST["btn"])) {


    //lay du lieu tu form
    extract($_REQUEST);
    // goi ham va lay du lieu file anh
    if (
        $cate_id == "" || $pro_name == "" || $pro_quantity == "" || $pro_price == "" || $pro_sale == "" || $pro_sortdesc == "" || $pro_sortdesc == "" ||
        $pro_mate == "" || $pro_size == "" || $pro_color == ""
    ) {
        $fillerror = "Yêu cầu nhập đủ thông tin sản phẩm";
    } else {
        if ($_FILES['pro_avatar']['size'] > 0 && $_FILES['pro_img1']['size'] > 0 && $_FILES['pro_img2']['size'] > 0 && $_FILES['pro_img3']['size'] > 0) {
            $pro_avatar = getNameImg('pro_avatar');
            move_uploaded_file($_FILES['pro_avatar']['tmp_name'], '../images/products/' . $pro_avatar);

            $pro_img1 = getNameImg('pro_img1');
            move_uploaded_file($_FILES['pro_img1']['tmp_name'], '../images/products/' . $pro_img1);

            $pro_img2 = getNameImg('pro_img2');
            move_uploaded_file($_FILES['pro_img2']['tmp_name'], '../images/products/' . $pro_img2);

            $pro_img3 = getNameImg('pro_img3');
            move_uploaded_file($_FILES['pro_img3']['tmp_name'], '../images/products/' . $pro_img3);
            $addsql = "INSERT INTO products(cate_id,pro_name,pro_avatar,pro_img1,pro_img2,pro_img3,pro_quantity,pro_price,pro_sale,pro_sortdesc,pro_desc,pro_mate,pro_size,pro_color) VALUES
            ('$cate_id','$pro_name','$pro_avatar','$pro_img1','$pro_img2','$pro_img3','$pro_quantity','$pro_price','$pro_sale','$pro_sortdesc','$pro_desc','$pro_mate','$pro_size','$pro_color')";
            // thuc hien insert
            addValuesquery($addsql);
            //sau khi insert chuyen trang ve product
            header("location:product.php?message=themdulieuthanhcong");
            die;
        } else {
            $fillerror = "Yêu cầu nhập đủ thông tin";
        }
    }
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
                <h2 style="margin-left: 40%;text-transform: uppercase;">Thêm mới sản phẩm</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="side">
                        <br> <br>
                        <p class="ad-pro-p">Danh mục</p>
                        <select style="margin-left: 30%;" name="cate_id">
                            <?php foreach ($values as $cate) : ?>
                                <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
                            <?php endforeach ?>
                        </select><br> <br>
                        <p class="ad-pro-p">Tên sản phẩm</p>
                        <input class="ad-pro-in" type="text" name="pro_name" value="<?= isset($pro_name) ? $pro_name : "" ?>"> <br> <br>
                        <p class="ad-pro-p">Avatar</p>
                        <input class="ad-pro-in" type="file" name="pro_avatar"> <br> <br>
                        <p class="ad-pro-p">Ảnh 1</p>
                        <input class="ad-pro-in" type="file" name="pro_img1"> <br> <br>
                        <p class="ad-pro-p">Ảnh 2</p>
                        <input class="ad-pro-in" type="file" name="pro_img2"> <br> <br>
                        <p class="ad-pro-p">Ảnh 3</p>
                        <input class="ad-pro-in" type="file" name="pro_img3"> <br> <br>
                        <?= isset($fillerror) ? "<p>" . $fillerror . "</p>" : "" ?> <br>
                        <button style="margin-left: 30%;" type="submit" name="btn">Thêm</button>
                    </div>
                    <div class="side">
                        <br> <br>
                        <p class="ad-pro-p">Số lượng</p>
                        <input class="ad-pro-in" type="number" name="pro_quantity" value="<?= isset($pro_quantity) ? $pro_quantity : "" ?>"> <br>
                        <p class="ad-pro-p">Giá gốc</p>
                        <input class="ad-pro-in" type="text" name="pro_price" value="<?= isset($pro_price) ? $pro_price : "" ?>"> <br>
                        <p class="ad-pro-p">Giá khuyến mại</p>
                        <input class="ad-pro-in" type="text" name="pro_sale" value="<?= isset($pro_sale) ? $pro_sale : "" ?>"><br>
                        <p class="ad-pro-p">Mô tả ngắn</p>
                        <input class="ad-pro-in" type="text" name="pro_sortdesc" value="<?= isset($pro_sortdesc) ? $pro_sortdesc : "" ?>"> <br>
                        <p class="ad-pro-p">Chất liệu</p>
                        <input class="ad-pro-in" type="text" name="pro_mate" value="<?= isset($pro_mate) ? $pro_mate : "" ?>"> <br>
                        <p class="ad-pro-p">Kích cỡ</p>
                        <input class="ad-pro-in" type="text" name="pro_size" value="<?= isset($pro_size) ? $pro_size : "" ?>"><br>
                        <p class="ad-pro-p">Màu sắc</p>
                        <input class="ad-pro-in" type="text" name="pro_color" value="<?= isset($pro_color) ? $pro_color : "" ?>"><br> <br>
                        <p class="ad-pro-p">Mô tả chi tiết</p> <br>
                        <textarea style="margin-left: 30%;" name="pro_desc" cols="30" rows="5"><?= isset($pro_desc) ? $pro_desc : "" ?></textarea>

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>