<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'asmphp1';

try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo "ket noi that bai <br>" . $e->getMessage();
}
function getSimplequerry($sql)
{
    global $conn;
    global $values;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getSimplequerryOne($sql)
{
    global $conn;
    global $result;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
function addValuesquery($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function deleteQuery($sql)
{
    global $conn;
    $conn->exec($sql);
    header("location:product.php?message=xoadulieuthanhcong");
}
