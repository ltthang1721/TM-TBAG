<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
}

$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.noidung LIKE '%" . $tukhoa . "%'";
$query_pro = mysqli_query($mysqli, $sql_pro);
$num = mysqli_num_rows($query_pro);
?>

<?php
if ($num > 0) {
?>
    <div style="background-color: rgb(255, 255, 255);">
        <div class="container ">
            <div class="row-0 mt-3">
                <h4 style="text-align:center" class="mb-5">Có <b><?php echo $num ?></b> kết quả phù hợp với từ khóa tìm kiếm: "<b><?php echo $_POST['tukhoa'] ?></b>" </h4>
            </div>

            <div class="row mb-5">
                <?php
                while ($row = mysqli_fetch_array($query_pro)) {
                ?>
                    <div class="col-3 mb-5">
                        <div id="bt_imageeffect">
                            <br />
                            <li class="galleryItem">
                                <a class="caption" data-description="Xem thêm..." href="product.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                                    <img src="admin/modu/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>">
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="col-3">
                        <h2><?php echo $row['tensanpham'] ?></h2>
                        <div style="color:#717171 ;text-align: justify;"><?php echo $row['tomtat'] ?></div>
                        <a href="product.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                            <button class="detail">Chi tiết</button></a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <h1 style="text-align:center" > Từ Khóa Tìm Kiếm: <?php echo $_POST['tukhoa'] ?></h1>;
    <a style="text-align: center" class="mb-4"> Không có kết quả phù hợp. Vui lòng tìm lại! </a>;
<?php
}
?>