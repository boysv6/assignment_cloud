<?php
include_once '/include/head.php';
include_once '/include/conn.php';
if (isset($_SESSION['username'])) {
    header('Location: index.php');
}
if (isset($_SESSION['name'])) {
    echo'<div class="container"><div class="alert alert-success">
            <strong>Chào '.$_SESSION['name'].'!</strong> Bạn đã đăng kí thành công tiến hành đăng nhập.
         </div></div>';
}
if (isset($_POST["btn-submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $sel = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = $conn->query($sel);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }  else {
        echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Tên đăng nhập hoặc Password không đúng.
              </div></div>';
    }
}
echo'<div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h2>ĐĂNG NHẬP</h2>
        <form class="form-horizontal" role="form" action="login.php" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-4">Tên đăng nhập:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="username" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4">Mật khẩu:</label>
            <div class="col-sm-8">          
                <input type="password" class="form-control" name="password" required="">
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" name="btn-submit" class="btn btn-default">Đăng nhập</button>
            </div>
          </div>
        </form>
    </div>
    <div class="col-sm-3"></div><div class="clearfix"></div>';
include_once '/include/end.php';
?>
