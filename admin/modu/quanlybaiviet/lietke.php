<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == "" || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 6) - 6;
}
$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc = tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id ASC LIMIT $begin,6";
$query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
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

    }

    .add:hover {
        background: white;
        color: #23468c !important;
        border: #23468c 1px solid;
    }
</style>
<div style=" width: 1000px; color:#23468c !important; margin-bottom: 50px">

    <p style="font-size: 40px; text-align:center; margin-top:30px; margin-bottom:30px; font-family: muli;">Danh Sách Bài Viết</p>
    <div class="add" style=" padding-top: 10px; float:left; margin: 10px 0px">
        <a href="index.php?action=quanlybaiviet&query=them">
            <span class="material-icons-outlined" style="font-size:18px ;padding-bottom: 4px; padding-left:2px">add </span>
            <input style="border:none ; background:repeat" type="submit" name="themdanhmuc" value="Thêm Bài Viết">
        </a>
    </div>
    <form action="index.php?action=quanlytimkiem&query=timkiembv" method="POST">
        <div class="input-group" style="float:right ;margin-top:10px">
            <input type="text" style="border:#23468c solid 1px; color:#23468c; margin-left: -60px" class="form-control input-search" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
            <input type="submit" style="border:#23468c solid 1px; color:white; height:34px; background:#23468c" value="Search" placeholder="Tìm kiếm" name="timkiembv">
        </div>
    </form>
    <table style="width:100%" style="border-collapse:collapse;">
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
        while ($row = mysqli_fetch_array($query_lietke_bv)) {
            $i++;
        ?>
            <tr style="border-bottom:1px #23468c solid; color:black">
                <td style="text-align:center"><?php echo $i ?></td>
                <td style="padding:10px ;"><?php echo $row['tenbaiviet'] ?></td>
                <td style="text-align:center; padding:5px"><img src="modu/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> </td>
                <td style="padding:10px ;"><?php echo $row['tendanhmuc_baiviet'] ?></td>
                <td style="padding:10px ;"><?php echo $row['tomtat'] ?></td>
                <td style="text-align:center">
                    <a style="color:#23468c !important" href="modu/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>"><span class="material-icons-outlined">delete </span></a> | <a style="color:#23468c !important" href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>"><span class="material-icons-outlined">edit </span></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div style="clear:both ;"></div>
    <style type="text/css">
        ul.list_trang {
            padding: 0;
            margin: 0;
            list-style: none;
            padding-right: 20px;
            float: right;
        }

        ul.list_trang li {
            float: left;

            padding: 5px 10px;
            margin: 5px;
            background: #7d7d7d;
            display: block;
            border-radius: 50%;
        }

        ul.list_trang li a {
            color: white !important;
            text-align: center;
            text-decoration: none;

        }
    </style>
    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_baiviet");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 6);
    ?>
    <ul class="list_trang">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>
            <li <?php if ($i == $page) {
                    echo 'style="background: #23468c; font-weight:bold;"';
                } else {
                    '';
                } ?>><a href="index.php?action=quanlybaiviet&query=lietke&trang=<?php echo $i ?>" style="color:#ce2a37"><?php echo $i ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>