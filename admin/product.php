<?php
include '../permission.php';
$title = "Product";
$path = "../";
require_once '../htassets/require.php';
$sql = "SELECT products.pro_id,categories.cate_id,categories.cate_name,products.pro_name,products.pro_avatar,products.pro_quantity,products.pro_price,
    products.pro_sale,products.pro_sortdesc,products.pro_desc,pro_mate,pro_size,pro_color FROM
    products INNER JOIN categories ON products.cate_id = categories.cate_id";
// goi ham xoa
getSimplequerry($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php
// include phan head
include '../htassets/head.php'; ?>

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
                    <th>Chất liệu</th>
                    <th>Size</th>
                    <th>Màu sắc</th>
                    <th>
                        Hành động <br>
                        <a href="ad_pro_add.php"><button class="ad-bt" type="submit">Thêm</button></a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($values as $pro) : ?>
                        <tr>
                            <td><?= $pro['pro_id'] ?></td>
                            <td><a style="color: black;" href="../category.php?id=<?= $pro['pro_id'] ?>"><?= $pro['cate_name'] ?></a></td>
                            <td><a style=" color: black;" href="../pro_info.php?id=<?= $pro['pro_id'] ?>"><?= $pro['pro_name'] ?></a></td>
                            <td><img src="../images/products/<?= $pro['pro_avatar'] ?>" alt=""></td>
                            <td><?= $pro['pro_quantity'] ?></td>
                            <td><?= $pro['pro_price'] ?></td>
                            <td><?= $pro['pro_sale'] ?></td>
                            <td><?= $pro['pro_sortdesc'] ?></td>
                            <td><?= $pro['pro_desc'] ?></td>
                            <td><?= $pro['pro_mate'] ?></td>
                            <td><?= $pro['pro_size'] ?></td>
                            <td><?= $pro['pro_color'] ?></td>

                            <td><a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không')" href="ad_pro_delete.php?id=<?= $pro['pro_id'] ?>"><button class="ad-bt" type="submit">Xóa</button></a> <br>
                                <a href="ad_pro_update.php?id=<?= $pro['pro_id'] ?>"><button class="ad-bt" type="submit">Sửa</button></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>