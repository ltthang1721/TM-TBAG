<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC LIMIT 25";
$query_pro = mysqli_query($mysqli, $sql_pro);

$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);


if (isset($_POST['muangay'])) {
    // session_destroy();  
    $id = $_GET['id'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC ";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'], 'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']));
        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id'] == $id) {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'] + 1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                    $found = true;
                } else {
                    $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
                }
            }
            if ($found == false) {
                $_SESSION['cart'] = array_merge($product, $new_product);
            } else {
                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location:home.php?quanly=giohang');

}

?>
<?php
include("sanpham/menu.php");
include("sanpham/sanpham.php");
?>
<div class="container mt-5">
    <div class="row">
        <?php
        while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid2">
                    <div class="product-image2 zoomin content">
                        <a href="product.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                            <img class="pic-1" src="admin/modu/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">
                            <img class="pic-2" src="admin/modu/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">
                        </a>
                        <form method="POST" action="product.php?quanly=product&id=<?php echo $row_pro['id_sanpham'] ?>">

                            <ul class="social">
                                <li><a style="margin-bottom:40px" href="product.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" data-tip="Xem Chi Tiết"><i class="fa fa-eye" class="btn btn-info btn-lg" data-toggle="modal" data-target="#exampleModal"></i></a></li>
                                <li><a style="margin-bottom:-30px" href="#" data-tip="Thêm Giỏ Hàng" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                            <button name="muangay" class="add-to-cart" > Mua Ngay</button>
                        </form>
                    </div>
                    <div class="product-content">
                        <h3 class="title1"><a href="product.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>"><?php echo $row_pro['tensanpham'] ?></a></h3>
                        <span class="price">$<?php echo number_format($row_pro['giasp']) ?></span>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<hr>
</div>