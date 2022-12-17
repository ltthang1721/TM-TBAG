<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
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
    <p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Sửa Sản Phẩm</p>
    <table border="0" width="100%" style=" border-collapse: collapse; border:none; ">
        <?php
        while ($row = mysqli_fetch_array($query_sua_sp)) {
        ?>
            <form method="POST" action="modu/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
                <tr>
                    <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tên Sản Phẩm</td>
                    <td><input style="border: 1px #23468c solid ; height: 30px; width:250px" type="text" value="<?php echo $row['tensanpham'] ?> " name="tensanpham">
                        <span style="padding-left:100px ; font-size: 16px; font-weight:bold;"> Mã Sản Phẩm </span>
                        <input style="border: 1px #23468c solid ; height: 30px; width:250px;float:right" type="text" value="<?php echo $row['masp'] ?> " name="masp">
                    </td>
                </tr>
                <tr>
                    <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Giá Sản Phẩm</td>
                    <td><input style="border: 1px #23468c solid ; height: 30px; width:250px" type="text" value="<?php echo $row['giasp'] ?> " name="giasp">
                        <span style="padding-left:100px ; font-size: 16px; font-weight:bold;">Số Lượng</span>
                        <input style="border: 1px #23468c solid ; height: 30px; width:250px;float:right" type="text" value="<?php echo $row['soluong'] ?> " name="soluong">
                    </td>
                </tr>
                <tr>
                    <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 200px; ">Hình Ảnh</td>
                    <td>
                        <input type="file" name="hinhanh">
                        <img src="modu/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" width="150px">

                        <span style="font-size: 16px; font-weight:bold; width: 150px; height: 60px; margin-left: 205px">Danh Mục</span>

                        <select name="danhmuc" style="height: 35px; border:#23468c solid 1px;margin-left: 60px;">
                            <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC ";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                            ?>
                                    <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    
                </tr>
                <tr>
                    <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tóm Tắt</td>
                    <td><textarea rows="5" cols="50" name="tomtat" style="resize:none"><?php echo $row['tomtat'] ?></textarea></td>
                </tr>
                <tr>
                    <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Nội dung</td>
                    <td><textarea rows="5" cols="50" name="noidung" style="resize:none"><?php echo $row['noidung'] ?></textarea></td>
                </tr>
                <tr>

                </tr>

                <tr style="text-align:center">
                    <td colspan="2"><input class="add" type="submit" name="suasanpham" value="Cập Nhật"></td>
                </tr>
            </form>
        <?php
        }
        ?>
    </table>
</div>