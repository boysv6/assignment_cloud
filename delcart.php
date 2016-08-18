<?php
session_start();
$masp=$_GET['masp'];
if($masp == 0)
{
	unset($_SESSION['cart']);
        unset($_SESSION['sh']);
}
else
{
unset($_SESSION['cart'][$masp]);
}
header("location:cart.php");
exit();
?>
