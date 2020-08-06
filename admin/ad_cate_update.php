<?php
require_once '../permission.php';
$id = $_GET['id'];
$path = "../";
$title = "Cập nhật danh mục";
require_once '../htassets/require.php';
$sql = "select * from categories where cate_id = $id";
$rl = getSimplequerryOne($sql);

if (isset($_POST['btn'])) {
    extract($_REQUEST);
    if ($cate_name == "" || $cate_desc == "") {
        $fillerr = "Yêu cầu nhập đủ thông tin";
    } else {
        $cate_image = getNameImgUpdate("cate_image");
        $sql = "update categories set cate_name = '$cate_name'$cate_image,cate_desc = '$cate_desc' where cate_id = $id";
        addValuesquery($sql);
        move_uploaded_file($_FILES['cate_image']['tmp_name'], '../images/categories/' . $_FILES['cate_image']['name']);
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
                <h2 style="margin-left: 40%;margin-top:1px">CẬP NHẬT DANH MỤC</h2><br><br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="side">
                        <p class="ad-pro-p">Tên danh mục</p>
                        <input class="ad-pro-in" type="text" name="cate_name" value="<?= $rl['cate_name'] ?>"> <br> <br>
                        <p class="ad-pro-p">Ảnh</p>
                        <img src="../images/categories/<?= $rl['cate_image'] ?>" alt="">
                        <input class="ad-pro-in" type="file" name="cate_image"> <br> <br>
                    </div>
                    <div class="side">
                        <p class="ad-pro-p">Mô tả</p>
                        <textarea style="margin-left: 30%;" name="cate_desc" cols="30" rows="5"><?= $rl['cate_desc'] ?></textarea>
                        <br> <br>
                        <button type="submit" name="btn">Cập nhật</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>