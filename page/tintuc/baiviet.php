<?php
$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id = '$_GET[id]' LIMIT 1";
$query_bv = mysqli_query($mysqli, $sql_bv);
$sql_bv_lq = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id ASC LIMIT 4";
$query_bv_lq = mysqli_query($mysqli, $sql_bv_lq);

?>

<body >
    <div class="header_product" style="padding-top: 50px; padding-left: 40px; background-image: url(./ig/bgnews.jpg);">
        <div style="border: 1px solid white; width: 250px; background:#f8f4f4c7; padding:20px; font-size:18px;">
            <b><?php echo 'CHI TIẾT BÀI VIẾT' ?></b>
            <a href="home.php"><br>Trang Chủ</a><b>><a href="home.php?quanly=tintuc">Tin Tức</a></b>
        </div>
    </div>
    <div class="container mb-auto">


        <div class="row mt-4">
            <div class="col-lg-3 col-md-4">
                <?php
                include("./page/tintuc/baivietnoibat.php");
                ?>
            </div>

            <div class="col-lg-9 col-md-8" style="margin-top:-47px">
                <?php
                while ($row_bv = mysqli_fetch_array($query_bv)) {
                ?>
                    <div class="row mt-5">
                        <div class="content-news">
                            <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv['id'] ?>" class="title-news" style="font-size:16px;"><?php echo $row_bv['tenbaiviet'] ?></a>
                            <div class="date-news"><i style="font-size:20px; color: #918e8e;" class="fa">&#xf073; </i> 03/10/2022</div>
                            <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv['id'] ?>" class="title-news mt-5" style=" text-align:center;color:black"><?php echo $row_bv['tenbaiviet'] ?></a>

                            <div class="content-news2">
                                <?php echo $row_bv['noidung'] ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="relative-posts">
                <div style="text-transform:uppercase ; font-size:25px; margin: 20px 7px; color:#444; font-family:Muli">Bài viết liên quan</div>
                <hr>
                <div class="group-item">
                    <div class="row">
                        <?php
                        while ($row_bv_lq = mysqli_fetch_array($query_bv_lq)) {
                        ?>
                            <div class="col-md-3">
                                <div class="item-posts1">
                                    <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv_lq['id'] ?>">
                                        <img style="width:250px; height:250px" src="admin/modu/quanlybaiviet/uploads/<?php echo $row_bv_lq['hinhanh'] ?>" class="img_news">
                                    </a>
                                    <div class="content-post" style="width: 270px; margin: 10px -5px">
                                        <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv_lq['id'] ?>" class="title-news" style="font-size:16px ;"><?php echo $row_bv_lq['tenbaiviet'] ?></a>
                                        <div class="date-news"><i style="font-size:20px; color: #918e8e;" class="fa">&#xf073; </i> 03/10/2022</div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</body>