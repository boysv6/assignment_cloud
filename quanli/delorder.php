<?php
session_start();
include_once '../include/conn.php';
if (!isset($_SESSION['username']) or $_SESSION['username']!=='admin'){
    echo 'ban phai dang nhap admin';
    header('Location: ../index.php');
}  else {
if(isset($_GET['madh'])){
    $madh = $_GET['madh'];
    $dh = "Delete from donhang WHERE madh=$madh";
    $conn->query($dh) === TRUE;
    $dhct = "Delete from donhangct WHERE madh=$madh";
    $conn->query($dhct) === TRUE;
}
header('Location: order.php');
}

