<div class="filter category">
    <div class="titleFilter">
        DANH MỤC
    </div>
    <div class="containerContent">
        <!-- <div class="contentFilter d-flex align-items-center justify-content-between" data-toggle="collapse" href="#collapse1"> -->
            <?php
            $sql_danhmuc_bv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet ASC";
            $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
            while ($_row = mysqli_fetch_array($query_danhmuc_bv)) {
            ?>
                <a class="content" href="home.php?quanly=danhmucbaiviet&id=<?php echo $_row['id_baiviet'] ?>"><?php echo $_row['tendanhmuc_baiviet'] ?></a>
                
            <?php
            }
            ?>
        <!-- </div> -->
    </div>
</div>