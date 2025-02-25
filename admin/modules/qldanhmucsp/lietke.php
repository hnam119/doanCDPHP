<?php
$sql_lietke_dmsp = "SELECT * FROM danhmuc ORDER BY thutu DESC";
$query_lietke_dmsp = mysqli_query($mysqli, $sql_lietke_dmsp);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Thao tác</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dmsp)) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td>
            <a href="?action=qldanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>" class="btn btn-primary">Sửa</a> |
            <a href="modules/qldanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>" class="btn btn-danger">Xóa</a>
        </td>
        </td>
    </tr>
    <?php
    }
    ?>
</table>