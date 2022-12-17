<?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details ASC";
// $sql_code=$_GET['code_'];
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<style>
    .add {
        height: 40px;
        background: #23468c;
        border: 1px solid #23468c;
        color: white;
        font-family: Muli;
        width: 180px;
        font-weight: bold;

    }

    .add:hover {
        background: white;
        color: #23468c !important; 
        border: #23468c 1px solid;
    }
    .xem{
        border:none ; background:repeat;
        color: white;
    }
    .xem:hover{
        color: #23468c !important; 
    }
</style>
<div style=" width: 1000px; color:#23468c !important; margin-bottom: 50px"> 
<p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Đơn Hàng <b><?php echo $code ?></b></p>
<div class="add" style=" padding-top: 10px; float:left; margin: 10px 0px">
    <a href="index.php?action=quanlydonhang&query=lietke">
        <input class="xem" type="submit" name="themdanhmuc" value="<< Xem Đơn Hàng Khác">
    </a>
</div>
<table style="width:100%" border="1" style="border-collapse:collapse;">
    <tr style="height: 60px; background: #23468c; color: white ; font-size: 16px">
        <th style="text-align:center; width: 40px">ID</th>
        <th style="text-align:center; width: 120px">Mã Đơn Hàng</th>
        <th style="text-align:center; width: 130px">Tên Sản Phẩm</th>
        <th style="text-align:center; width: 120px">Số Lượng</th>
        <th style="text-align:center; width: 120px">Đơn Giá</th>
        <th style="text-align:center; width: 120px">Thành Tiền</th>
    </tr>
    <?php
    $i = 0;
    $tongtien=0;
    $dt=0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        $thanhtien = $row['giasp']*$row['soluongmua']; 
        $tongtien += $thanhtien;

    ?>
        <tr>
            <td style=" padding:10px; text-align:center;"> <?php echo $i ?></td>
            <td style="text-align:center;"><?php echo $row['code_cart'] ?></td>
            <td style="text-align:center;"><?php echo $row['tensanpham'] ?></td>
            <td style="text-align:center;"><?php echo $row['soluongmua'] ?></td>
            <td style="text-align:center;"><?php echo number_format($row['giasp']) ?>$</td>
            <td style="text-align:center;"><?php echo number_format( $thanhtien) ?>$</td>    
        </tr>
    <?php
    }
    ?>
    <tr>
    <td colspan="6">
        <p style="float: right; padding: 0 30px; padding-top:15px; font-weight:bold; font-size: 20px">Tổng Tiền: <?php echo number_format($tongtien) ?>$</p>
    </td>
    </tr>
</table>
</div>