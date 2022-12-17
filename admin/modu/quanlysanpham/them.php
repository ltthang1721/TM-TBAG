<style>
    .add {
        height: 40px;
        background: #23468c;
        border: #23468c;
        color: white;
        font-family: Muli;
        width: 130px;
        margin-bottom: 50px;
        
    }

    .add:hover {
        background: white; 
        color: #23468c;
        border: #23468c 1px solid;
    }
</style>
<div style=" width: 900px; color:#23468c">
    <p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Thêm Sản Phẩm</p>
    <table border="0" width="100%" style=" border-collapse: collapse; border:none; ">
        <form method="POST" action="modu/quanlysanpham/xuly.php" enctype="multipart/form-data">
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tên Sản Phẩm</td>
                <td>
                    <input type="text" style="border: 1px #23468c solid ; height: 30px; width:250px" name="tensanpham">
                    <span style="padding-left:100px ; font-size: 16px; font-weight:bold;"> Mã Sản Phẩm </span>
                    <input style="border: 1px #23468c solid ; height: 30px; width:250px; float:right" type="text" name="masp">
                </td>
            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Giá Sản Phẩm</td>
                <td>
                    <input style="border: 1px #23468c solid ; height: 30px; width:250px" type="text" name="giasp">
                    <span style="padding-left:100px ; font-size: 16px; font-weight:bold;">Số Lượng</span>
                    <input style="border: 1px #23468c solid ; height: 30px; width:250px; float:right " type="text" name="soluong">
                </td>

            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Hình Ảnh</td>
                <td><input type="file" name="hinhanh"></td>
            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tóm Tắt</td>
                <td><textarea rows="5" cols="50" name="tomtat" style="resize:none;"></textarea></td>
            </tr>
            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Nội dung</td>
                <td><textarea rows="5" cols="50" name="noidung" style="resize:none"></textarea></td>
            </tr>

            <tr>
                <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Danh mục </td>
                <td>
                    <select name="danhmuc" style="height: 35px; border:#23468c solid 1px;">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC ";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
            <tr style="text-align:center">
                <td colspan="2"><input class="add" type="submit" name="themsanpham" value="Thêm Sản Phẩm"></td>
            </tr>
        </form>
    </table>
</div>