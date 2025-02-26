<?php

$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>
<div class="menu">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Trang chủ</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=gioithieu">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=lienhe"><span class="fas fa-phone"></span> Liên
                            hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><span class="fas fa-bars"></span> Danh mục sản
                            phẩm</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <?php
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                ?>
                                <a class="dropdown-item"
                                    href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']; ?>">
                                    <?php echo $row_danhmuc['tendanhmuc']; ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                </ul>
                <p>
                    <form action="index.php?quanly=timkiem" method="POST">
                        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </p>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['dangky'])) {
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" style="width: 120px;" href="index.php?dangxuat=1">
                                Đăng xuất</a>
                        </li>
                        <?php
                        } else {
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" style="width: 120px;" href="index.php?quanly=dangky">
                                Đăng ký</a>
                        </li>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="width: 120px;" href="index.php?quanly=giohang">
                            <span class="fas fa-cart-plus"></span> Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>
<script>
    document.querySelector('.navbar-nav a[href="index.php?quanly=lienhe"]').addEventListener('click', function (e) {
        e.preventDefault();
        var footer = document.querySelector('footer');
        var top = footer.offsetTop;
        window.scrollTo({ top: top, behavior: 'smooth' });
    });
</script>