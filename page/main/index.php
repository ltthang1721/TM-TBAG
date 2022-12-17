<?php
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 4";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<style>
    .limit {
        color: #717171;
        text-align: justify;
        display: block;
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div style="background-color: rgb(255, 255, 255);">
    <div class="container ">
        <div class="row-0">
            <h2 style="text-align:center" class="mb-5"><br><b> SẢN PHẨM MỚI NHẤT </b><br> </h2>
        </div>

        <div class="row">
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
                    <h3><?php echo $row['tensanpham'] ?></h3>
                    <div class="limit">
                        <?php echo $row['tomtat'] ?></div>
                    <a href="product.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                        <button class="detail">Chi tiết</button></a>
                </div>
            <?php
            }
            ?>
        </div>
        <a href="home.php?quanly=index">
            <div class="more" style="float:right ;">XEM THÊM ></div>
        </a>
    </div>
</div>