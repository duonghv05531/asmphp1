<?php
$path = "./";
$title = "Thông tin sản phẩm";
require_once './htassets/require.php';
$id = $_GET['id'];
$sql = "select * from products where pro_id = $id";
var_dump($sql);
die;
getSimplequerryOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './htassets/head.php';
?>

<body>
    <div class="content">
        <?php include './htassets/header.php'; ?>
        <div class="main">
            <h2>Thông tin sản phẩm</h2>
            <?= $result['pro_name'] ?>
        </div>
    </div>

</body>

</html>