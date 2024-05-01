<?php
$link = mysqli_connect('localhost:33060', 'root', 'root', 'car');

if (!$link) {
    echo '數據庫連結失敗';
    exit;
}

mysqli_query($link, 'set names utf8');

// 標記當前時間
$tmp_date = date('Y-m-d H:i:s');

// 獲取表單數據
$member_name = $_POST['member_name'];
$acc = $_POST['acc'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO member (member_name, acc, pwd, insert_date, update_date) 
        VALUES ('$member_name', '$acc', '$pwd', '$tmp_date', '$tmp_date')";

if (mysqli_query($link, $sql)) {
    echo '數據輸入成功';
} else {
    echo '數據輸入失敗: ' . mysqli_error($link);
}

mysqli_close($link);
?>
