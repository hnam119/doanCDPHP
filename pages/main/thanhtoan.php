<?php
session_start();
include("../../admin/config/config.php");
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
// Thêm đơn hàng vào bảng tbl_cart
$insert_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status) VALUES ('$id_khachhang', '$code_order', 1)";
$cart_query = mysqli_query($mysqli, $insert_cart);

if ($cart_query) {
    // Thêm từng sản phẩm vào bảng tbl_order_detail
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_detail = "INSERT INTO tbl_cart_details(id_sanpham, code_cart, soluong) VALUES ('$id_sanpham', '$code_order', '$soluong')";
        mysqli_query($mysqli, $insert_order_detail);
    }
}

// Xóa giỏ hàng sau khi đặt hàng thành công
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
?>
