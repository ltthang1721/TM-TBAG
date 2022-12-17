<?php
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="header_product" style="padding-top: 50px; padding-left: 40px; margin-bottom:50px;background-image: url(./ig/bo20.jpg);">
  <div style="border: 1px solid white; width: 250px; background:#f8f4f4c7; padding:20px; font-size:18px;">
    <b> <?php echo $row_title['tendanhmuc'] ?></b>
    <a href="home.php"><br>Trang Chủ</a><b>> Sản Phẩm</b>
  </div>
</div>