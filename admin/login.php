<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."'LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
        }else{
            echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
            header("Location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        body {
            background: #f2f2f2;
        }
        .wrapper-login {
            width: 30%;
            margin: 0 auto;
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <div class="wrapper-login">
        <form action="" autocomplete="off" method="POST">
            <div class="card">
                <div class="card-header text-center">
                    Đăng nhập Admin
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Tài khoản</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>