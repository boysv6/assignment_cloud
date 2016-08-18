<?php
include_once '/include/head.php';
include_once '/include/conn.php';
echo '<title>Thế giới mua sắm trong nhà bạn</title>';
?>
<div class="container">
<?php
include '/include/left.php';
if (isset($_GET['masp'])):
$masp = $_GET['masp'];
$sel = "SELECT * FROM hanghoa WHERE masp=$masp";
$rel = $conn->query($sel);
$row = $rel->fetch_assoc();
$show_tensp = $row['tensp'];
$show_anh = $row['anh'];
$show_gia = $row['gia'];
$show_chitiet = $row['chitiet'];
$show_soluong = $row['soluong'];
?>
<div class="col-md-9">
    <h3>Thông tin sản phẩm</h3>
    <div class="col-md-4" style="text-align: center;">
        <p><img src="<?php echo $homeurl; ?>/img/sp/<?php echo $show_anh; ?>" alt="AnhSP" width="210" height="280"></p>
        <b>Ảnh sản phẩm</b>
    </div>
    <div class="col-md-8" style="font-size: 12pt;">
        <p><b>Tên sản phẩm: </b><?php echo $show_tensp ?></p>
        <p><b>Giá: </b><b style="color: red;"><?php echo $show_gia ?> VNĐ</b></p>
        <p><b>Chi tiết: </b><?php echo $show_chitiet ?></p>
        <p><b>Còn lại: </b><?php echo $show_soluong ?> sản phẩm</p>
        <form class="form-horizontal" role="form" action="addcart.php" method="GET">
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align: left;">Số lượng:</label>
                <div class="col-md-2">
                    <input type="hidden" name="masp" value="<?php echo $row['masp']; ?>">
                    <input type="number" name="soluong" required="">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="clearfix"></div>
                <div class="col-sm-offset-0 col-sm-8">
                    <button type="submit" class="btn btn-success">Mua Ngay</button>
                    <?php if(isset($_SESSION['username']) && $_SESSION['username']=='admin'): ?>
                    <a href="<?php echo $homeurl; ?>/quanli/edit.php?masp=<?php echo $row['masp']; ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                    <?php endif; ?>
                </div>
            </div> 
        </form>
    </div>
    <div class="clearfix"></div>
</div>
<?php else: ?>   
<div class="col-md-9">
    <strong>Có lỗi!</strong> Bạn chưa chọn sản phẩm.
</div>
<?php endif; ?>
</div>
<?php include_once '/include/end.php'; ?>
