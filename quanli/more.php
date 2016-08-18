<?php
include_once '../include/head.php';
include_once '../include/conn.php';
echo '<title>Thêm sản phẩm</title>';
if (!isset($_SESSION['username'])) {
    echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Bạn phải đăng nhập với tài khoản ADMIN.
              </div></div>';
}  else {
    if($_SESSION['username']!='admin'){
        echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Bạn phải đăng nhập với tài khoản ADMIN.
              </div></div>';
    }  else {
        if (isset($_POST["btn-submit"])) {
        $tensp = $_POST["tensp"];
        $anh = $_FILES['anh']['name'];
        $gia = $_POST["gia"];
        $chitiet = $_POST["chitiet"];
        $soluong = $_POST["soluong"];
        $sel = "SELECT * FROM hanghoa WHERE tensp='$tensp'";
        $result = $conn->query($sel);
        if ($result->num_rows > 0) {
            echo'<div class="container"><div class="alert alert-warning">
                    <strong>Báo cáo!</strong> Tên sản phẩm bị trùng.
                 </div></div>';
        }  else {
            $ins = "INSERT INTO `hanghoa`(`tensp`, `anh`, `gia`, `chitiet`, `soluong`) VALUES ('$tensp','$anh','$gia','$chitiet','$soluong')";
            if ($conn->query($ins) === TRUE) {
                move_uploaded_file($_FILES['anh']['tmp_name'], '../img/sp/'.$_FILES['anh']['name']);
                echo '<div class="container"><div class="alert alert-success">
                        <strong>Thành công!</strong> Đã thêm thành công.
                      </div></div>';
            } else {
                echo '<div class="container"><div class="alert alert-danger">
                        <strong>Có lỗi!</strong> Thêm thất bại.
                      </div></div>';
            }
        }
        }
        echo '<div class="container">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                <h2>Thêm sản phẩm</h2>
                <form class="form-horizontal" role="form" action="more.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Tên sản phẩm:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tensp" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-4">Ảnh:</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="anh"  accept="image/*" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-4">Giá:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="gia" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-4">Chi tiết:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="chitiet" required=""></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-4">Số lượng:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="soluong" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" name="btn-submit" class="btn btn-success">Thêm sản phẩm</button>
                    </div>
                  </div>
                </form>
                </div>
                <div class="col-sm-3"></div>
            </div>';
        }
}
include_once '../include/end.php';
?>

    

