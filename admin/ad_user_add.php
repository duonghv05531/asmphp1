<?php
require_once '../permission.php';
$path = "../";
$title = "Thêm mới tài khoản";
require_once '../htassets/dbconnection.php';
if (isset($_POST["btn"])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    if ($_FILES["avatar"]['size'] > 0) {
        $avatar = $_FILES["avatar"]["name"];
    } else {
        $avatar = "";
    }
    $sql = "INSERT INTO users (user_name,user_password,user_email,avatar,user_role) VALUES('$user_name','$user_password','$user_email','$avatar','$user_role')";
    addValuesquery($sql);
    if (!empty($avatar)) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/avatar/" . $avatar);
    }
    header("location:user.php?message=themdulieuthanhcong");
    die();
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
                <h2 style="text-align: center;margin-bottom:10px;">THÊM MỚI TÀI KHOẢN</h2>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="side">
                        <p>Role</p>
                        <select style="margin-left:30%" name="user_role">
                            <option value="1">Quản trị viên</option>
                            <option value="2">Nhân viên</option>
                            <option value="3">Khách hàng</option>
                        </select>
                        <br> <br>
                        <p>username</p>
                        <input type="text" name="user_name"> <br> <br>

                        <p>Password</p>
                        <input type="password" name="user_password"> <br>
                        <button style="margin-left: 90%;margin-top:30px" type="submit" name="btn">Thêm</button>
                    </div>
                    <div class="side">
                        <p>Email</p>
                        <input type="text" name="user_email"> <br><br>
                        <p>Avatar</p>
                        <input type="file" name="avatar">

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>