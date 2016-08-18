<?php
include_once '/include/head.php';
include_once '/include/conn.php';
echo '<title>Đăng kí</title>';
if (isset($_POST["btn-submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    //Check thông tin
    $sel = "SELECT username, email FROM users WHERE username='$username' or email='$email'";
    $result = $conn->query($sel);
    if ($result->num_rows > 0) {
        echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Tên đăng nhập hoặc email đã tồn tại.
              </div></div>';
    } else {
        $ins = "INSERT INTO `users`(`username`, `password`, `name`, `email`) VALUES ('$username','$password','$name','$email')";
        if (mysqli_query($conn, $ins)) {
            $_SESSION['name'] = $name;
            header('Location: '.$homeurl.'/login.php');
        } else {
            echo '<div class="container"><div class="alert alert-danger">
                <strong>Có lỗi!</strong> Không xác định.
              </div></div>';
        }
    }
}
echo'<div class="container">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    <h2>ĐĂNG KÍ</h2>
    <form class="form-horizontal" role="form" action="signup.php" method="POST">
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
        <label class="control-label col-sm-4">Họ tên:</label>
        <div class="col-sm-8">          
            <input type="text" class="form-control" name="name" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Email:</label>
        <div class="col-sm-8">          
            <input type="email" class="form-control" name="email" required="">
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" name="btn-submit" class="btn btn-default">Đăng kí</button>
          <button type="reset" class="btn btn-default">Nhập lại</button>
        </div>
      </div>
    </form>
    </div>
    <div class="col-sm-3"></div>
</div>';
include_once '/include/end.php';
?>