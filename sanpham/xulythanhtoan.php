<?php
session_start();
// include("../admin/config/config.php");
require('../admin/config/config.php');
require('../carbon/autoload.php');
require('../mail/sendmail.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh');
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0, 9999);
$id_dangky = $_SESSION['id_khachhang'];
$sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
$id_shipping = $row_get_vanchuyen['id_shipping'];

$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_shipping) VAlUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $id_shipping . "')";
$cart_query = mysqli_query($mysqli, $insert_cart);
if ($cart_query) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VAlUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
        mysqli_query($mysqli, $insert_order_details);
    }
    $tieude = "ĐẶT THÀNH CÔNG TRÊN WEBSITE WWW.RÓE.COM!!!";
    $noidung = "<h3  style='color: #23468c'> CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT HÀNG BÊN CỬA HÀNG CHÚNG TÔI, MÃ ĐƠN HÀNG CỦA BẠN LÀ: " . $code_order . "</h3>";
    $noidung .= "<h3 style='color: #23468c'>Đơn hàng của quý khách bao gồm: </h3>";

   $noidung.=" <table style='background:#23468c; color:white' > 
        <tr> 
            <td style='width:20px;font-weight:bold;height:40px'>ID</td>
            <td style='width:150px;font-weight:bold;height:40px'>Tên Sản Phẩm </td>
            <td style='width:100px;font-weight:bold;height:40px'>Mã Sản Phẩm </td>
            <td style='width:100px;font-weight:bold;height:40px'>Đơn Giá </td>
            <td style='width:100px;font-weight:bold;height:40px'>Số Lượng </td>
            <td style='width:100px;font-weight:bold;height:40px'>Thành Tiền </td>

        </tr>";
        $thanhtien=0;
        $tongtien=0;
    foreach ($_SESSION['cart'] as $key => $val) {
        $i++;
        $thanhtien = $val['soluong'] * $val['giasp'];
        $tongtien += $thanhtien;
        $noidung .= "<tr style='margin:10px; list-style:none; width:500px;'>
                            <td style='font-weight:bold; width:20px'>" . $i . "</td>
                            <td > " . $val['tensanpham'] . "</td>
                            <td >  " . $val['masp'] . " </td>
                            <td > " . number_format($val['giasp']) . "$ </td>
                            <td >  " . $val['soluong'] . " </td>
                            <td >  " . $thanhtien. "$ </td>
                            </tr> ";
    }
    $noidung.="<tr><td style='font-weight:bold;width:100px;height:50px;'>Tổng Tiền: " . $tongtien. "$</td></tr>";
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);
   $noidung .="
   </table>";
}
unset($_SESSION['cart']);
header('Location: ../home.php?quanly=hoadon');
?>
