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
    <div style=" width: 1000px; color:#23468c !important; margin-bottom: 50px">

        <p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Danh Sách Sản Phẩm</p>

        <div class="row-0 mt-3">
            <h4 class="mb-5">Có <b><?php echo $num ?></b> kết quả phù hợp với từ khóa tìm kiếm: "<b><?php echo $_POST['tukhoa'] ?></b>" </h4>
        </div>
        <form action="index.php?action=quanlytimkiem&query=timkiemsp" method="POST">
            <div class="input-group" style="float:right ; margin-bottom:20px; margin-top: -40px">
                <input type="text" style="border:#23468c solid 1px; color:#23468c; margin-left: -60px" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
                <input type="submit" style="border:#23468c solid 1px; color:#23468c; height:34px" value="Search" placeholder="Tìm kiếm" name="timkiem">
            </div>
        </form>


        <table style="border-collapse:collapse;width:100%">
            <tr style="height: 60px; background: #23468c; color: white ; font-size: 17px">
                <th style="text-align:center; width: 40px">ID</th>
                <th style="text-align:center; width: 150px">Tên Sản Phẩm</th>
                <th style="text-align:center; ">Hình Ảnh</th>
                <th style="text-align:center; width: 70px">Giá SP</th>
                <th style="text-align:center; width: 100px">Số Lượng</th>
                <th style="text-align:center; width: 100px">Danh Mục</th>
                <th style="text-align:center; width: 70px">Mã SP</th>
                <th style="text-align:center">Tóm Tắt</th>
                <th style="text-align:center; width: 100px">Quản Lý</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_pro)) {
                $i++;
            ?>
                <tr style="border-bottom:1px #23468c solid">
                    <td style="text-align:center"><?php echo $i ?></td>
                    <td style="text-align:center"><?php echo $row['tensanpham'] ?></td>
                    <td style="text-align:center; padding:5px"><img src="modu/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> </td>
                    <td style="text-align:center"><?php echo $row['giasp'] ?></td>
                    <td style="text-align:center"><?php echo $row['soluong'] ?></td>
                    <td style="text-align:center"><?php echo $row['tendanhmuc'] ?></td>
                    <td style="text-align:center"><?php echo $row['masp'] ?></td>
                    <td style="padding:10px ;text-align:justify"><?php echo $row['tomtat'] ?></td>
                    <td style="text-align:center;">
                        <a style="color:#23468c !important" href="quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><span class="material-icons-outlined">delete </span> </a> | <a style="color:#23468c !important" href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><span class="material-icons-outlined">edit </span></a>
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
    <h1 style="text-align:center; color:#23468c!important; margin-top:200px" class="mb-5"> Từ Khóa Tìm Kiếm: <?php echo $_POST['tukhoa'] ?></h1>
    <a style="text-align: center; color:#23468c!important; font-size: 18px"> Không có kết quả phù hợp. Vui lòng tìm lại! </a>
    <form action="index.php?action=quanlytimkiem&query=timkiemsp" method="POST">
        <div class="input-group" style=" margin-top:20px;margin-left:100px ">
            <input type="text" style="border:#23468c solid 1px; color:#23468c; margin-left: -60px" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
            <input type="submit" style="border:#23468c solid 1px; color:#23468c; height:34px" value="Search" placeholder="Tìm kiếm" name="timkiem">
        </div>
    </form>
<?php
}
?>