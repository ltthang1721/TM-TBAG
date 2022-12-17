<main>
        <?php
        if(isset($_GET['quanly'])){
            $temp = $_GET['quanly'];
        } else{
            $temp = '';
        }
        if($temp == 'product'){
            include("sanpham/danhmuc.php");
        }elseif($temp == 'sanpham'){
            include("sanpham/sanpham.php");
        }elseif($temp == 'giohang'){
            include("sanpham/giohang.php");
        } elseif($temp == 'index'){
            include("sanpham/index.php");
        }
        ?>

</main>