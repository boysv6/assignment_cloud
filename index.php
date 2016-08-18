<?php
include_once '/include/head.php';
include_once '/include/conn.php';
echo '<title>Thế giới mua sắm trong nhà bạn</title>';
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
                echo '<p></p>
                        <div class="container">
                            <div class="col-md-3">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-danger"><strong>KHUYẾN MÃI HOT</strong></a>
                                    <a href="#" class="list-group-item">Khuyến mãi đặc biệt</a>
                                    <a href="#" class="list-group-item">Đặc biệt trong ngày</a>
                                    <a href="#" class="list-group-item">Deal giá sốc</a>
                                    <a href="#" class="list-group-item list-group-item-info"><strong>THỜI TRANG NAM</strong></a>
                                    <a href="#" class="list-group-item">Quần, áo Nam</a>
                                    <a href="#" class="list-group-item">Phụ kiện Nam</a>
                                    <a href="#" class="list-group-item">Dày nam cao cấp</a>
                                    <a href="#" class="list-group-item list-group-item-success"><strong>THỜI TRANG NỮ</strong></a>
                                    <a href="#" class="list-group-item">Quần, áo Nữ</a>
                                    <a href="#" class="list-group-item">Phụ kiện Nữ</a>
                                    <a href="#" class="list-group-item">Dày nữ</a>
                                    <a href="#" class="list-group-item">Đồ lót nữ</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-9">
                                <h2>Danh sách sản phẩm</h2>';            
                while($row = $result->fetch_assoc()) {
                    echo'<div class="col-md-4" style="height:360px;">
                            <div class="list-group">
                                <a href="show.php?masp='.$row['masp'].'"  class="list-group-item list-group-item-success"><b>'.$row['tensp'].'</b></a>
                                <a href="show.php?masp='.$row['masp'].'" style="text-align: center" class="list-group-item"><img src="img/sp/'.$row['anh'].'" style="width:150px;height:200px"></a>
                                <b class="list-group-item" style="color:red;">
                                <div class="col-md-8">Giá: '.$row['gia'].' VNĐ</div>
                                <div style="text-align: center" class="col-md-4"><a href="addcart.php?masp='.$row['masp'].'"><button type="button" class="btn btn-success">Mua</button></a></div>
                                <div class="clearfix"></div>
                                </b>
                            </div>
                         </div>';
                }
                echo '<div class="clearfix"></div><center><ul class="pagination">';
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
                                    echo '</ul></center></div></div></div>';
            }   
?>
<?php include_once '/include/end.php'; 
?>

