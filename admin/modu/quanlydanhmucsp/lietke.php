<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<div style=" width: 900px; color:#23468c; ">
<p style="font-size: 40px; text-align:center; margin-top:60px; font-family: muli;">Danh Mục Sản Phẩm</p>
<table border="1"  style="border-collapse:collapse; width: 100%; font-weight:bold">
    <tr style="height: 60px; background: #23468c; color: white ; font-size: 17px">
        <th style="text-align:center" >ID</th>
        <th style="padding-left: 50px;">Tên Danh Mục</th>
        <th style="text-align:center">Quản Lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
    ?>
        <tr style="height: 40px">
            <td style="text-align:center"><?php echo $i ?></td>
            <td style="padding-left: 50px;"><?php echo $row['tendanhmuc'] ?></td>
            <td style="text-align:center; ">
                <a style="color:#23468c !important" href="modu/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><span class="material-icons-outlined" >delete </span></a> | <a style="color:#23468c !important" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>"><span class="material-icons-outlined" >edit </span></a> 
            </td>
        </tr>
    <?php
    }
    ?>
</table> 
</div>