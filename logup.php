<?php
$path = '.';
$title = "Đăng ký";
require_once './htassets/require.php';
if (isset($_POST['btn'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $sql = "insert into users(user_name,user_password,user_email,user_role) values('$user_name','$user_password','$user_email','3')";
    addValuesquery($sql);
    header("location:login.php?message=Dang ky tai khoan thanh cong");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include './htassets/head.php'; ?>

<body>
    <div class="content">
        <?php include './htassets/header.php'; ?>
        <div class="main">
            <div class="side-bar">
                <h2 style="text-align: center;margin-bottom:10px;">THÊM MỚI TÀI KHOẢN</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="side">
                        <p>username</p>
                        <input type="text" name="user_name"> <br> <br>
                        <p>Password</p>
                        <input type="password" name="user_password"> <br>
                        <button style="margin-left: 90%;margin-top:30px" type="submit" name="btn">Đăng ký</button>
                    </div>
                    <div class="side">
                        <p>Email</p>
                        <input type="text" name="user_email"> <br><br>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>