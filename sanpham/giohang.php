<h2 style="color:grey; font-weight:bold; text-align:center; margin:20px">Giỏ Hàng</h2>
<div class="container">
  <div class="arrow-steps clearfix" style="margin-left: 15%; margin-bottom: 20px">
    <div class="step current"> <span><a style="color: white !important" href="home.php?quanly=giohang">Giỏ Hàng</a></span> </div>
    <div class="step"> <span> <a style="color: #23468c !important" href="">Vận Chuyển</a></span> </div>
    <div class="step"> <span> <a style="color: #23468c !important" href="">Thanh Toán</a></span> </div>
    <div class="step"> <span> <a style="color: #23468c !important" href="">Hóa Đơn</a></span> </div>
  </div>
  <style>
    .add {
      height: 45px;
      background: #23468c;
      border: 1px solid #23468c;
      color: white !important;
      font-family: Muli;
      width: 150px;
      font-weight: bold;

    }

    .add:hover {
      background: white;
      color: #23468c !important;
      border: #23468c 1px solid;
    }

    input[type="submit"] {
      color: white;
      font-weight: bold;
    }

    input[type="submit"]:hover {
      color: #23468c;
      font-weight: bold;
    }
  </style>
  <div class="row">
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
          <th style="width:150px">Xóa
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

          <tr style=" background:#F0F0F0; height:150px!important; border-bottom:1px white solid">
            <td><?php echo $i; ?></td>
            <td style="padding:20px ; "><img src="admin/modu/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']; ?> " width="150px"></td>
            <td style="text-align:left">
              <b><?php echo $cart_item['tensanpham']; ?></b> <br>
              Mã SP: <b><?php echo $cart_item['masp']; ?></b> <br>
              Đơn Giá: <b><?php echo number_format($cart_item['giasp']) . '$'; ?></b> <br>
              <a style="color:#23468c" href="sanpham/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-minus"></i></a>
              <?php echo $cart_item['soluong']; ?>
              <a style="color:#23468c" href="sanpham/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-sharp fa-solid fa-circle-plus"></i></a>
            </td>
            <td><b><?php echo number_format($thanhtien) . '$'; ?></b></td>
            <td><a style="color:#23468c" href="sanpham/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-x"></i></a></td>
          </tr>
        <?php
        }
        ?>
    </table>
    <table style="height: 230px; width: 250px; margin-top: 50px; margin-left: 60px; background:#F0F0F0;" class="mb-5">
      <tr>
        <td colspan="8">
          <p style="color:#23468c ; float:left; padding-left: 20px"><b><i class="fa-solid fa-money-bill"></i> TỔNG TIỀN: <?php echo number_format($tongtien) . '$' ?> <b> </p><br>
          <p style="color:#23468c ; float:left; padding-left: 20px"><i class="fa-solid fa-money-bill"></i> TỔNG SẢN PHẨM: <?php echo $dem ?></p>
          <br>
          <p style="margin-left:-100px; margin-top:50px; float:left; margin-bottom: -20px"><a style="color:#23468c!important ;" href="sanpham/themgiohang.php?xoatatca=1"><i class="fa-solid fa-trash" style="font-size:25px ;"></i></a></p>
          <div style="clear: both ;"></div>
          <?php
          if (isset($_SESSION['dangky'])) {
          ?>
            <!-- <hr> -->
            <p style="color:#23468c; margin-top:30px; border:#23468c 1px solid; width: 80%; margin-left:25px; height:40px; padding:7px; background:#23468c"><a href="home.php?quanly=vanchuyen" style="color:white">Mua Hàng</a></p>
          <?php
          } else {
          ?>
            <p style="color:#23468c; margin-top:30px; border:#23468c 1px solid; width: 80%; margin-left:25px; height:40px; padding:7px; background:#23468c"><a href="home.php?quanly=dangky" style="color:white">Đăng Ký Mua Hàng</a></p>

          <?php
          }
          ?>
        </td>
      </tr>
    </table>
  </div>
  <div class="add" style=" padding-top: 10px; float:left; margin-top: -20px; margin-left:-18px; margin-bottom:10px">
    <a href="home.php?quanly=index">
      <input style="border:none ; background:repeat" type="submit" value="Chọn Thêm Mẫu">
    </a>
  </div>
<?php
      } else {
?>

  <p style="color:#23468c ;margin-left:45% ">Giỏ Hàng Trống</p>
  <div class="add" style=" padding-top: 10px; float:left; margin-top: 70px; margin-left:-130px; margin-bottom:150px">
    <a href="home.php?quanly=index">
      <input style="border:none ; background:repeat" type="submit" value="Xem Sản Phẩm">
    </a>
  </div>

<?php
      }
?>



</div>