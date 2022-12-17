<h2 style="color:grey; font-weight:bold; text-align:center; margin:20px; font-weight:bold">Thông Tin Giao Hàng</h2>
<div class="container">
    <div class="arrow-steps clearfix" style="margin-left: 15%; margin-bottom: 20px">
        <div class="step done "> <span><a style="color: #23468c !important" href="home.php?quanly=giohang">Giỏ Hàng</a></span> </div>
        <div class="step current"> <span><a style="color: white !important" href="home.php?quanly=vanchuyen">Vận Chuyển</a></span> </div>
        <div class="step  "> <span><a style="color: #23468c !important" href="home.php?quanly=thongtinthanhtoan">Thanh Toán</a></span> </div>
        <div class="step "> <span> <a style="color: #23468c !important" href="home.php?quanly=hoadon">Hóa Đơn</a></span> </div>
    </div>
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

                        <tr style=" background:#F0F0F0; height:150px!important;border-bottom:1px white solid">
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
        <div class="col-6" style="color:#23468c; font-weight:bold">
            <h4>Thông Tin Vận Chuyển</h4>
            <?php
            if (isset($_POST['themvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $id_dangky = $_SESSION['id_khachhang'];
                $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name, phone, address, note, id_dangky) VALUES ('$name', '$phone', '$address', '$note', '$id_dangky')");
                if ($sql_them_vanchuyen) {
                    echo '<script>alert("Thêm thông tin giao hàng thành công")</script>';
                }
            } elseif (isset($_POST['capnhatvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $id_dangky = $_SESSION['id_khachhang'];
                $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name='$name', phone='$phone', address='$address', note='$note', id_dangky='$id_dangky' WHERE id_dangky = '$id_dangky' ");
                if ($sql_update_vanchuyen) {
                    echo '<script>alert("Cập nhật thông tin giao hàng thành công")</script>';
                }
            }
            ?>
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
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Họ & Tên</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Họ tên...">
                </div>
                <div class="form-group">
                    <label for="email">Số Điện Thoại</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="Số điện thoại...">
                </div>
                <div class="form-group">
                    <label for="email">Địa Chỉ</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="Địa chỉ nhận hàng...">
                </div>
                <div class="form-group">
                    <label for="email">Ghi Chú (nếu có)</label>
                    <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder="Ghi chú...">
                </div>
                <?php
                if ($name == '' && $phone == '') {
                ?>
                    <button type="submit" name="themvanchuyen" class="btn" style="background:#23468c ; color:#F0F0F0; font-weight:bold">Thêm Thông Tin</button>
                <?php
                } elseif ($name != '' && $phone != '') {
                ?>
                    <button type="submit" name="capnhatvanchuyen" class="btn" style="background:#23468c ; color:#F0F0F0; font-weight:bold">Cập Nhật</button>
                <?php
                }
                ?>
            </form>

            <table style="height: 150px; width: 500px; margin-top: 50px; background:#F0F0F0;" class="mb-5">
                <tr>
                    <td colspan="8">
                        <p style="color:#23468c ; float:left; padding-left: 20px"><b><i class="fa-solid fa-money-bill"></i> TỔNG TIỀN: <?php echo number_format($tongtien) . '$' ?> <b> </p>
                        <p style="color:#23468c ; float:right; padding-right:20px"><i class="fa-solid fa-money-bill"></i> TỔNG SẢN PHẨM: <?php echo $dem ?></p>
                        <div style="clear: both ;"></div>
                        <a href="home.php?quanly=thongtinthanhtoan" style="color:white"><p style="color:white;  border:#23468c 1px solid; width: 80%; margin-left:50px; height:40px; padding:7px; background:#23468c">Thanh Toán</p></a>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>