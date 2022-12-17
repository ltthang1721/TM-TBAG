<?php
$sql = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham ";
$sqlbv = "SELECT * FROM tbl_baiviet ORDER BY id ";
$sqlcart = "SELECT * FROM tbl_cart ORDER BY id_cart ";
$sqlusers = "SELECT * FROM tbl_dangky ORDER BY id_dangky ";
$query = mysqli_query($mysqli, $sql);
$querybv = mysqli_query($mysqli, $sqlbv);
$querycart = mysqli_query($mysqli, $sqlcart);
$queryusers = mysqli_query($mysqli, $sqlusers);
$num = mysqli_num_rows($query);
$numbv = mysqli_num_rows($querybv);
$numcart = mysqli_num_rows($querycart);
$numusers = mysqli_num_rows($queryusers);

?>
<h2 style=" margin-top:10px; font-family:Muli">TRANG CHỦ</h2>
<div class="main-cards" style="font-family:Muli">

  <div class="card">
    <div class="card-inner" style="color:#5f5d5d !important;">
      <a style="color: #5f5d5d !important; font-size: 18px;" href="index.php?action=quanlysanpham&query=lietke" class="text-primary">SẢN PHẨM</a>
      <span class="material-icons-outlined text-blue">spa</span>
    </div>
    <span class="font-weight-bold"><?php echo $num ?></span>
    <a href="index.php?action=quanlysanpham&query=lietke" style="color: #5f5d5d !important; font-size: 14px; margin-left: 80px"> | xem chi tiết</a>
  </div>

  <div class="card">
    <div class="card-inner">
      <a style="color: #5f5d5d !important; font-size: 18px;" href="index.php?action=quanlybaiviet&query=lietke" class="text-primary">BÀI VIẾT</a>
      <span class="material-icons-outlined text-orange">newspaper</span>
    </div>
    <span class="font-weight-bold"><?php echo $numbv ?></span>
    <a href="index.php?action=quanlybaiviet&query=lietke" style="color: #5f5d5d !important; font-size: 14px; margin-left: 80px"> | xem chi tiết</a>

  </div>

  <div class="card">
    <div class="card-inner">
      <a style="color:#5f5d5d !important; font-size: 18px;" href="index.php?action=quanlydonhang&query=lietke" class="text-primary">ĐƠN HÀNG</a>
      <span class="material-icons-outlined text-green">shopping_cart</span>
    </div>
    <span class="font-weight-bold"><?php echo $numcart ?></span>
    <a href="index.php?action=quanlydonhang&query=lietke" style="color: #5f5d5d !important; font-size: 14px; margin-left: 80px"> | xem chi tiết</a>

  </div>

  <div class="card">
    <div class="card-inner">
      <a style="color:#5f5d5d !important; font-size: 18px;" href="index.php?action=quanlyusers&query=lietke" class="text-primary">THÀNH VIÊN</a>
      <span class="material-icons-outlined text-red">people</span>
    </div>
    <span class="font-weight-bold"><?php echo $numusers ?></span>
    <a href="index.php?action=quanlyusers&query=lietke" style="color: #5f5d5d !important; font-size: 14px; margin-left: 80px"> | xem chi tiết</a>

  </div>
</div>

