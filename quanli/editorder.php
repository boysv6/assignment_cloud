<?php
session_start();
include_once '../include/conn.php';
if (!isset($_SESSION['username']) or $_SESSION['username']!=='admin'){
    echo 'ban phai dang nhap admin';
    header('Location: ../index.php');
}  else {
if(isset($_GET['madh'])){
    $madh = $_GET['madh'];
    $upd = "UPDATE `donhang` SET `tinhtrang`='Đã Giao' WHERE madh=$madh";
    $conn->query($upd) === TRUE;
}
header('Location: order.php');
}

