<?php
// session_start();
// include('config/config.php');
if (isset($_POST['dangnhap'])) {
	$email = $_POST['email'];
	$matkhau = ($_POST['password']);
	$sql = "SELECT * FROM tbl_dangky WHERE email='" . $email . "' AND matkhau ='" . $matkhau . "' LIMIT 1";
	$row = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($row);
	if ($count > 0) {
		$row_data = mysqli_fetch_array($row);
		$_SESSION['dangky'] = $row_data['tenkhachhang'];
		$_SESSION['email'] = $row_data['email'];
		$_SESSION['id_khachhang'] = $row_data['id_dangky'];

		header("Location: home.php?quanly=giohang");
	} else {
		echo '<a style="text-align: center"> Email Hoặc Mật Khẩu Không Đúng, Vui Lòng Nhập Lại! </a>';
	}
}
?>


<form method="POST" action="">
	<div class="col-sm-8 offset-sm-2 ">
		<div class="card" style="margin-bottom:100px; margin-top:45px">
			<div class="card-header" style="background-color: #23468c;">
				<h3 style="text-align: center ; color: #f1f1f1;">Đăng Nhập Khách Hàng</h3>
			</div>
			<div class="card-body" style="margin-left: 100px ;">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label" for="username">Tài Khoản</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="username" name="email" placeholder="Email..." />
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu..." />
					</div>
				</div>

				<div class="row">
					<div class="col-sm-5 offset-sm-4">
						<button type="submit" class="btn btn-primary" name="dangnhap" value="Sign up" style="background:#23468c ; border: #23468c;">Đăng nhập</button>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Cột nội dung -->
</form>