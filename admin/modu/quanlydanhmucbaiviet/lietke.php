<?php


$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet ASC ";
$query_lietke_danhmucbv = mysqli_query($mysqli, $sql_lietke_danhmucbv);
?>
<div style=" width: 900px; color:#23468c; font-weight:bold">
    <p style="font-size: 40px; text-align:center; margin-top:60px; font-family: muli;">Danh Mục Bài Viết</p>
    <table border="1" style="border-collapse:collapse; width: 100%; ">
        <tr style="height: 60px; background: #23468c; color: white ; font-size: 17px">
            <th style="text-align:center">ID</th>
            <th style="padding-left: 50px;">Tên Danh Mục</th>
            <th style="text-align:center">Quản Lý</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucbv)) {
            $i++;
        ?>
            <tr style="height: 40px">
                <td style="text-align:center"><?php echo $i ?></td>
                <td style="padding-left: 50px;"><?php echo $row['tendanhmuc_baiviet'] ?></td>
                <td style="text-align:center; ">
                    <a style="color:#23468c !important" href="modu/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>"><span class="material-icons-outlined">delete </span> </a> | <a style="color:#23468c !important" href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>"><span class="material-icons-outlined">edit </span></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>