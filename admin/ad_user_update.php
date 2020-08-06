<?php
require_once '../permission.php';
$path = "../";
$title = "Sửa tài khoản";
require_once '../htassets/dbconnection.php';
$id = $_GET['id'];
$sql = "select * from users where user_id = $id";
$user = getSimplequerryOne($sql);

if (isset($_POST['btn'])) {
    extract($_REQUEST);
    if ($user_password == "" || $user_email == "" || $user_role == "") {
        $fillerror = "Yêu cầu nhập đủ thông tin";
    } else {

        $avatar = getNameImgUpdate("avatar");
        $user_passwordhash = password_hash($user_password, PASSWORD_DEFAULT);
        $sql = "update users set user_name = '$user_name', user_password = '$user_password', user_passwordhash = '$user_passwordhash',
            avatar = '$avatar',user_email='$user_email', user_role = '$user_role' where user_id = $id";
        addValuesquery($sql);
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../images/user/' . $_FILES['avatar']['name']);
        header("location:user.php");
        die();
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
                <h2 style="text-align: center;margin-bottom:10px;">CẬP NHẬT TÀI KHOẢN</h2>
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
                        <input type="text" name="user_name" value="<?= $user['user_name'] ?>" readonly> <br> <br>

                        <p>Password</p>
                        <input type="password" name="user_password" value="<?= $user['user_password'] ?>"> <br>
                        <button style="margin-left: 30%;margin-top:30px" type="submit" name="btn">Sửa</button>
                    </div>
                    <div class="side">
                        <p>Email</p>
                        <input type="text" name="user_email" value="<?= $user['user_email'] ?>">
                        <p><?= isset($emailerr) ? $emailerr : "" ?></p>
                        <br><br>
                        <p>Avatar</p>
                        <p><?= isset($emailerr) ? $emailerr : "" ?></p>
                        <?php if (isset($user['avatar'])) : ?>
                            <input type="hidden" name="avatar" value="<?= $user['avatar'] ?>">
                            <img src="../images/avatar/<?= $user['avatar'] ?>" alt="" width="150px">
                        <?php endif ?>
                        <input type="file" name="avatar"> <br> <br>
                        <?= isset($fillerror) ? "<p>" . $fillerror . "</p>" : "" ?> <br>

                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>