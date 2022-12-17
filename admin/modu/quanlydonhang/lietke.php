<?php
$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
$num = mysqli_num_rows($query_lietke_dh);
?>
<div style=" width: 1080px; color:#23468c !important; margin-bottom: 50px; font-family: muli;">
    <p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Danh Sách Đơn Hàng</p>
    <table border="1" style="width:100%" style="border-collapse:collapse; ">
        <tr style="height: 60px; background: #23468c; color: white ; font-size: 16px">
            <th style="text-align:center; width: 30px">ID</th>
            <th style="text-align:center; width: 60px">Mã Đơn</th>
            <th style="text-align:center; width: 150px">Tên Khách Hàng</th>
            <th style="text-align:center; width: 90px">Địa Chỉ</th>
            <th style="text-align:center; width: 170px">Email</th>
            <th style="text-align:center; width: 110px">Số Điện Thoại</th>
            <th style="text-align:center; width: 110px">Trạng Thái</th>
            <th style="text-align:center; width: 110px">Ngày Đặt</th>
            <th style="text-align:center; width: 120px">Quản Lý</th>
        </tr>
        <?php
        $i = 0;
        $dem = 0;
        while ($row = mysqli_fetch_array($query_lietke_dh)) {
            $i++;
        ?>
            <tr style="border-bottom:1px #23468c solid; color:black">
                <td style="text-align:center;"><?php echo $i ?></td>
                <td style="padding:15px 20px; "><?php echo $row['code_cart'] ?></td>
                <td style="padding:15px 30px; "><?php echo $row['tenkhachhang'] ?></td>
                <td style="text-align:center"><?php echo $row['diachi'] ?></td>
                <td style="padding:5px ; "><?php echo $row['email'] ?></td>
                <td style="text-align:center"><?php echo $row['dienthoai'] ?></td>
                <td style="text-align:center;font-weight:bold ">
                    <?php
                    if ($row['cart_status'] == 1) {
                        echo '<a style="color:#23468c !important" href="modu/quanlydonhang/xuly.php?cart_status=0&code=' . $row['code_cart'] . '"> <span style="font-size:14px ;" class="material-icons-outlined" >square</span> Xác Nhận</a>';
                        $dem++;
                    } else {
                        echo '<span style="font-size:14px ;" class="material-icons-outlined" >check</span> Đã Xác Nhận';
                    }
                    ?>
                </td>
                <td style="text-align:center"><?php echo $row['cart_date'] ?></td>
                <td style="text-align:center;">
                    <a style="color:#23468c !important; font-weight:bold" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>"><span style="font-size:14px ;" class="material-icons-outlined">visibility </span> Xem Đơn Hàng</a>
                </td>
            </tr>
        <?php
        }
        ?>
        <div style="font-size:18px ; padding:5px"> Tổng đơn hàng chưa xác nhận: <span style="font-weight:bold ;"><?php echo $dem ?>/<?php echo $num ?> </span> đơn. </div>

    </table>
</div>