<?php
$sql_pro = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY sanpham.id_sanpham DESC LIMIT 25";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<h3>Sản phẩm mới nhất</h3>
<div class="row mt-3">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
        ?>
        <div class="col-lg-3 col-md-3 mb-4">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>"
            class="card-title fw-bold" style="text-decoration: none;">
                <img src="admin/modules/qlsp/uploads/<?php echo $row['hinhanh'] ?>" class="card-img-top" alt="Product Image"
                    style="height: 250px; width: 90%;">
                <div class="card-body text-center">
                    <?php echo $row['tensanpham'] ?>
                    <p class="card-text fw-bold text-danger"><?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
                        <br> <span class="dot black"></span>
                    </p>
                    <p class="card-text fw-bold text-danger"><?php echo $row['tendanhmuc'] ?></p>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>