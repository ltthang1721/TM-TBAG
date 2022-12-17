<style>
    .add {
        height: 40px;
        background: #23468c;
        border: #23468c;
        color: white;
        font-family: Muli;
        width: 130px;
        margin-bottom: 50px;
        font-weight: bold;
        
    }

    .add:hover {
        background: white; 
        color: #23468c;
        border: #23468c 1px solid;
    }
</style>
<div style=" width: 900px; color:#23468c">
<p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Thêm Bài Viết</p>
<table border="0" width="100%" style=" border-collapse: collapse; border:none; ">
    <form method="POST" action="modu/quanlybaiviet/xuly.php" enctype="multipart/form-data">
        <tr>
        <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Tên Bài Viết</td>
            <td><input style="border: 1px #23468c solid ; height: 40px; width:800px" type="text" name="tenbaiviet"></td>
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
            <td style=" font-size: 16px; font-weight:bold; width: 150px; height: 60px; ">Danh Mục</td>
            <td>
                <select name="danhmuc" style="height: 35px; border:#23468c solid 1px;">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet ASC ";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){ 
                    ?>
                    <option value="<?php echo $row_danhmuc['id_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
                <?php
                }
                ?>
                </select>
            </td>
        </tr>
        <tr>
        <tr style="text-align:center">
            <td colspan="2"><input class="add" type="submit" name="thembaiviet" value="Thêm Bài Viết"></td>
        </tr>
    </form>
</table>
</div>