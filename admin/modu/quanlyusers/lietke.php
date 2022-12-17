<?php
$sql_lietke_dh = "SELECT * FROM tbl_dangky ORDER BY id_dangky ASC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
$num = mysqli_num_rows($query_lietke_dh);
?>
<div style=" width: 1000px; color:#23468c !important; margin-bottom: 50px; font-family: muli;"> 
<p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Danh Sách Thành Viên</p>
<p style="font-size: 18px">Tổng <span style="font-weight:bold ; "><?php echo $num ?></span> Thành Viên</p>
<table style="width:100%" border="1" style="border-collapse:collapse;">
    <tr style="height: 60px; background: #23468c; color: white ; font-size: 16px">
        <th style="text-align:center; width: 40px">ID</th>
        <th style="text-align:center; width: 130px">Tên Khách Hàng</th>
        <th style="text-align:center; width: 100px">Địa Chỉ</th>
        <th style="text-align:center; width: 200px">Email</th>
        <th style="text-align:center; width: 120px">Số Điện Thoại</th>
        <th style="text-align:center; width: 120px">Quản Lý</th>
    </tr>
    <?php
    $i = 0; 
    $dem=0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>
        <tr style="border-bottom:1px #23468c solid; color:black">
            <td style="text-align:center;"><?php echo $i ?></td>
            <td style="padding:15px 30px; "><?php echo $row['tenkhachhang'] ?></td>
            <td style="text-align:center"><?php echo $row['diachi'] ?></td>
            <td style="padding:15px ; "><?php echo $row['email'] ?></td>
            <td style="text-align:center"><?php echo $row['dienthoai'] ?></td>
            <td style="text-align:center;">
            <a style="color:#23468c !important" href="modu/quanlyusers/xuly.php?idkhachhang=<?php echo $row['id_dangky'] ?>"><span class="material-icons-outlined" >delete </span> </a> 
            </td>
        </tr>
    <?php
    }
    ?>
    
</table>
</div>