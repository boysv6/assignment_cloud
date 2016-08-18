<?php
session_start();
include_once 'include/conn.php';
$masp=$_GET['masp'];
if(isset($_GET['soluong'])){
    $sl=$_GET['soluong'];
} else {
    $sl=1;
}
$sel = "SELECT * FROM hanghoa WHERE masp=$masp";
$rel = $conn->query($sel);
$row = $rel->fetch_assoc();
$tensp = $row['tensp'];
$gia = $row['gia'];
if(isset($_SESSION['cart'][$masp])){
    $sll=$_SESSION['cart'][$masp]['sl'] + $sl;
} else {
    $sll = $sl;
}
$tongtien = $gia * $sll;
$item = array(
        'id' => 1,
        'masp' => $masp,
        'tensp' => $tensp,
        'gia' => $gia,
        'sl' => $sll,
        'tt' => $tongtien
    );
$_SESSION['cart'][$masp]=$item;
header("location:cart.php");
exit();
?>

