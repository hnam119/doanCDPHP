<?php
$sql_sua_dmsp = "SELECT * FROM danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_dmsp = mysqli_query($mysqli, $sql_sua_dmsp);
?>
<p>Sửa danh mục</p>
<div class="table-responsive">
    <table class="table table-bordered">
        <form action="modules/qldanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" method="post">
            <?php
            while ($dong = mysqli_fetch_array($query_sua_dmsp)) {
            ?>
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Thứ tự</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" class="form-control" name="tendanhmuc"></td>
                    <td><input type="number" value="<?php echo $dong['thutu'] ?>" class="form-control" name="thutu"></td>
                    <td>
                        <button type="submit" class="btn btn-primary" name="suadanhmuc">Sửa danh mục sản phẩm</button>
                    </td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </form>
    </table>
</div>