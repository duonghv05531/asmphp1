<?php
require_once '../permission.php';
$path = "../";
$header = "category";
require_once '../htassets/dbconnection.php';
//lay id tren url
$id = $_GET['id'];
// goi ham xoa
$sql = "delete from categories where cate_id = $id";
deleteQuery($sql, $header);
