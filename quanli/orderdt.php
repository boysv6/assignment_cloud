<?php
include_once '../include/head.php';
include_once '../include/conn.php';
echo '<title>Quản lí đơn hàng</title>';
?>
<div class="container">
<?php if (!isset($_SESSION['username']) or $_SESSION['username']!=='admin'): ?>
<div class="alert alert-danger">
    <strong>Có lỗi!</strong> Bạn phải đăng nhập với tài khoản ADMIN.
</div>
<?php
else:
if(!isset($_GET['madh'])){
    header('Location: order.php');
}
$madh = $_GET['madh'];
$donhang = "select * from donhang where madh=$madh";
$resdh = $conn->query($donhang);
$dh = $resdh->fetch_assoc();
if($dh['tinhtrang']==''){
    $tinhtrang = 'Chưa giao';
}  else {
    $tinhtrang = $dh['tinhtrang'];
}
$dhct = "select * from donhangct where madh=$madh";
$result = $conn->query($dhct);
?>
<div class="col-md-1"></div>
<div class="col-md-10">
<p></p>
<h2>CHI TIẾT ĐƠN HÀNG</h2>
<a href="order.php"><button type="button" class="btn btn-default">Quản lí đơn hàng</button></a>
<h4>Tên khách hàng: <?php echo $dh['tenkh']; ?></h4>
<h4>Địa chỉ: <?php echo $dh['diachi']; ?></h4>
<h4>SĐT: <?php echo $dh['sdt']; ?></h4>
<h4>Tình trạng: <?php echo $tinhtrang; ?></h4>
<p></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-sm-5">Tên sản phẩm</th>
            <th class="col-sm-2">Giá</th>
            <th class="col-sm-2">Số lượng</th>
            <th class="col-sm-3">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
<?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['tensp']; ?></td>
            <td><?php echo $row['gia']; ?></td>
            <td><?php echo $row['soluong']; ?></td>
            <td><?php echo $row['tongtien']; ?></td>
        </tr>
<?php endwhile; ?>
    </tbody>
</table>
<?php
$tt = $conn->query("select SUM(tongtien) as tt from donhangct where madh=$madh");
$row_tt = $tt->fetch_assoc();
?>
<h4 style="text-align:right;">Tổng tiền: <b style="color: red"><?php echo $row_tt['tt']; ?> VNĐ</b></h4>
<div style="text-align: right">
    <a href="editorder.php?madh=<?php echo $dh['madh']; ?>"><button type="button" class="btn btn-success">Đã Giao</button></a>
    <a href="delorder.php?madh=<?php echo $dh['madh']; ?>"><button type="button" class="btn btn-danger">Xóa Đơn Hàng</button></a>
</div>
</div>
<div class="col-md-1"></div>
<?php
endif;
?>
</div>
<?php include_once '../include/end.php'; ?>