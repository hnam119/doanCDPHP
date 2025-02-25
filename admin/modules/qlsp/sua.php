<?php
$sql_sua_sp = "SELECT * FROM sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p>Sửa sản phẩm</p>
<div class="table-responsive">
    <table class="table table-bordered">
        <?php
        while ($row=mysqli_fetch_array($query_sua_sp)) {
        ?>
        <form action="modules/qlsp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" method="post" enctype="multipart/form-data">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" value="<?php echo $row['tensanpham'] ?>" class="form-control" name="tensanpham"></td>
                    <td><input type="text" value="<?php echo $row['masp'] ?>" class="form-control" name="masp"></td>
                    <td><input type="text" value="<?php echo $row['giasp'] ?>" class="form-control" name="giasp"></td>
                    <td><input type="text" value="<?php echo $row['soluong'] ?>" class="form-control" name="soluong"></td>
                    <td>
                        <input type="file" class="form-control" name="hinhanh">
                        <img src="modules/qlsp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
                     </td>
                    <td><textarea name="tomtat" rows="10" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
                    <td><textarea name="noidung" rows="10" style="resize: none"><?php echo $row['noidung'] ?></textarea></td>
                    <td>
                        <select name="danhmuc">
                            <?php
                            $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
                            ?>
                            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                                }else{
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="tinhtrang">
                            <?php
                            if($row['tinhtrang']==1){
                            ?>
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Ẩn</option>
                            <?php
                            }else{
                            ?>
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Ẩn</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary" name="suasanpham">Sửa sản phẩm</button>
                    </td>
                </tr>
            </tbody>
        </form>
        <?php
        }
        ?>
    </table>
</div>