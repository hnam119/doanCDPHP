<p>Thêm sản phẩm</p>
<div class="table-responsive">
    <table class="table table-bordered">
        <form action="modules/qlsp/xuly.php" method="post" enctype="multipart/form-data">
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
                    <td><input type="text" class="form-control" name="tensanpham"></td>
                    <td><input type="text" class="form-control" name="masp"></td>
                    <td><input type="text" class="form-control" name="giasp"></td>
                    <td><input type="text" class="form-control" name="soluong"></td>
                    <td><input type="file" class="form-control" name="hinhanh"></td>
                    <td><textarea name="tomtat" rows="10" style="resize: none"></textarea></td>
                    <td><textarea name="noidung" rows="10" style="resize: none"></textarea></td>
                    <td>
                        <select name="danhmuc">
                            <?php
                            $sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="tinhtrang">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
                    </td>
                </tr>
            </tbody>
        </form>
    </table>
</div>