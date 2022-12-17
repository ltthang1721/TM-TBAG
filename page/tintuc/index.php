<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == "" || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 4) - 4;
}


$sql_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id ASC LIMIT $begin,4";
$query_bv = mysqli_query($mysqli, $sql_bv);
?>

<body style="background: url(./ig/bg3.png) ;">
    <div class="header_product" style="padding-top: 50px; padding-left: 40px;background-image: url(./ig/bgnews.jpg);">
        <div style="border: 1px solid white; width: 240px; background:#f8f4f4c7; padding:20px; font-size:18px;">
            <b>TẤT CẢ TIN TỨC</b>
            <a href="home.php"><br>Trang Chủ</a><b>><a href="home.php?quanly=tintuc">Tin Tức</a></b>
        </div>
    </div>

    <div class="container mb-auto">
        <div class="d-flex justify-content-end" style="margin-top:50px;">
            <form action="home.php?quanly=timkiemtintuc" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm bài viết..." aria-label="Search" aria-describedby="basic-addon2">
                    <input type="submit" style="border:#918e8e solid 1px; color:grey" value="Search" placeholder="Tìm kiếm" name="timkiemtintuc">
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
                                <a href="home.php?quanly=xembaiviet&id=<?php echo $row_bv['id'] ?>">
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


        <div style="clear:both ;"></div>
        <style type="text/css">
            ul.list_trang {
                padding: 0;
                margin: 0;
                list-style: none;
                padding-right: 20px;
                float: right;
            }

            ul.list_trang li {
                float: left;

                padding: 5px 10px;
                margin: 5px;
                background: #7d7d7d;
                display: block;
            }

            ul.list_trang li a {
                color: white !important;
                text-align: center;
                text-decoration: none;

            }
        </style>
        <?php
        $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_baiviet");
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count / 4);
        ?>
        <ul class="list_trang">
            <?php
            for ($i = 1; $i <= $trang; $i++) {
            ?>
                <li <?php if ($i == $page) {
                        echo 'style="background: #23468c; font-weight:bold;"';
                    } else {
                        '';
                    } ?>><a href="home.php?quanly=tintuc&trang=<?php echo $i ?>" style="color:#23468c"><?php echo $i ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>