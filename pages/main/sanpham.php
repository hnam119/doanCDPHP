<p>Chi tiết sản phẩm</p>
<?php
$sql_chitiet = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc AND sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    ?>
    <div class="wrapper">
        <div class="hinhanh_sanpham">
            <img width="100%" src="admin/modules/qlsp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
        </div>
        <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
            <div class="chitiet_sanpham">
                <h3 style="margin: 0;"><?php echo $row_chitiet['tensanpham'] ?></h3>
                <p>Giá: <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . 'vnđ' ?></p>
                <p>Danh mục: <?php echo $row_chitiet['tendanhmuc'] ?></p>
                <p>Số lượng: <?php echo $row_chitiet['soluong'] ?></p>
                <p><input type="submit" class="btn btn-primary" name="themgiohang" value="Thêm giỏ hàng" style="cursor: pointer;"></p>
            </div>
        </form>
    </div>
    <?php
}
?>