<div class="row" style="font-family:Muli">
  <div class="col-md-6">
    <?php
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC LIMIT 5";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
    ?>
    <div style=" padding:10px; width: 450px; color:#367952 !important; background:white ; height: 420px; border:#367952 1px solid; border-radius:5px">
      <p style="font-size: 20px; text-align:center; margin-top:10px; margin-bottom:10px; font-weight:bold">Đơn Hàng Mới Nhất</p>
      <table style="width:100%" border="0" style="border-collapse:collapse;">
        <tr style="height: 60px; color:#23468c ; font-size: 16px">
          <th style="text-align:center; width: 40px; ">
            <p style="border:#367952 1px solid;border-radius: 25px; background:#367952; color:white">ID</p>
          </th>
          <th style="text-align:center; width: 80px">
            <p style="border:#367952 1px solid;border-radius: 25px; background:#367952; color:white">Mã Đơn</p>
          </th>
          <th style="text-align:center; width: 150px">
            <p style="border:#367952 1px solid;border-radius: 25px; background:#367952; color:white">Trạng Thái</p>
          </th>
          <th style="text-align:center; width: 110px">
            <p style="border:#367952 1px solid;border-radius: 25px; background:#367952; color:white">Ngày Đặt</p>
          </th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_dh)) {
          $i++;
        ?>
          <tr style="border-top:1px dotted; color:black">
            <td style="text-align:center;"><?php echo $i ?></td>
            <td style="padding:15px 20px; "><?php echo $row['code_cart'] ?></td>
            <td style="text-align:center;font-weight:bold ">
              <?php
              if ($row['cart_status'] == 1) {
                echo '<a style="color:#367952 !important" href="modu/quanlydonhang/xuly.php?cart_status=0&code=' . $row['code_cart'] . '"> <span style="font-size:14px ;" class="material-icons-outlined" >square</span> Xác Nhận</a>';
              } else {
                echo '<span style="font-size:14px ;" class="material-icons-outlined" >check</span> Đã Xác Nhận';
              }
              ?>
            </td>
            <td style="text-align:center"><?php echo $row['cart_date'] ?></td>

          </tr>
        <?php
        }
        ?>

      </table>
      <a href="index.php?action=quanlydonhang&query=lietke" style="color: white !important; font-size: 16px; margin-left:39%; border:#367952 1px solid; padding:5px; background:#367952;font-weight:bold">Xem Chi Tiết</a>
    </div>
  </div>

  <div class="col-md-6">
    <?php
    $sql_lietke_dh = "SELECT * FROM tbl_dangky ORDER BY id_dangky DESC LIMIT 5";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
    $num = mysqli_num_rows($query_lietke_dh);
    ?>
    <div style=" padding:10px; width: 450px; color:#cc3c43 !important; background:white ; height: 420px; border:#cc3c43 1px solid; border-radius:5px">
      <p style="font-size: 20px; text-align:center; margin-top:10px; margin-bottom:10px; font-weight:bold">Thành Viên Mới</p>
      <table style="width:100%" border="0" style="border-collapse:collapse;">
        <tr style="height: 60px; color:#cc3c43 ; font-size: 16px">
          <th style="text-align:center; width: 40px">
            <p style="border:#cc3c43 1px solid;border-radius: 25px; background:#cc3c43; color:white">ID</p>
          </th>
          <th style="text-align:center; width: 200px">
            <p style="border:#cc3c43 1px solid;border-radius: 25px; background:#cc3c43; color:white">Tên Khách Hàng</p>
          </th>
          <th style="text-align:center; width: 100px">
            <p style="border:#cc3c43 1px solid;border-radius: 25px; background:#cc3c43; color:white">Địa Chỉ</p>
          </th>
          <th style="text-align:center; width: 180px">
            <p style="border:#cc3c43 1px solid;border-radius: 25px; background:#cc3c43; color:white">Email</p>
          </th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_dh)) {
          $i++;
        ?>
          <tr style="border-top:1px dotted; color:black">
            <td style="text-align:center;"><?php echo $i ?></td>
            <td style="padding:15px 30px; "><?php echo $row['tenkhachhang'] ?></td>
            <td style="text-align:center"><?php echo $row['diachi'] ?></td>
            <td style="padding:15px ; "><?php echo $row['email'] ?></td>

          </tr>
        <?php
        }
        ?>

      </table>
      <a href="index.php?action=quanlyusers&query=lietke" style="color: white !important; font-size: 16px; margin-left:39%; border:#cc3c43 1px solid; padding:5px; background:#cc3c43; font-weight:bold">Xem Chi Tiết</a>

    </div>
  </div>
</div>