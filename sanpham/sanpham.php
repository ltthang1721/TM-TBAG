<?php
// session_start();
// include('../admin/config/config.php');
//them so luong
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            $_SESSION['cart'] = $product;
        } else {
            $tangsoluong = $cart_item['soluong'] + 1;
            if ($cart_item['soluong'] < 10) {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../home.php?quanly=giohang');
}
//tru so luong
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            $_SESSION['cart'] = $product;
        } else {
            $giamsoluong = $cart_item['soluong'] - 1;
            if ($cart_item['soluong'] > 1) {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $giamsoluong, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:../home.php?quanly=giohang');
}
//xoa sanpham
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    // session_destroy();  
    $id = $_GET['xoa'];
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
        }
        $_SESSION['cart'] = $product;
        header('Location:../home.php?quanly=giohang');
    }
}
//xoa tat ca
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']);
    header('Location:../home.php?quanly=giohang');
}

//them sanpham vao gio hang

if (isset($_POST['muangay'])) {
    // session_destroy();  
    $id = $_GET['id'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . $id . "' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']));
        //kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //neu sp kh trung
                if ($cart_item['id'] == $id) {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'] + 1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                    $found = true;
                } else {
                    //neu sp trung
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                }
            }
            if ($found == false) {
                //lien ket new_product voi product
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:home.php?quanly=giohang');
    // print_r($_SESSION['cart']);


}


?>
<style>
    .limit {
        text-align: justify;
        display: block;
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-top: 20px
    }
</style>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1 ";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <a href="home.php?quanly=index">
        <div class="more">
            << Xem Sản Phẩm Khác</div>
    </a>
    <p class="chitietsp">Chi Tiết Sản Phẩm</p>
    <div id="container">

        <div class="product-details">
            <h1><?php echo $row_chitiet['tensanpham'] ?></h1>
            <div class="limit">
                <?php echo $row_chitiet['noidung'] ?>
            </div>
            <form method="POST" action="product.php?quanly=sanpham&id=<?php echo $row_chitiet['id_sanpham'] ?>">
                <div class="control">
                    <div class="price1"><?php echo number_format($row_chitiet['giasp']) ?>$</div>

                    <button class="btn1">
                        <input type="submit" name="muangay" value="Mua Ngay" class="buy">

                        <input type="submit" class="add" value="Thêm Giỏ Hàng" name="themgiohang">

                    </button>
                </div>
            </form>

        </div>
        <div class="product-image">
            <img src="admin/modu/quanlysanpham/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
            <div class="info">
                <h2>Chi Tiết Sản Phẩm</h2>
                <ul>
                    <li><strong>Tên Sản Phẩm: </strong><?php echo $row_chitiet['tensanpham'] ?></li>
                    <li><strong>Mã Sản Phẩm: </strong><?php echo $row_chitiet['masp'] ?></li>
                    <li><strong>Giá Sản Phẩm: </strong>$<?php echo number_format($row_chitiet['giasp']) ?></li>
                    <li><strong>Số Lượng: </strong><?php echo $row_chitiet['soluong'] ?></li>
                    <li><strong>Danh Mục Sản Phẩm: </strong><?php echo $row_chitiet['tendanhmuc'] ?></li>
                    <li class="limit" style="margin-right:5px ; margin-top:-5px"><strong>Mô Tả: </strong><?php echo $row_chitiet['tomtat'] ?></li>
                </ul>
            </div>
        </div>

    </div>

<?php
}
if (isset($_POST['themgiohang'])) {
    // session_destroy();  
    $idd = $_GET['id'];
    $soluong = 1;
    $sql_add = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . $idd . "' LIMIT 1 ";
    $query_add = mysqli_query($mysqli, $sql_add);
    $row_add = mysqli_fetch_array($query_add);
    if ($row_add) {
        $new_product = array(array('tensanpham' => $row_add['tensanpham'], 'id' => $idd, 'soluong' => $soluong, 'giasp' => $row_add['giasp'], 'hinhanh' => $row_add['hinhanh'], 'masp' => $row_add['masp']));
        //kiem tra session gio hang ton tai
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                //neu sp kh trung
                if ($cart_item['id'] == $idd) {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'] + 1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                    $found = true;
                } else {
                    //neu sp trung
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                }
            }

            if ($found == false) {
                //lien ket new_product voi product
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    echo '<br>';
    echo '<div style="margin-top: -70px; font-size: 18px ">';
    echo '<a style="padding-left: 450px; color:grey">Đã Thêm Sản Phẩm </a>';
    echo $row_add['tensanpham'];
    echo '<a style="color:grey"> Vào Giỏ Hàng </a>';
    echo '</div>';
    echo '<br>';
    echo '<br>';
}
?>