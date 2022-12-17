<h2 style="color:grey; font-weight:bold; text-align:center; margin:20px">Thông Tin Thanh Toán</h2>
<div class="container">
    <div class="arrow-steps clearfix" style="margin-left: 15%; margin-bottom: 20px">
        <div class="step done"> <span> <a style="color: #23468c !important" href="home.php?quanly=giohang">Giỏ Hàng</a></span> </div>
        <div class="step done"> <span><a style="color: #23468c !important" href="home.php?quanly=vanchuyen">Vận Chuyển</a></span> </div>
        <div class="step current"> <span><a style="color: white !important" href="home.php?quanly=thongtinthanhtoan">Thanh Toán</a></span> </div>
        <div class="step"> <span> <a style="color: #23468c !important" href="home.php?quanly=hoadon">Hóa Đơn</a></span> </div>
    </div>
    <style>
        .flex-rw {
            width: 1400px;
            margin-left: -120px;
        }

        .footer-social-section {
            margin-left: -10px;
        }

        .footer-bottom-section {
            width: 100%;
            margin-left: 0px;
        }
    </style>
    <form action="sanpham/xulythanhtoan.php" method="POST">
        <div class="row">
            <div class="col-6">
                <table style="text-align:center;border-collapse: collapse; color:#23468c " border="0" class="mb-5">
                    <?php
                    if (isset($_SESSION['cart'])) {
                    ?>
                        <tr style="height:50px ;">
                            <th style="width:50px">ID
                            </th>
                            <th style="width:200px; ">Sản Phẩm
                            </th>
                            <th style="width:200px">
                            </th>
                            <th style="width:200px">Thành Tiền
                            </th>
                        </tr>
                        <?php
                    }
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        $tongtien = 0;
                        $dem = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                            $tongtien += $thanhtien;
                            if ($cart_item['masp']) {
                                $dem++;
                            }
                            $i++;
                        ?>
                            <tr style=" background:#F0F0F0; height:150px!important">
                                <td><?php echo $i; ?></td>
                                <td style="padding:20px ; "><img src="admin/modu/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']; ?> " width="150px"></td>
                                <td style="text-align:left">
                                    <b><?php echo $cart_item['tensanpham']; ?></b> <br>
                                    Mã SP: <b><?php echo $cart_item['masp']; ?></b> <br>
                                    Đơn Giá: <b><?php echo number_format($cart_item['giasp']) . '$'; ?></b> <br>
                                    Số Lượng: <b><?php echo $cart_item['soluong']; ?></b>
                                </td>
                                <td><b><?php echo number_format($thanhtien) . '$'; ?></b></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
            <?php
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
            $count = mysqli_num_rows($sql_get_vanchuyen);
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
            <div class="col-md-6 mb-5" style="color:#23468c ; background:#f0f0f0; height: 380px; margin-top: 50px">
                <h4 style="margin-top: 25px; margin-bottom: 30px; text-align:center">Xác Nhận Thông Tin Giao Hàng</h4>
                <ul style="list-style-type: none; line-height:2;">
                    <li>Họ và tên: <b><?php echo $name ?></b></li>
                    <li>Số điện thoại: <b><?php echo $phone ?></b></li>
                    <li>Địa chỉ: <b><?php echo $address ?></b></li>
                    <li>Ghi chú: <b><?php echo $note ?></b></li>
                    <li><b>*Chú ý</b>: Cửa hàng chúng tôi không hỗ trợ hủy đơn, khách hàng vui lòng suy nghĩ kĩ trước khi click "Thanh Toán Ngay". Xin cảm ơn!</li>
                </ul>
                <input style="margin-left:35%; margin-top:10px; color:#F0F0F0; background:#23468c" type="submit" value="Thanh Toán Ngay" name="thanhtoanngayy" class="btn">

            </div>

    </form>
</div>