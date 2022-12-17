<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC ";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<div class="menu">
      <a href="home.php" class="home">Trang Chủ &nbsp &nbsp </a>
      <div class="dropdown">
        <a class="nut" href="home.php?quanly=index" >Sản Phẩm &nbsp</a>
        <div class="noidung_dropdown">
          <?php
          while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          ?>
            <a href="product.php?quanly=product&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
          <?php
          }
          ?>
        </div>
      </div>
      <a href="home.php?quanly=tintuc" class="products">Tin Tức &nbsp &nbsp</a>
      <a href="home.php?quanly=vechungtoi" class="products">Về Chúng Tôi</a>
    </div>