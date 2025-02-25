<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    //them
    $sql_them = "INSERT INTO danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../index.php?action=qldanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
    //sua
    $sql_sua = "UPDATE danhmuc SET tendanhmuc='".$tenloaisp."', thutu='".$thutu."' WHERE id_danhmuc='".$_GET['iddanhmuc']."'";
    mysqli_query($mysqli,$sql_sua);
    header('location:../../index.php?action=qldanhmucsanpham&query=them');
}else{
    $id=$_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('location:../../index.php?action=qldanhmucsanpham&query=them');
}
?>