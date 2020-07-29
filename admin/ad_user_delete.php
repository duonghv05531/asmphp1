<?php
require_once '../permission.php';
$header = "user";
$path = "../";
require_once '../htassets/dbconnection.php';
//lay id tren url
$id = $_GET['id'];
// goi ham xoa
$sql = "delete from users where user_id = $id";
deleteQuery($sql, $header);
