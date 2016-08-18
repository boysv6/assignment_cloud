<?php
include_once '../include/head.php';
include_once '../include/conn.php';
echo '<title>Xóa sản phẩm</title>';
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
        if (isset($_POST['delete'])){
        $masp=$_GET['masp'];
        $sql = "DELETE FROM hanghoa WHERE masp=$masp";
            if ($conn->query($sql) === TRUE) {
                header('Location: '.$homeurl.'/quanli');
                } else {
                    echo '<div class="container"><div class="alert alert-danger">
                            <strong>Có lỗi!</strong> Không xóa được.
                          </div></div>';
                }
        }
        if (isset($_POST['cancel'])){
            header('Location: '.$homeurl.'/quanli');
        }
        echo'<div class="container">
                <h3>Bạn chắc chắn muốn xóa?</h3>
                <form method="POST" action="">
                    <button name="delete" type="submit" class="btn btn-danger">Đồng ý</button>
                    <button name="cancel" type="submit" class="btn btn-success">Không</button>
                </form>
            </div>';
    }
}
include_once '../include/end.php';
?>