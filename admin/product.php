<?php
$title = "Admin";
$path = "../";
require_once '../htassets/require.php';
$sql = "SELECT products.pro_id,categories.cate_name,products.pro_name,products.pro_image,products.pro_quantity,products.pro_price,
products.pro_sale,products.pro_sortdesc,products.pro_desc FROM
products INNER JOIN categories ON products.cate_id = categories.cate_id";
getSimplequerry($sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../htassets/head.php'; ?>

<head>
    <style>
        h2 {
            text-align: center;
        }

        table {
            text-align: center;
            width: 1366px;
            margin: auto;
        }

        img {
            width: 150px;
            height: 200px;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="content">
        <?php include './admin_asset/header.php'; ?>
        <div class="main">
            <table border="1">
                <thead>
                    <th>Mã sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá gốc</th>
                    <th>Giá sale</th>
                    <th>Mô tả ngắn</th>
                    <th>Chi tiết</th>
                    <th>
                        Hành động
                        <br><a href="ad_pro_add.php"><button type="submit">Thêm</button></a>
                    </th>
                </thead>

                <tbody>
                    <?php foreach ($values as $pro) : ?>
                        <tr>
                            <td><?= $pro['pro_id'] ?></td>
                            <td><?= $pro['cate_name'] ?></td>
                            <td><?= $pro['pro_name'] ?></td>
                            <td><img src="../images/products/<?= $pro['pro_image'] ?>" alt=""></td>
                            <td><?= $pro['pro_quantity'] ?></td>
                            <td><?= $pro['pro_price'] ?></td>
                            <td><?= $pro['pro_sale'] ?></td>
                            <td><?= $pro['pro_sortdesc'] ?></td>
                            <td><textarea name="" cols="50" rows="10"><?= $pro['pro_desc'] ?></textarea></td>
                            <td><a href="ad_pro_delete.php?id=<?= $pro['pro_id'] ?>"><button type="submit">Xóa</button></a>
                                <button type="submit">Sửa</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>