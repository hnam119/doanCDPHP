<?php
$sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
//get ten danh much
$sql_cate = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<h3><?php echo $row_title['tendanhmuc'] ?></h3>
<div class="row mt-3">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
        <div class="col-lg-3 col-md-3 mb-4">
            <div class="card">
                =<img src="admin/modules/qlsp/uploads/<?php echo $row_pro['hinhanh'] ?>" class="card-img-top"
                    alt="Product Image">
                <div class="card-body text-center">
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>"
                        class="card-title fw-bold" style="text-decoration: none;"><?php echo $row_pro['tensanpham'] ?></a>
                    <p class="card-text fw-bold text-danger">
                        <?php echo number_format($row_pro['giasp'], 0, ',', '.') . 'vnđ' ?>
                        <br> <span class="dot black"></span>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>