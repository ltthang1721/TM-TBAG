<?php
if (isset($_POST['doimatkhau'])) {
    $matkhau_cu = ($_POST['password_cu']);
    $matkhau_moi = ($_POST['password_moi']);
    $sql = "SELECT * FROM tbl_admin WHERE password = '" . $matkhau_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli, "UPDATE tbl_admin SET password ='" . $matkhau_moi . "'");
        echo '<script>alert("Mật Khẩu Đã Được Thay Đổi!");</script>';
    } else {
        echo '<script>alert("Mật Khẩu Cũ Không Đúng, Vui Lòng Nhập Lại!");</script>';
    }
}
?>
<style>
    .add {
        height: 40px;
        background: #23468c;
        border: #23468c;
        color: white;
        font-family: Muli;
        width:300px;
        margin-top: 20px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .add:hover {
        background: white;
        color: #23468c;
        border: #23468c 1px solid;
    }
</style>
<div style=" width: 500px; color:#23468c; font-family:Muli ; margin-top:20%">
    <p style="font-size: 40px; text-align:center; margin-top:30px; font-family: muli;">Đổi Mật Khẩu</p>
    <table border="0" width="100%" style=" border-collapse: collapse; height: 320px;  border:none; background:#F0F0F0 ">
        <form method="POST" action="">
            <tr>
                <td style="padding: 30px; font-size: 18px; font-weight:bold">Mật khẩu cũ</td>
                <td>
                    <input style="border: 1px #23468c solid ; height: 40px; width:230px" type="password" class="form-control" name="password_cu" placeholder="Mật khẩu cũ" />
                </td>
            </tr>
            <tr>
                <td style="padding-left:30px; font-size: 18px; font-weight:bold">Mật khẩu mới</td>
                <td>
                    <input style="border: 1px #23468c solid ; height: 40px; width:230px" type="password" class="form-control" id="password" name="password_moi" placeholder="Mật khẩu mới" />
                </td>
            </tr>
            <tr style="text-align:center">
                <td colspan="2"><input class="add" type="submit" name="doimatkhau" value="Đổi Mật Khẩu"></td>
            </tr>
        </form>
    </table>
</div>