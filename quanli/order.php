<?php
include_once '../include/head.php';
include_once '../include/conn.php';
echo '<title>Quản lí đơn hàng</title>';
?>
<div class="container">
<p></p>
<?php if (!isset($_SESSION['username']) or $_SESSION['username']!=='admin'): ?>
<div class="alert alert-danger">
    <strong>Có lỗi!</strong> Bạn phải đăng nhập với tài khoản ADMIN.
</div>
<?php
else:
if ( !isset($_GET['page']) )
                {
                    $page = 0 ;
                } else {
                    $page = $_GET['page'];
                }
$coutn = $conn->query("SELECT * FROM donhang")->num_rows;
$slb = 6;
$sodl = $page*$slb;
$slpage = $coutn/$slb;
$sel = "SELECT * FROM donhang LIMIT $sodl,$slb";
$result = $conn->query($sel);
if ($result->num_rows > 0):
?>
<h2>Danh sách đơn hàng</h2>
 <a href="index.php"><button type="button" class="btn btn-default">Quản lí sản phẩm</button></a>
<p></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="col-sm-3">Tên khách hàng</th>
            <th class="col-sm-4">Địa chỉ</th>
            <th class="col-sm-2">SĐT</th>
            <th class="col-sm-1">Tình Trạng</th>
            <th class="col-sm-2">Lựa chọn</th>
        </tr>
    </thead>
    <tbody>
<?php 
while($row = $result->fetch_assoc()): 
if($row['tinhtrang']==''){
    $tinhtrang = 'Chưa giao';
}  else {
    $tinhtrang = $row['tinhtrang'];
}
?>
        <tr>
            <td><?php echo $row['tenkh']; ?></td>
            <td><?php echo $row['diachi']; ?></td>
            <td><?php echo $row['sdt']; ?></td>
            <td><?php echo $tinhtrang; ?></td>
            <td>
                <a href="orderdt.php?madh=<?php echo $row['madh']; ?>"><button type="button" class="btn btn-success">Chi tiết</button></a>
                <a href="delorder.php?madh=<?php echo $row['madh']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
            </td>
        </tr>
<?php endwhile; ?>
    </tbody>
</table>
<center>
    <ul class="pagination">
<?php
for ( $i = 0; $i < $slpage; $i ++ ):
if($i == $page){
    $active = ' class="active"';
} else {
    $active = '';
}
$ten = $i + 1;
?>
        <li<?php echo $active; ?>><a href="order.php?page=<?php echo $i; ?>"><?php echo $ten; ?></a></li>
<?php endfor; ?>
    </ul>
</center>
<?php else: ?>
<div class="alert alert-info">
    <strong>Có lỗi!</strong> Không có Đơn hàng.
</div>
<?php endif; endif; ?>
</div>
<?php include_once '../include/end.php'; ?>

