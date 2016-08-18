<?php
include_once 'include/head.php';
include_once 'include/conn.php';
echo '<title>Thanh toán</title>';
?>
<div class="container">
<?php
include_once 'include/left.php';
?>
<div class="col-md-9">
<?php 
if(!isset($_SESSION['cart'])):
?>
<div class="alert alert-warning">
    <strong>Có lỗi!</strong> Bạn chưa chọn món hàng nào.
</div>
<?php
else:
if (!isset($_SESSION['username'])):
?>
<div class="alert alert-danger">
    <strong>Có lỗi!</strong> Bạn phải đăng nhập để mua hàng. Bấm vào đây để 
    <a href="login.php">Đăng Nhập</a>
</div>
<?php
else:
$username = $_SESSION['username'];
$sel = "SELECT * FROM users WHERE username='$username'";
$rel = $conn->query($sel);
$row = $rel->fetch_assoc();
$sname = $row['name'];
$saddress = $row['address'];
$sphone = $row['phone'];
$semail = $row['email'];
if($sname=="" or $saddress=="" or $sphone=="" or $semail==""):
?>
<div class="alert alert-danger">
    <strong>Có lỗi!</strong> Bạn chưa cập nhật thông tin thanh toán. Bấm vào đây để 
    <a href="control.php">Cập nhật</a>
</div>
<?php 
else:
?>
<h2>Thanh toán</h2>
<?php
$cre = $conn->query("select MAX(madh) as max_madh from donhang");
$row = $cre->fetch_assoc();
$madh = $row['max_madh'] + 1;
if(isset($_POST['submit'])):
    $dh = "INSERT INTO `donhang`(`madh`,`tenkh`,`diachi`,`sdt`) VALUES ('$madh','$sname','$saddress','$sphone')";
    if ($conn->query($dh) === TRUE):
        $_SESSION['success'] = 1;
        header('Location: success.php');
?>
<?php else: ?>
<div class="alert alert-danger">
    <strong>Có lỗi !</strong> Đơn hàng của bạn không được chấp nhận.
</div>
<?php        
endif;
endif;
$dhct = array();
?>
<div style="background: #f5f5f5; width: 50%; margin: auto; border: 1px solid gainsboro; padding: 10px;">
    <h4 style="text-align: center">HÓA ĐƠN</h4>
    <p>Họ tên: <?php echo $sname; ?></p>
    <p>Địa chỉ: <?php echo $saddress; ?></p>
    <p>SĐT: <?php echo $sphone; ?></p>
    <p>Email: <?php echo $semail; ?></p>
    <table class="table">
        <thead>
          <tr>
              <th class="col-sm-4">Tên sản phẩm</th>
              <th class="col-sm-3">Giá</th>
              <th class="col-sm-2">SL</th>
              <th class="col-sm-3">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
            <?php
                for($i=0;$i<=999;$i++):
                if(isset($_SESSION['cart'][$i])):
            ?>
            <tr>
                <td><?php echo $_SESSION['cart'][$i]['tensp']; ?></td>
                <td><?php echo $_SESSION['cart'][$i]['gia']; ?> VNĐ</td>
                <td><?php echo $_SESSION['cart'][$i]['sl']; ?></td>
                <td><?php echo $_SESSION['cart'][$i]['tt']; ?> VNĐ</td>
            </tr>
            <?php 
            $tensp = $_SESSION['cart'][$i]['tensp'];
            $gia = $_SESSION['cart'][$i]['gia'];
            $sl = $_SESSION['cart'][$i]['sl'];
            $tt = $_SESSION['cart'][$i]['tt'];
            if(isset($_POST['submit'])){
                $dhct = "INSERT INTO `donhangct`(`madh`,`tensp`,`gia`,`soluong`,`tongtien`) VALUES ('$madh','$tensp','$gia','$sl','$tt')";
                $conn->query($dhct) === TRUE;
            }
            endif;
            endfor;
            ?>
        </tbody>
    </table>
    <h4 style="text-align:right;">Tổng tiền: <b style="color: red"><?php echo $_SESSION['cart']['total']; ?> VNĐ</b></h4>
</div>
<p style="height: 20px;"></p>
<form style="text-align: center;" method="POST" action="">
    <button type="submit" name="submit" class="btn btn-success">Đồng ý</button></a>
    <button type="submit" name="cancel" class="btn btn-danger">Hủy Bỏ</button></a>
</form>
<?php
endif;
?>
<?php endif; endif; ?>
</div>
</div>
<?php include_once 'include/end.php'; ?>

