<?php
$sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc = '$_GET[id]' ORDER BY id ASC LIMIT 10";
$query_bv = mysqli_query($mysqli, $sql_bv);
//get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<body style="background: url(./ig/bg5.png) ;">
    <div class="header_product" style="padding-top: 50px; padding-left: 40px; background-image: url(./ig/bgnews.jpg);">
        <div style="border: 1px solid white; width: 290px; background:#f8f4f4c7; padding:20px; font-size:18px;">
            <b><?php echo $row_title['tendanhmuc_baiviet'] ?></b>
            <a href="home.php"><br>Trang Chủ</a><b>><a href="home.php?quanly=tintuc">Tin Tức</a></b>
        </div>
    </div>
    <div class="container mb-auto">

        <div class="d-flex justify-content-end" style="margin-top:50px;">
            <form action="home.php?quanly=timkiemtintuc" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm bài viết..." aria-label="Search" aria-describedby="basic-addon2">
                    <input type="submit" style="border:#918e8e solid 1px; color:grey" value="Search" placeholder="Tìm kiếm" name="timkiemtintuc" >
                </div>
            </form>
        </div>

        <div class="row mt-4">
            <div class="col-lg-3 col-md-4">
                <?php
                include("./page/tintuc/sidebar.php");
                include("./page/tintuc/baivietnoibat.php");
                ?>
            </div>

            <div class="col-lg-9 col-md-8" style="margin-top:-47px">
                <div class="blog-list" id="result-list-category">
                    <?php
                    while ($row_bv = mysqli_fetch_array($query_bv)) {
                    ?>
                        <div class="row mt-5">
                            <div class="col-4">
                                <a href="tintuc.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                                    <img src="admin/modu/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" class="img_news">
                                </a>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-7">
                                <div class="content-news">
                                    <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv['id'] ?>" class="title-news"><?php echo $row_bv['tenbaiviet'] ?></a>
                                    <div class="date-news"><i style="font-size:20px; color: #918e8e;" class="fa">&#xf073; </i> 03/10/2022</div>
                                    <div class="content-news1">
                                        <?php echo $row_bv['tomtat'] ?>
                                    </div>
                                    <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv['id'] ?>">
                                    <div class="more1">ĐỌC THÊM</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>