<?php
    include_once 'head.php';

echo '   <div class="container">
            <div class="alert alert-danger">
                <strong>Có lỗi!</strong> Không thể kết nối Database.
              </div>
            <h2>Vui lòng thiết lập lại các thông số sau:</h2>
            <h4>File /include/conn.php</h4>
            <p>Sửa lại các giá trị của các biến:</p>
            <p>
                $conn_servername, 
                $conn_username, 
                $conn_password, 
                $conn_dataname
            </p>
            <h4>File /include/head.php</h4>
            <p>Sửa lại các giá trị của các biến:</p>
            <p>$homeurl</p>
        </div>';
?>