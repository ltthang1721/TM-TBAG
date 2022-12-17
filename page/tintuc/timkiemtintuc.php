<?php
if (isset($_POST['timkiemtintuc'])) {
    $tukhoa = $_POST['tukhoa'];
}

$sql_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet AND tbl_baiviet.tenbaiviet LIKE '%" . $tukhoa . "%'";
$query_bv = mysqli_query($mysqli, $sql_bv);
$num = mysqli_num_rows($query_bv);
?>

<?php
if ($num > 0) {
?>
    <div style="background-color: rgb(255, 255, 255);">
        <div class="container ">
            <div class="row-0">
                <h4 style="font-size:25px; padding-left:15px" class="mt-5">Có <b><?php echo $num ?></b> kết quả phù hợp với từ khóa tìm kiếm: "<b><?php echo $_POST['tukhoa'] ?></b>" </h4>
            </div>
            <div class="container">
                <div class="d-flex justify-content-end" style="margin-top:-40px; margin-right:2%">
                    <form action="home.php?quanly=timkiemtintuc" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm bài viết..." aria-label="Search" aria-describedby="basic-addon2">
                            <input type="submit" style="border:#918e8e solid 1px; color:grey" value="Search" placeholder="Tìm kiếm" name="timkiemtintuc">
                        </div>
                    </form>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-3 col-md-4">
                        <?php
                        // include("./page/tintuc/sidebar.php");
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
                                            <div class="content-news1" style="justify-content:center ;">
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
        </div>
    </div>
<?php
} else {
?>
    <h1 style="text-align:center" class="mt-5"> Từ Khóa Tìm Kiếm: "<?php echo $_POST['tukhoa'] ?>"</h1>;
    <a style="text-align: center"> Không có kết quả phù hợp. Vui lòng tìm lại! </a>;
    <div class="d-flex justify-content-end mb-5" style="margin-top:20px; margin-right:40%">
        <form action="home.php?quanly=timkiemtintuc" method="POST">
            <div class="input-group">
                <input type="text" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm tin tức..." aria-label="Search" aria-describedby="basic-addon2">
                <input type="submit" style="border:#918e8e solid 1px; color:grey" value="Search" placeholder="Tìm kiếm" name="timkiemtintuc">
            </div>
        </form>
    </div>
<?php
}
?>