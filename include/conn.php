<?php
$conn_servername = "localhost";
$conn_username = "root";
$conn_password = "";
$conn_dataname = "banhang";
$conn = new mysqli($conn_servername, $conn_username, $conn_password, $conn_dataname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    header('Location: '.$homeurl.'/include/error.php');
}
?>