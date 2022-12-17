<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == "" || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 8) - 8;
}

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

if (isset($_POST['themgiohang'])) {
    // session_destroy();  
    $idd = $_GET['idd'];
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
    echo '<script>alert("Đã Thêm Sản Phẩm Vào Giỏ Hàng!");</script>';

}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham ASC LIMIT $begin,8";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<body style="background:url(./ig/bg3.png) ;">
    <div style="background-color: rgb(255, 255, 255);">
        <div class="header_product" style="padding-top: 50px; padding-left: 40px; margin-bottom:50px;background-image: url(./ig/bo20.jpg);">
            <div style="border: 1px solid white; width: 250px; background:#f8f4f4c7; padding:20px; font-size:18px;">
                <b>TẤT CẢ SẢN PHẨM</b>
                <a href="home.php"><br>Trang Chủ</a><b>> Sản Phẩm</b>
            </div>
        </div>
        <div class="container ">

            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($query_pro)) {
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid2">
                            <div class="product-image2 zoomin content ">
                                <a href="product.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                                    <img class="pic-1" src="admin/modu/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>">
                                    <img class="pic-2" src="admin/modu/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>">
                                </a>

                                <ul class="social">
                                    <li><a style="margin-bottom:40px; " href="product.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" data-tip="Xem Chi Tiết"><i class="fa fa-eye" class="btn btn-info btn-lg"></i></a></li>
                                    <form method="POST" action="home.php?quanly=index&idd=<?php echo $row['id_sanpham'] ?>">
                                    <li><button style="margin-bottom:-30px" data-tip="Thêm Giỏ Hàng" name="themgiohang" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button></li>
                                    </form>
                                </ul>
                                <form method="POST" action="home.php?quanly=index&id=<?php echo $row['id_sanpham'] ?>">

                                <button name="muangay" class="add-to-cart" style="margin-left: -20px;" > Mua Ngay</button>
                                </form>
                            </div>
                            <div class="product-content">
                                <h3 class="title1"><a href="product.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>"><?php echo $row['tensanpham'] ?></a></h3>
                                <span class="price">$<?php echo number_format($row['giasp']) ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>



            <div style="clear:both ;"></div>
            <style type="text/css">
                ul.list_trang {
                    padding: 0;
                    margin: 0;
                    list-style: none;
                    padding-right: 20px;
                }

                ul.list_trang li {
                    float: left;

                    padding: 5px 10px;
                    margin: 5px;
                    background: #7d7d7d;
                    display: block;
                }

                ul.list_trang li a {
                    color: white !important;
                    text-align: center;
                    text-decoration: none;

                }
            </style>
            <?php
            $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
            $row_count = mysqli_num_rows($sql_trang);
            $trang = ceil($row_count / 8);
            ?>
            <ul class="list_trang">
                <?php
                for ($i = 1; $i <= $trang; $i++) {
                ?>
                    <li <?php if ($i == $page) {
                            echo 'style="background: #23468c; font-weight:bold;"';
                        } else {
                            '';
                        } ?>><a href="home.php?quanly=index&trang=<?php echo $i ?>" style="color:#23468c"><?php echo $i ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <hr>
    </div>
    
</body>