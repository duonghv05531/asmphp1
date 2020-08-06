<?php
session_start();
if (isset($_SESSION['user_name']) == false) {
    header("location:" . $path . "/login.php?message=banphaidangnhaptruoc");
    die();
}
if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == '2') {
        header("location:./");
    }
}
