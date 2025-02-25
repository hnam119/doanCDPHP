<?php
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']);
        $sql = "SELECT * FROM dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."'LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            // header("Location: index.php?quanly=giohang");
            echo '<script>window.location.href="index.php?quanly=giohang";</script>';
            exit;
        }else{
            echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
                    Đăng nhập
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Tài khoản</label>
                        <input type="text" class="form-control" id="username" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="matkhau" placeholder="Nhập mật khẩu">
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