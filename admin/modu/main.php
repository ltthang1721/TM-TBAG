<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $temp = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $temp = '';
        $query = '';
    }
    if ($temp == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modu/quanlydanhmucsp/them.php");
        include("modu/quanlydanhmucsp/lietke.php");
    } 
    elseif ($temp == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("modu/quanlydanhmucsp/sua.php");
        include("modu/quanlydanhmucsp/lietke.php");
    } 
    elseif ($temp == 'quanlysanpham' && $query == 'them') {
        include("modu/quanlysanpham/them.php");
    } 
    elseif ($temp == 'quanlysanpham' && $query == 'lietke') {
        include("modu/quanlysanpham/lietke.php");
    }
    elseif ($temp == 'quanlysanpham' && $query == 'sua') {
        include("modu/quanlysanpham/sua.php");
    } 
    elseif ($temp == 'quanlydonhang' && $query == 'lietke') {
        include("modu/quanlydonhang/lietke.php");
    } 
    elseif ($temp == 'donhang' && $query == 'xemdonhang') {
        include("modu/quanlydonhang/xemdonhang.php");
    }
    elseif ($temp == 'quanlydanhmucbaiviet' && $query == 'them') {
        include("modu/quanlydanhmucbaiviet/them.php");
        include("modu/quanlydanhmucbaiviet/lietke.php");
    }
    elseif ($temp == 'quanlydanhmucbaiviet' && $query == 'sua') {
        include("modu/quanlydanhmucbaiviet/sua.php");
        include("modu/quanlydanhmucbaiviet/lietke.php");
    }
    elseif ($temp == 'quanlybaiviet' && $query == 'them') {
        include("modu/quanlybaiviet/them.php");
    }
    elseif ($temp == 'quanlybaiviet' && $query == 'lietke') {
        include("modu/quanlybaiviet/lietke.php");
    }
    elseif ($temp == 'quanlybaiviet' && $query == 'sua') {
        include("modu/quanlybaiviet/sua.php");
    }
     elseif($temp == 'quanlytrangchu' && $query == 'trangchu' ){
        include("modu/dashboard.php");
    } 
     elseif($temp == 'quanlytimkiem' && $query == 'timkiemsp' ){
        include("modu/quanlysanpham/timkiem.php");
    }
    elseif($temp == 'quanlytimkiem' && $query == 'timkiembv' ){
        include("modu/quanlybaiviet/timkiem.php");
    }
    elseif($temp == 'quanlyusers' && $query == 'lietke' ){
        include("modu/quanlyusers/lietke.php");
    }
    elseif($temp == 'doimatkhau' && $query == 'doi' ){
        include("modu/doimatkhau.php");
    }
    else {
        include("modu/dashboard.php");
    }

    ?>




</div>