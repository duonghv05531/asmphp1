<?php
//bien dang nhap
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'asmphp1';
// ket noi database
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo "ket noi that bai <br>" . $e->getMessage();
}
// cac ham truy van du lieu
//ham select
function getSimplequerry($sql)
{
    global $conn;
    global $values;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getSimplequerrycate($sql)
{
    global $conn;
    global $value;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// ham lay du select one
function getSimplequerryOne($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//ham insert
function addValuesquery($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
//ham delete
function deleteQuery($sql, $header)
{
    global $conn;
    $conn->exec($sql);
    header("location:$header.php?message=xoadulieuthanhcong");
}
//ham lay ten va di chuyen file anh 
function getNameImg($name_get)
{
    return $_FILES[$name_get]['name'];
}
function getNameImgUpdate($name_get)
{
    if ($_FILES["$name_get"]['size'] > 0) {
        return ",$name_get = '" . $_FILES["$name_get"]["name"] . "'";
    } else {
        return "";
    }
}
