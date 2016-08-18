<?php
include_once 'include/head.php';
include_once 'include/conn.php';
echo '<title>Thế giới mua sắm trong nhà bạn</title>';
?>
<div class="container">
<?php
include '/include/left.php';
if(isset($_SESSION['cart'])):
$subtotal = NULL;
$dem = NULL;
?>
<div class="col-md-9">
    <h3>Thông tin giỏ hàng</h3>
    <table class="table table-bordered">
        <thead>
          <tr>
              <th class="col-sm-3">Tên sản phẩm</th>
              <th class="col-sm-2">Giá sản phẩm</th>
              <th class="col-sm-2">Số lượng</th>
              <th class="col-sm-2">Tổng tiền</th>
              <th class="col-sm-3">Lựa chọn</th>
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
                <td>
                    <a href="delcart.php?masp=<?php echo $_SESSION['cart'][$i]['masp']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                    <a href="show.php?masp=<?php echo $_SESSION['cart'][$i]['masp']; ?>"><button type="button" class="btn btn-success">Mua thêm</button></a>
                </td>
            </tr>
            <?php 
            $subtotal += $_SESSION['cart'][$i]['tt'];
            $_SESSION['cart']['total']=$subtotal;
            $dem += $_SESSION['cart'][$i]['id'];
            $_SESSION['sh'] = $dem;
            endif;
            endfor;
            ?>
        </tbody>
    </table>
    <h4 style="text-align:right;">Tổng tiền: <b style="color: red"><?php echo $_SESSION['cart']['total']; ?> VNĐ</b></h4>
    <div style="text-align: right">
        <a href="endcart.php"><button type="button" class="btn btn-success">Thanh Toán</button></a>
        <a href="delcart.php?masp=0"><button type="button" class="btn btn-danger">Xóa Giỏ Hàng</button></a>
    </div>
</div>
<?php
else: 
?>
<div class="col-md-9">
<div class="alert alert-warning">
    Bạn chưa chọn món hàng nào.
</div>
</div>
<?php
endif;
?>
</div>
<?php include_once 'include/end.php'; ?>