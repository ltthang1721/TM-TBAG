<?php
$sql_bvnb = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC LIMIT 4";
$query_bvnb = mysqli_query($mysqli, $sql_bvnb);
?>
<div class="recent-posts filter">
    <div class="titleFilter">BÀI VIẾT NỔI BẬT</div>
    <div class="group-item">
        <div class="item-posts">
            <?php
            while ($row_bvnb = mysqli_fetch_array($query_bvnb)) {
            ?>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bvnb['id'] ?>" class="img-posts" style=" height: 86px; width:86px;"><img src="admin/modu/quanlybaiviet/uploads/<?php echo $row_bvnb['hinhanh'] ?>" alt="" class="img-posts"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="content-post">
                            <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bvnb['id'] ?>" class="title-post"><?php echo $row_bvnb['tenbaiviet'] ?></a>
                            <div class="date-post"><i style="font-size:10px; color: #918e8e;" class="fa">&#xf073; </i> 05/03/2022</div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>