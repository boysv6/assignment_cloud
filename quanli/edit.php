<?php
include_once '../include/head.php';
include_once '../include/conn.php';
echo '<title>Sửa sản phẩm</title>';
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
        $masp=$_GET['masp'];
        $sel = "SELECT * FROM hanghoa WHERE masp=$masp";
        $rel = $conn->query($sel);
        $row = $rel->fetch_assoc();
        $show_tensp = $row['tensp'];
        $show_anh = $row['anh'];
        $show_gia = $row['gia'];
        $show_chitiet = $row['chitiet'];
        $show_soluong = $row['soluong'];
        if (isset($_POST['cancel'])){
            header('Location: '.$homeurl.'/quanli');
        }
        if (isset($_POST["btn-submit"])) {
        $tensp = $_POST["tensp"];
        $anh = $_FILES['anh']['name'];
        $gia = $_POST["gia"];
        $chitiet = $_POST["chitiet"];
        $soluong = $_POST["soluong"];
        if ($anh == "") {
            $anh = $show_anh;
        }
        $ins = "UPDATE `hanghoa` SET `tensp`='$tensp',`anh`='$anh',`gia`='$gia',`chitiet`='$chitiet',`soluong`='$soluong' WHERE masp=$masp";
        if ($conn->query($ins) === TRUE) {
            move_uploaded_file($_FILES['anh']['tmp_name'], '../img/sp/'.$_FILES['anh']['name']);
            echo '<div class="container"><div class="alert alert-success">
                    <strong>Thành công!</strong> Đã sửa thành công.
                  </div></div>';
        } else {
            echo '<div class="container"><div class="alert alert-danger">
                    <strong>Có lỗi!</strong> Sửa thất bại.
                  </div></div>';
        }
        }
    }
    echo '<div class="container">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <h2>Sửa sản phẩm</h2>
        <form class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-4">Tên sản phẩm:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="tensp" value="'.$show_tensp.'" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Ảnh hiện tại:</label>
            <div class="col-sm-8">
                <img src="'.$homeurl.'/img/sp/'.$show_anh.'" class="control-label" alt="Ảnh SP" width="50%"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Ảnh mới:</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" name="anh" accept="image/*">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Giá:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" value="'.$show_gia.'" name="gia" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Chi tiết:</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="chitiet" required="">'.$show_chitiet.'</textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Số lượng:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" value="'.$show_soluong.'" name="soluong" required="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" name="btn-submit" class="btn btn-success">Sửa</button>
              <button name="cancel" type="submit" class="btn btn-warning">Hủy</button>
            </div>
          </div>
        </form>
        </div>
        <div class="col-sm-3"></div>
    </div>';
}
include_once '../include/end.php';
?>