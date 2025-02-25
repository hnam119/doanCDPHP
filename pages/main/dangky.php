<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['tenkhachhang'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $dienthoai = $_POST['dienthoai'];
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO dangky (tenkhachhang,email,diachi,matkhau,dienthoai) VALUE ('".$tenkhachhang."', '".$email."', '".$diachi."', '".$matkhau."', '".$dienthoai."')");
        if($sql_dangky){
            echo '<script>alert("Đăng ký thành công.");</script>';
            $_SESSION['dangky'] = $tenkhachhang;
            // header("Location:index.php?quanly=giohang");
            echo '<script>window.location.href="index.php?quanly=giohang";</script>';
            exit;
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    Đăng ký thành viên
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="hoTen">Họ và tên</label>
                            <input type="text" class="form-control" name="tenkhachhang" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="dienThoai">Điện thoại</label>
                            <input type="text" class="form-control"  name="dienthoai" required>
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Địa chỉ</label>
                            <input type="text" class="form-control"  name="diachi" required>
                        </div>
                        <div class="form-group">
                            <label for="matKhau">Mật khẩu</label>
                            <input type="password" class="form-control" id="matKhau" name="matkhau" required>
                        </div>
                        <button type="submit" name="dangky" class="btn btn-primary">Đăng ký</button>
                        <a class="btn btn-primary" href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>