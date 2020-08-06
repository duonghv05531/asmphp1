<?php
$path = '.';
$title = "Đăng ký";
require_once './htassets/require.php';
if (isset($_POST['btn'])) {
    extract($_REQUEST);

    if ($user_name == "" || $user_password == "") {
        $fillerr = "Yêu cầu nhập đầy đủ thông tin";
    } else {
        $ucheck = "select * from users where user_name = '$user_name'";
        $echeck = "select * from users where user_email = '$user_email'";
        $usercheck = getSimplequerryOne($ucheck);
        $emailcheck = getSimplequerryOne($echeck);
        if ($usercheck != false) {
            $usererr = "Tên đăng nhập đã được sử dụng";
        } elseif ($emailcheck != false) {
            $emailerr = "Email đã được sử dụng";
        } else {
            $password = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "insert into users(user_name,user_password,user_passwordhash,user_email,user_role) values('$user_name','$user_password','$password','$user_email','3')";
            addValuesquery($sql);
            header("location:login.php");
        }
    }
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
                        <input type="text" name="user_name">
                        <p><?= isset($usererr) ? $usererr : "" ?></p>
                        <br>
                        <p>Password</p>
                        <input type="password" name="user_password"> <br>
                        <button style="margin-left: 90%;" type="submit" name="btn">Đăng ký</button>
                    </div>
                    <div class="side">
                        <p>Email</p>
                        <input type="text" name="user_email">
                        <p><?= isset($emailerr) ? $emailerr : "" ?></p>
                        <br>
                        <p><?= isset($fillerr) ? $fillerr : "" ?></p>
                    </div>

                </form>
            </div>
        </div>
        <?php include './htassets/footer.php'; ?>
    </div>

</body>

</html>