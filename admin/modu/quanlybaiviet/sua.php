<?php
$sql_sua_bv = "SELECT * FROM tbl_baiviet WHERE id='$_GET[idbaiviet]' LIMIT 1";
$query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?>
 <style>
    .add {
        height: 40px;
        background: #23468c;
        border: 1px solid #23468c;
        color: white;
        font-family: Muli;
        width: 140px;
        font-weight: bold;
        margin: 50px;
    }

    .add:hover {
        background: white;
        color: #23468c !important;
        border: #23468c 1px solid;
    }
</style>
<div style=" width: 900px; color:#23468c">
<p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Sửa Bài Viết</p>
<table border="0" width="100%" style="border-collapse: collapse;">
    <?php
    while ($row = mysqli_fetch_array($query_sua_bv)) {
    ?>
        <form method="POST" action="modu/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" enctype="multipart/form-data">
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tên Bài Viết</td>
                <td><input style="border: 1px #23468c solid ; height: 40px; width:800px" type="text" value="<?php echo $row['tenbaiviet'] ?> " name="tenbaiviet"></td>
            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 200px; ">Hình Ảnh</td>
                <td style="margin-top: 20px">
                    <input type="file" name="hinhanh">
                    <img src="modu/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
                    <span style="font-size: 16px; font-weight:bold; width: 150px; height: 60px; margin-left: 205px">Danh Mục</span>
                    <select name="danhmuc" style="height: 35px; border:#23468c solid 1px;margin-left: 40px;">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet ASC ";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            if ($row_danhmuc['id_baiviet'] == $row['id_danhmuc']) {
                        ?>
                                <option selected value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tóm Tắt</td>
                <td ><textarea rows="5" cols="50" name="tomtat" style="resize:none"><?php echo $row['tomtat'] ?></textarea></td>
            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px;  ">Nội dung</td>
                <td><textarea rows="5" cols="50" name="noidung" style="resize:none"><?php echo $row['noidung'] ?></textarea></td>
            </tr>

            <tr style="text-align:center">
                <td colspan="2"><input class="add" type="submit" name="suabaiviet" value="Sửa Bài Viết"></td>
            </tr>
        </form>
    <?php
    }
    ?>
</table>
</div>