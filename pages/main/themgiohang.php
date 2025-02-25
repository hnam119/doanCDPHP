<?php
    session_start();
    include('../../admin/config/config.php');
    //Thêm số lượng
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'], // Tăng số lượng thay vì gán lại 1
                    'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'],
                );
                $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['soluong']+1;
                if($cart_item['soluong']<=9){
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $tangsoluong, // Tăng số lượng thay vì gán lại 1
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                    );
                }else{
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'], // Tăng số lượng thay vì gán lại 1
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                    );
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //Trừ số lượng
    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $product[] = array(
                    'tensanpham' => $cart_item['tensanpham'],
                    'id' => $cart_item['id'],
                    'soluong' => $cart_item['soluong'], // Tăng số lượng thay vì gán lại 1
                    'giasp' => $cart_item['giasp'],
                    'hinhanh' => $cart_item['hinhanh'],
                );
                $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['soluong']-1;
                if($cart_item['soluong']>1){
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $tangsoluong, // Tăng số lượng thay vì gán lại 1
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                    );
                }else{
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'], // Tăng số lượng thay vì gán lại 1
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                    );
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //Xóa sản phẩm
    if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
                if($cart_item['id']!=$id){
                    $product[] = array(
                        'tensanpham' => $cart_item['tensanpham'],
                        'id' => $cart_item['id'],
                        'soluong' => $cart_item['soluong'], // Tăng số lượng thay vì gán lại 1
                        'giasp' => $cart_item['giasp'],
                        'hinhanh' => $cart_item['hinhanh'],
                    );
                }
                $_SESSION['cart'] = $product;
                header('Location:../../index.php?quanly=giohang'); 
            }
    }

    // Xóa tất cả sản phẩm trong giỏ hàng
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }

    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id = $_GET['idsanpham'];
        $soluong=1;
        $sql = "SELECT * FROM sanpham WHERE id_sanpham='".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product = array(
                array(
                    'tensanpham' => $row['tensanpham'],
                    'id' => $id,
                    'soluong' => $soluong,
                    'giasp' => $row['giasp'], // Đảm bảo cột này có dữ liệu
                    'hinhanh' => $row['hinhanh'],
                )
            );            
            //Kiểm tra session giỏ hàng tồn tại
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id']==$id){
                        $product[] = array(
                            'tensanpham' => $cart_item['tensanpham'],
                            'id' => $cart_item['id'],
                            'soluong' => $soluong +1, // Tăng số lượng thay vì gán lại 1
                            'giasp' => $cart_item['giasp'],
                            'hinhanh' => $cart_item['hinhanh'],
                        );                        
                        $found = true;
                    }else{
                        $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
                    }
                }
                if($found==false){
                    $_SESSION['cart'] = array_merge($product,$new_product);
                }else{
                    $_SESSION['cart'] = $product;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>