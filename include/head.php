<?php
session_start();
$homeurl = 'http://localhost/1';
if(isset($_SESSION['sh'])){
    $sh = $_SESSION['sh'];
} else {
    $sh = 0;
}
if (!isset($_SESSION['username'])) {
$headright='<li><a href="'.$homeurl.'/signup.php"><span class="glyphicon glyphicon-user"></span> ĐĂNG KÍ</a></li>
            <li><a href="'.$homeurl.'/login.php"><span class="glyphicon glyphicon-log-in"></span> ĐĂNG NHẬP</a></li>';
} else {
$headright='<li><a href="'.$homeurl.'/control.php"><span class="glyphicon glyphicon-user"></span> '.strtoupper($_SESSION['username']).'</a></li>
            <li><a href="'.$homeurl.'/logout.php"><span class="glyphicon glyphicon-log-out"></span> ĐĂNG XUẤT</a></li>';
}
echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="'.$homeurl.'/css/stype.css" rel="stylesheet" type="text/css"/>
        <script src="'.$homeurl.'/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="'.$homeurl.'/js/jquery.js" type="text/javascript"></script>
        <link href="'.$homeurl.'/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <div class="bg-warning">
    <div class="container">
        <div class = "row">
        <div class="col-sm-4 head-logo">
        <img src="'.$homeurl.'/img/logo.png" alt="logo"/>
        </div>
        <div class="col-sm-4 head-banner">
            <img src="'.$homeurl.'/img/banner.jpg" width="100%" alt="banner"/>
        </div>
        <div class="col-sm-4 head-cart">
            <a href="'.$homeurl.'/cart.php"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng <span class="badge">'.$sh.'</span></button></a>
        </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    </div>
        <div class="menu navbar-default">
        <div class="container">
            <div class = "row">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="'.$homeurl.'">HUỲNH SHOP</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                      <li><a href="'.$homeurl.'"><span class="glyphicon glyphicon-home"></span> TRANG CHỦ</a></li>
                      <li><a href="'.$homeurl.'/quanli/index.php"><span class="glyphicon glyphicon-cog"></span> QUẢN LÍ</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> THÔNG TIN</a></li> 
                      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> TRỢ GIÚP</a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      '.$headright.'
                    </ul>
                </div>
            </div>
            </div>
        </div>
        </div>';
?>

