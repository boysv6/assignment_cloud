<?php
include_once '../include/head.php';
include_once '../include/conn.php';
echo '<title>Quản lí sản phẩm</title>';
if (!isset($_SESSION['username'])) {
    echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Bạn phải đăng nhập với tài khoản ADMIN.
              </div></div>';
}  else {
    if($_SESSION['username']!=='admin'){
        echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Bạn phải đăng nhập với tài khoản ADMIN.
              </div></div>';
    }  else {
        if ( !isset($_GET['page']) )
                {
                    $page = 0 ;
                } else {
                    $page = $_GET['page'];
                }
                $coutn = $conn->query("SELECT * FROM hanghoa")->num_rows;
                $slb = 6;
                $sodl = $page*$slb;
                $slpage = $coutn/$slb;
                $sel = "SELECT * FROM hanghoa LIMIT $sodl,$slb";
                        $result = $conn->query($sel);
                        if ($result->num_rows > 0) {
                            echo '<div class="container">
                                        <h2>Danh sách sản phẩm</h2> 
                                        <a href="more.php"><button type="button" class="btn btn-default">Thêm sản phẩm</button></a><a href="order.php"><button type="button" class="btn btn-default">Quản lí đơn hàng</button></a>
                                        <p></p>
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                                <th class="col-sm-3">Tên sản phẩm</th>
                                                <th class="col-sm-5">Chi tiết</th>
                                                <th class="col-sm-1">Số lượng</th>
                                                <th class="col-sm-1">Giá</th>
                                                <th class="col-sm-2">Lựa chọn</th>
                                            </tr>
                                          </thead>
                                          <tbody>';
                            while($row = $result->fetch_assoc()) {
                                         echo'<tr>
                                              <td>'. $row["tensp"].'</td>
                                              <td>'. $row["chitiet"].'</td>
                                              <td>'. $row["soluong"].'</td>
                                              <td>'. $row["gia"].' VNĐ</td>
                                              <td>
                                                  <a href="edit.php?masp='.$row['masp'].'"><button type="button" class="btn btn-default">Sửa</button></a>
                                                  <a href="delete.php?masp='.$row['masp'].'"><button type="button" class="btn btn-danger">Xóa</button></a>
                                              </td>
                                            </tr>';
                            }
                            echo'</tbody>
                                        </table><center><ul class="pagination">';
                            for ( $i = 0; $i < $slpage; $i ++ )
                                    {
                                    if($i == $page){
                                        $active = ' class="active"';
                                    } else {
                                        $active = '';
                                    }
                                    $ten = $i + 1;
                                    echo '
                                            <li'.$active.'><a href="index.php?page='.$i.'">'.$ten.'</a></li>
                                          ';
                                    }
                                    echo '</ul></center></div>';
                        }  else {
                            echo '<div class="container"><div class="alert alert-info">
                                    <strong>Có lỗi!</strong> Không có Data.   
                                    <a href="more.php"><button type="button" class="btn btn-default">Thêm sản phẩm</button></a>
                                  </div></div>';
                        }
                    }
}
include_once '../include/end.php';
?>
