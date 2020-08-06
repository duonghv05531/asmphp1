<?php
require_once '../permission.php';
$title = "Categories";
$path = "../";
require_once '../htassets/require.php';
require_once '../htassets/dbconnection.php';
$sql = "select * from categories";
getSimplequerry($sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../htassets/head.php' ?>

<body>
    <div class="content">
        <?php include './admin_asset/header.php' ?>
        <div class="main">
            <table border="1">
                <thead>
                    <th>Cate_id</th>
                    <th>Cate_name</th>
                    <th>Cate_image</th>
                    <th>Cate_desc</th>
                    <th>
                        Hành động <br>
                        <a href="ad_cate_add.php"><button class="ad-bt" type="submit">Thêm</button></a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($values as $c) : ?>
                        <tr>
                            <td><?= $c['cate_id'] ?></td>
                            <td><?= $c['cate_name'] ?></td>
                            <td><img src="../images/categories/<?= $c['cate_image'] ?>" width="100px" alt=""></td>
                            <td><?= $c['cate_desc'] ?></td>
                            <td><a onclick="return confirm('Bạn có chắc chắn xóa danh mục này không')" href="ad_cate_delete.php?id=<?= $c['cate_id'] ?>"><button class="ad-bt" type="submit">Xóa</button></a> <br>
                                <a href="ad_cate_update.php?id=<?= $c['cate_id'] ?>"><button class="ad-bt" type="submit">Sửa</button></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>