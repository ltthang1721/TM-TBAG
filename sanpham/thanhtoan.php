<?php
    // session_start();
    // include("../admin/config/config.php");
    require('../admin/config/config.php');
    require('../carbon/autoload.php');
    require('../mail/sendmail.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order=rand(0,9999);
    $insert_cart="INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) VAlUE('".$id_khachhang."','".$code_order."',1,'".$now."')";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VAlUE('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
        }

        $tieude = "Đặt hàng trên website 7larose.com thành công!!!";
        $noidung = "<div><p> Cảm ơn quý khách đã đặt hàng với mã đơn hàng là: ".$code_order."</p></div>";
        $maildathang = $_SESSION['email'] ;
        $mail = new Mailer();
        $mail->dathangmail($tieude,$noidung,$maildathang);
        
    }   unset($_SESSION['cart']);
        // header('Location: home.php?quanly=hoadon');
   
