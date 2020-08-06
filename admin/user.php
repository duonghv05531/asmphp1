<?php
require_once '../permissionadmin.php';
$title = "Admin";
$path = "../";
require_once '../htassets/require.php';
$sql = "select * from users";
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
                    <th>Mã nhân viên</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>
                        Hành động
                        <br><a href="ad_user_add.php"><button type="submit">Thêm</button></a>
                    </th>
                </thead>

                <tbody>
                    <?php foreach ($values as $user) : ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $user['user_password'] ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td>
                                <img src="../images/user/<?= $user['avatar'] ?>" alt="">
                            </td>
                            <td>
                                <?= $user['user_role'] == 1 ? "Admin" : "" ?>
                                <?= $user['user_role'] == 2 ? "Nhân viên" : "" ?>
                                <?= $user['user_role'] == 3 ? "Khách hàng" : "" ?>
                            </td>
                            <td><a onclick="return confirm('Bạn có chắc chắn xóa tài khoản này')" href="ad_user_delete.php?id=<?= $user['user_id'] ?>"><button type="submit">Xóa</button></a>
                                <a style="color: black;" href="ad_user_update.php?id=<?= $user['user_id'] ?>"><button type="submit">Sửa</button></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>