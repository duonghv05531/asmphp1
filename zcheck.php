<?php
$path = "./";
require_once './htassets/require.php';
if (isset($_POST['btn'])) {
    $img_check = getNameImg("img_check");
    // if (!empty($img_check)) {
    //     move_uploaded_file($_FILES['img_check']['tmp_name'], "./images/products" . $img_check);
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img_check">
        <button type="submit" name="btn">Check</button>
    </form>
</body>

</html>