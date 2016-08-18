<?php
include_once 'include/head.php';
include_once 'include/conn.php';
echo '<title>Cập nhật thông tin</title>';
?>
<div class="container">
<?php
include_once 'include/left.php';
if (!isset($_SESSION['username'])):
?>
<div class="col-md-9">
    <div class="alert alert-danger">
        <strong>Có lỗi!</strong> Bạn phải chưa đăng đăng nhập. Bấm vào đây để 
        <a href="login.php">Đăng Nhập</a>
    </div>
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
?>
<div class="col-md-9">
<?php
if (isset($_POST["btn-submit"])):
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $upd = "UPDATE `users` SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone' WHERE username='$username'";
if ($conn->query($upd) === TRUE):
?>
<div class="alert alert-success">
    <strong>Thành công!</strong> Cập nhật thành công.
</div>
<?php else: ?>
<div class="alert alert-danger">
    <strong>Có lỗi!</strong> Cập nhật thất bại.
</div>
<?php
endif;
endif;
?>
    <h3>Cập nhật thông tin liên hệ</h3>
    <div style="padding: 10px;"></div>
    <form class="form-horizontal" role="form" action="" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-3">Họ tên:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $sname; ?>" required="">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Địa chỉ:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $saddress; ?>" required="">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Số điện thoại:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $sphone; ?>" required="">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Email:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $semail; ?>" required="">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" name="btn-submit" class="btn btn-success">Cập nhật</button>
              <button name="cancel" type="submit" class="btn btn-warning">Hủy</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</div>
<?php
endif;
?>
</div>
<?php include_once 'include/end.php'; ?>
