<?php
// session_start();
// include('config/config.php');
if (isset($_POST['doimatkhau'])) {
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '" . $taikhoan . "' AND matkhau = '" . $matkhau_cu . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $sql_update = mysqli_query($mysqli, "UPDATE tbl_dangky SET matkhau='" . $matkhau_moi . "'");
        echo '<p style="color:green">Mật Khẩu Đã Được Thay Đổi!</p>';
    } else {
        echo '<p style="color:red">Tài Khoản Hoặc Mật Khẩu Cũ Không Đúng, Vui Lòng Nhập Lại!</p>';
    }
}
?>
<form method="POST" action="">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">

            <div class="card" style="margin-bottom:100px">
                <div class="card-header" style="background-color: #23468c;">
                    <h3 style="text-align: center ; color: #f1f1f1;">Đổi Mật Khẩu</h3>
                </div>
                <div class="card-body" style="margin-left: 100px ; ">
                    <form id="signupForm" method="post" class="form-horizontal" action="#">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="email">Tài Khoản</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="username" name="email" placeholder="Email" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="password">Mật khẩu cũ</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="password" name="password_cu" placeholder="Mật khẩu cũ" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="password">Mật khẩu mới</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="password" name="password_moi" placeholder="Mật khẩu mới" />
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-5 offset-sm-4">
                                <button type="submit" class="btn btn-primary" name="doimatkhau" value="Sign up" style="background:#23468c ; border: #23468c;">Đổi Mật Khẩu</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- Cột nội dung -->
    </div> <!-- Dòng nội dung -->
</form>