<?php
session_start();
if (isset($_SESSION['username']) == false) {
    header("location:" . $path . "/login.php?message=banphaidangnhaptruoc");
    die();
}
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == '3') {
        header("location:http://localhost:81/asmphp1/?message=ban khong phai admin");
    }
}
