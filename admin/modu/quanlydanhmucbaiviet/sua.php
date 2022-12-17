<?php
$sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
$query_sua_danhmucbv = mysqli_query($mysqli, $sql_sua_danhmucbv);
?>
<style>
    .add {
        height: 40px;
        background: #23468c;
        border: 1px solid #23468c;
        color: white;
        font-family: Muli;
        width: 130px;

    }

    .add:hover {
        background: white;
        color: #23468c !important; 
        border: #23468c 1px solid;
    }

</style>
<div style="width: 900px; color:#23468c">
<p style="font-size: 40px; text-align:center; margin-top:30px; font-family: muli;">Sửa Danh Mục Bài Viết</p>
<table border="0" width="100%" style=" border-collapse: collapse; height: 210px;  border:none; background:#F0F0F0 ">
    <form method="POST" action="modu/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet']?>">
        <?php
            while($dong = mysqli_fetch_array($query_sua_danhmucbv)){
        ?>
        <tr>
        <td style="padding-left:50px; font-size: 17px; font-weight:bold; ">Tên Danh Mục</td>
            <td><input style="border: 1px #23468c solid ; height: 40px; width:450px " type="text" value="<?php echo $dong['tendanhmuc_baiviet']?>" name="tendanhmucbaiviet"></td>
        </tr>
        <tr>
        <tr style="text-align:center">
            <td colspan="2"><input class="add" type="submit" name="suadanhmucbaiviet" value="Cập Nhật"></td>
        </tr>
        <?php
         }
         ?>
    </form>
</table>
</div>
<div class="add" style="width: 150px; padding-top: 10px; float:right; margin: 10px 0px">
    <a href="index.php?action=quanlydanhmucbaiviet&query=them">
        <span class="material-icons-outlined" style="font-size:18px ;padding-bottom: 4px; padding-left:2px">add </span>
        <input style="border:none ; background:repeat" type="submit" name="themdanhmuc" value="Thêm Danh Mục">
    </a>
</div>