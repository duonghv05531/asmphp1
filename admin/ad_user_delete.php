<?php
require_once '../permission.php';
$path = "../";
$header = "user";
require_once '../htassets/dbconnection.php';
//lay id tren url
$id = $_GET['id'];
// goi ham xoa
$sql = "delete from users where user_id = $id";
deleteQuery($sql, $header);
