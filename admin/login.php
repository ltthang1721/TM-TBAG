<?php
session_start();
include('config/config.php');
if (isset($_POST['dangnhap'])) {
	$taikhoan = $_POST['username'];
	$matkhau = ($_POST['password']);
	$sql = "SELECT * FROM tbl_admin WHERE username='" . $taikhoan . "' AND password='" . $matkhau . "' LIMIT 1";
	$row = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($row);
	if ($count > 0) {
		$_SESSION['dangnhap'] = $taikhoan;
		header("Location: index.php");
	} else {
		echo '<script>alert("Tài Khoản Hoặc Mật Khẩu Không Đúng, Vui Lòng Nhập Lại!");</script>';
		header("Location:login.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="shortcut icon" href="images/seeding.ico" />
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
	<script src="https://kit.fontawesome.com/c111c65069.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<title>LOGIN</title>
</head>

<body style="background-image:url(../ig/a6.jpg);">
	<div class="container" style="font-family:muli">
		<form method="POST" action="">
			<div class="row">
				<div style="margin-left: 700px; width: 500px">
					<div class="card" style="margin-bottom:100px; margin-top:82px; height: 400px;  border:#dcdcdc solid 1px">
						<div class="card-header" style="background:#23468c ;">
							<h3 style="text-align: center ; color: white; height:120px; padding-top: 30px; font-size: 20px">ĐĂNG NHẬP ADMIN <br> <br>RÓE Xin Chào!</br></h3>
							<p></p>
						</div>
						<div class="card-body">
							<div class="form-group row" style="margin-top:20px">
								<label class="col-sm-4 col-form-label" for="username" style="margin-left: 20px">Tên đăng nhập</label>
								<div class="col-sm-5">
									<input type="text" style="width:200px" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password" style="margin-left: 20px">Mật khẩu</label>
								<div class="col-sm-5">
									<input style="width:200px" type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5 offset-sm-4">
									<button style="margin-left: 20px; background:#23468c ; " type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</form>
	</div> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
<?php
?>

</html>