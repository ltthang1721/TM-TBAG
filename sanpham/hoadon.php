<h2 style="color:grey; font-weight:bold; text-align:center; margin:20px">Hóa Đơn</h2>
<div class="container">
    <div class="arrow-steps clearfix" style="margin-left: 15%; margin-bottom: 20px">
        <div class="step done "> <span><a style="color: #23468c !important" href="home.php?quanly=giohang">Giỏ Hàng</a></span> </div>
        <div class="step done "> <span><a style="color: #23468c !important" href="home.php?quanly=vanchuyen">Vận Chuyển</a></span> </div>
        <div class="step done"> <span><a style="color: #23468c !important" href="home.php?quanly=thongtinthanhtoan">Thanh Toán</a></span> </div>
        <div class="step current"> <span> <a style="color: white !important" href="home.php?quanly=hoadon">Hóa Đơn</a></span> </div>
    </div>


    <form action="sanpham/xulythanhtoan.php" method="POST">
        <div class="row">
            <?php
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
            $count = mysqli_num_rows($sql_get_vanchuyen);
            $id_khachhamg = $_SESSION['id_khachhang'];
            $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhamg' ORDER BY tbl_cart.id_cart DESC";
            $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
            $row = mysqli_fetch_array($query_lietke_dh);
            if ($count > 0) {
                $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                $name = $row_get_vanchuyen['name'];
                $phone = $row_get_vanchuyen['phone'];
                $address = $row_get_vanchuyen['address'];
                $note = $row_get_vanchuyen['note'];
            } else {
                $name = '';
                $phone = '';
                $address = '';
                $note = '';
            }
            ?>
            <div class="col-md-5 mb-5" style="background:#f0f0f0; border:#23468c 5px inset; color:#23468c; height: auto;margin-left:28% ">
                <h3 style="text-align:center; margin-top: 20px">Hóa Đơn</h3>
                <ul style="list-style-type: none; line-height:1.7">
                    <li>Họ và tên người nhận: <b><?php echo $name ?></b></li>
                    <li>Số điện thoại: <b><?php echo $phone ?></b></li>
                    <li>Địa chỉ nhận hàng: <b><?php echo $address ?></b></li>
                    <li>Ghi chú: <b><?php echo $note ?></b></li>
                    <?php
                    $sql_ngay = mysqli_query($mysqli, "SELECT * FROM tbl_cart ORDER BY id_cart DESC LIMIT 1");
                    $count_ngay = mysqli_num_rows($sql_ngay);

                    if ($count_ngay > 0) {
                        $row_ngay = mysqli_fetch_array($sql_ngay);
                        $cart_date = $row_ngay['cart_date'];
                        $code_cart = $row_ngay['code_cart'];
                    } else {
                        $cart_date = '';
                    }
                    ?>
                    <li>Thời gian đặt hàng: <b><?php echo $cart_date ?></b> </li>
                    <li>Mã đơn hàng: <b><?php echo $code_cart ?> <b></li>
                    <a style="color:#23468c!important" href="home.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>"><i class="fa-solid fa-circle-info"></i> Xem Chi Tiết Đơn Hàng</a>

                </ul>

            </div>
        </div>
    </form>
</div>