<?php

$link = mysqli_connect('localhost:33060', 'root', 'root', 'car');

if (!$link) {
    echo '數據庫連接失敗';
    exit;
}

mysqli_query($link, 'set names utf8');

$tmp_date = date('Y-m-d H:i:s');

$name = $_POST['name'];
$food = $_POST['food'];
$price = $_POST['price'];

$sql = "INSERT INTO orders (name, food, price, insert_date, update_date) 
        VALUES ('$name', '$food', '$price', '$tmp_date', '$tmp_date')";

if (mysqli_query($link, $sql)) {
    echo '訂餐成功';
} else {
    echo '訂餐失敗: ' . mysqli_error($link);
}

mysqli_close($link);
?>
