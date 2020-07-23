<?php
$path = "../";
require_once '../htassets/dbconnection.php';
$id = $_GET['id'];

$sql = "delete from products where id = $id";
deleteQuery($sql);
