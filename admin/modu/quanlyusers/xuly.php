<?php
include('../../config/config.php');
    $tenkhachhang = $_POST['tenkhachhang'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    $dienthoai = $_POST['dienthoai'];



        $id = $_GET['idkhachhang'];
        $sql_xoa = "DELETE FROM tbl_dangky WHERE id_dangky = '".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location: ../../index.php?action=quanlyusers&query=lietke');
