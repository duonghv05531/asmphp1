<?php
require_once '../permission.php';
$header = "product";
$path = "../";
require_once '../htassets/dbconnection.php';
// lay id tren url
$id = $_GET['id'];
$sql = "delete from products where pro_id = $id";
//goi ham delete
deleteQuery($sql, $header);
