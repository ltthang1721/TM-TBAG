<?php
if (isset($_POST['timkiembv'])) {
    $tukhoa = $_POST['tukhoa'];
}

$sql_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet AND tbl_baiviet.tenbaiviet LIKE '%" . $tukhoa . "%'";
$query_bv = mysqli_query($mysqli, $sql_bv);
$num = mysqli_num_rows($query_bv);
?>

<?php
if ($num > 0) {
?>
    <div style=" width: 1000px; color:#23468c !important; margin-bottom: 50px">
        <p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Danh Sách Bài Viết</p>
        <div class="row-0">
            <h4 style="font-size:25px; padding-left:15px" class="mt-5">Có <b><?php echo $num ?></b> kết quả phù hợp với từ khóa tìm kiếm: "<b><?php echo $_POST['tukhoa'] ?></b>" </h4>
        </div>
        <form action="index.php?action=quanlytimkiem&query=timkiembv" method="POST">
            <div class="input-group" style="float:right ; margin-bottom:20px; margin-top: -40px">
                <input type="text" style="border:#23468c solid 1px; color:#23468c; margin-left: -60px" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
                <input type="submit" style="border:#23468c solid 1px; color:#23468c; height:34px" value="Search" placeholder="Tìm kiếm" name="timkiembv">
            </div>
        </form>
        <table style="width:100%" border="1" style="border-collapse:collapse;">
            <tr style="height: 60px; background: #23468c; color: white ; font-size: 17px">
                <th style="text-align:center; width: 40px">ID</th>
                <th style="text-align:center; width: 150px">Tên Bài Viết</th>
                <th style="text-align:center; ">Hình Ảnh</th>
                <th style="text-align:center; width: 150px">Danh Mục</th>
                <th style="text-align:center">Tóm Tắt</th>
                <th style="text-align:center; width: 100px">Quản Lý</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_bv)) {
                $i++;
            ?>
                <tr>
                    <td style="text-align:center"><?php echo $i ?></td>
                    <td style="padding:10px ;"><?php echo $row['tenbaiviet'] ?></td>
                    <td style="text-align:center"><img src="modu/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> </td>
                    <td style="padding:10px ;"><?php echo $row['tendanhmuc_baiviet'] ?></td>
                    <td style="padding:10px ;"><?php echo $row['tomtat'] ?></td>
                    <td style="text-align:center">
                        <a style="color:#23468c !important" href="modu/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>"><span class="material-icons-outlined">delete </span></a> | <a style="color:#337ab7 !important" href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>"><span class="material-icons-outlined">edit </span></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

<?php
} else {
?>
    <h1 style="text-align:center; color:#23468c!important; margin-top:200px" class="mt-5"> Từ Khóa Tìm Kiếm: "<?php echo $_POST['tukhoa'] ?>"</h1>
    <a style="text-align: center; color:#23468c!important; font-size: 18px"> Không có kết quả phù hợp. Vui lòng tìm lại! </a>
    <form action="index.php?action=quanlytimkiem&query=timkiembv" method="POST">
        <div class="input-group" style=" margin-top:20px;margin-left:100px ">
            <input type="text" style="border:#23468c solid 1px; color:#23468c; margin-left: -60px" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm tin tức..." aria-label="Search" aria-describedby="basic-addon2">
            <input type="submit" style="border:#23468c solid 1px; color:#23468c; height:34px" value="Search" placeholder="Tìm kiếm" name="timkiembv">
        </div>
    </form>
<?php
}
?>