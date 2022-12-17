<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC ";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<div class="container mt-3 mb-5">
    <div class="row">
      <?php
      while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
      ?>
        <div class="col-3 " style="margin:auto ;">
          <div class="colframe">
            <a href="product.php?quanly=bohoa&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
              <div class="col-other">
                <img src="./ig/logo1.png" style="width: 70px ; height: 70px; margin-top: -20px;"><br>
                <?php echo $row_danhmuc['tendanhmuc'] ?>
              </div>
            </a>
          </div>
        </div>

      <?php
      }
      ?>
    </div>
  </div>