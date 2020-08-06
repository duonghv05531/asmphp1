<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("location:http://localhost:81/asmphp1/login.php?message=ban phai dang nhap truoc");
    die();
}
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == '3') {
        header("location:http://localhost:81/asmphp1/?message=ban khong phai admin");
    }
}
