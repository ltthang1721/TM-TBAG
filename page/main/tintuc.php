<?php
$sql_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC LIMIT 6";
$query_bv = mysqli_query($mysqli, $sql_bv);

?>



<div class="container mt-5">
    <h2 style="text-align:center" class="mt-5 mb-5"><b>TIN TỨC MỚI NHẤT</b></h2>
    <div class="row" style="margin-bottom: -20px!important; margin-left: 20px; ">
        <?php
        while ($row_bv = mysqli_fetch_array($query_bv)) {
        ?>
            <div class="col-4">
                <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv['id'] ?>" target="_blank" class="caption2" data-title="<?php echo $row_bv['tenbaiviet'] ?>">
                    <div class="textImg3">
                        <img src="admin/modu/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                    </div>
                </a>
            </div>

        <?php
        }
        ?>
    </div>
    <a href="home.php?quanly=tintuc">
    <div class="more mt-5 mb-5" style="float:right ; margin-right: -15px">XEM THÊM ></div>
</a>
</div>

