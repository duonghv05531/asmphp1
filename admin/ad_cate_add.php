<?php
require_once '../permission.php';
$path = "../";
$title = "Thêm danh mục";
require_once '../htassets/require.php';
if (isset($_POST['btn'])) {
    extract($_REQUEST);
    if ($cate_name == "" || $cate_desc == "") {
        $fillerr = "Yêu cầu nhập đầy đủ thông tin";
    } else {
        if ($_FILES['cate_image']['size'] > 0) {
            $cate_image = $_FILES['cate_image']['name'];
        } else {
            $cate_image = "";
        }
        $sql = "insert into categories (cate_name,cate_desc,cate_image) values ('$cate_name','$cate_desc','$cate_image')";
        addValuesquery($sql);
        if (!empty($cate_image)) {
            move_uploaded_file($_FILES['cate_image']['tmp_name'], '../images/categories/' . $cate_image);
        }
        header("location:category.php");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../htassets/head.php' ?>

<body>
    <div class="content">
        <?php include './admin_asset/header.php'; ?>
        <div class="main">
            <div class="side-bar">
                <h2 style="margin-left: 50%;margin-top:1px">THÊM DANH MỤC</h2><br><br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="side">
                        <p class="ad-pro-p">Tên danh mục</p>
                        <input class="ad-pro-in" type="text" name="cate_name" value="<?= isset($cate_name) ? $cate_name : "" ?>"> <br> <br>
                        <p class="ad-pro-p">Ảnh</p>
                        <input class="ad-pro-in" type="file" name="cate_image"> <br> <br>
                    </div>
                    <div class="side">
                        <p class="ad-pro-p">Mô tả</p>
                        <textarea style="margin-left: 30%;" name="cate_desc" cols="30" rows="5"><?= isset($cate_desc) ? $cate_desc : "" ?></textarea>
                        <br> <br>
                        <button type="submit" name="btn">Thêm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>