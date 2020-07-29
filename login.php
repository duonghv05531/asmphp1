<?php
if (isset($_SESSION['username'])) {
    header("location:./?message=dangnhapthanhcong");
    die();
}
session_start();
require_once './htassets/dbconnection.php';
$title = "Đăng nhập";
$path = ".";

if (isset($_POST['login'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['user_password'];
    $sql = "select * from users where user_name = '$user_name'";
    $rl = getSimplequerryOne($sql);
    if ($rl == "") {
        header("location:login.php?message=Tai khoan khong ton tai");
    } else {
        if ($password != $rl['user_password']) {
            header("location:login.php?message=Mat khau khong chinh xac");
        } else {
            $_SESSION['username'] = $user_name;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $rl['user_email'];
            $_SESSION['role'] = $rl['user_role'];
            header("location:./?message=Dang nhap thanh cong");
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
                <input type="text" name="user_name"> <br><br>
                <p>Password</p>
                <input type="text" name="user_password"> <br>
                <button type="submit" name="login">Đăng nhập</button>

            </form>
        </div>
    </div>
</body>

</html>