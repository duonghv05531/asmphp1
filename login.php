<?php
session_start();
require_once './htassets/dbconnection.php';
$title = "Đăng nhập";
$path = ".";
if (isset($_POST['login'])) {
    extract($_REQUEST);
    if ($user_name == "") {
        $usererr = "Yêu cầu nhập đủ thông tin tài khoản mật khẩu";
    } elseif ($user_password == "") {
        $passerr = "Yêu cầu nhập mật khẩu";
    } else {
        $sql = "select * from users where user_name = '$user_name'";
        $rl = getSimplequerryOne($sql);
        if ($rl != false) {
            if (password_verify($user_password, $rl['user_passwordhash'])) {

                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $rl['user_email'];
                $_SESSION['user_role'] = $rl['user_role'];
                header("location:index.php");
            }
        } else {
            $usererr = "Tên đăng nhập chưa chính xác";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include './htassets/head.php';
?>

<body>

    <div class="content">
        <?php include './htassets/header.php'; ?>
        <div class="main">
            <form style="width:40%;margin:auto; padding-left: 400px" action="" method="post">
                <p>Username</p>
                <input type="text" name="user_name" value="<?= isset($user_name) ? $user_name : "" ?>">
                <span><?= isset($fillerr) ? $fillerr : "" ?></span><br><br>
                <p>Password</p>
                <input type="text" name="user_password" value="<?= isset($user_password) ? $user_password : "" ?>">
                <span><?= isset($passerr) ? $passerr : "" ?></span> <br> <br>
                <button type=" submit" name="login">Đăng nhập</button>

            </form>
        </div>
        <?php include './htassets/footer.php' ?>
    </div>
</body>

</html>