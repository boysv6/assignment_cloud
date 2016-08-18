<?php
include_once 'include/head.php';
include_once 'include/conn.php';
echo '<title>Đăng ký mua hàng thành công</title>';
unset($_SESSION['cart']);
unset($_SESSION['sh']);
?>
<div class="container">
<?php
include_once 'include/left.php';
?>
<div class="col-md-9">
<?php
if(isset($_SESSION['success'])): 
?>
    <div class="alert alert-success">
        <strong>Thành công!</strong> Chúng tôi sẽ gọi cho bạn trong 2 đến 3 năm tới.
    </div>
</div>
<?php else: header('Location: '.$homeurl); endif; ?>
</div>
<?php include_once 'include/end.php'; ?>