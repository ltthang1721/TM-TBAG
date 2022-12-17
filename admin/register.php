<?php
session_start();
include('config/config.php');
if(isset($_POST['dangky'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_admin(username, email, password) VALUE('".$username."', '".$email."' ,'".$password."')");
    if($sql_dangky){
        echo '<p style="color:green">Bạn đã thêm thành công!</p>';
        $_SESSION['dangky'] = $username;
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        // header("Location: home.php?quanly=giohang");
    }
} 
// if(isset($_POST['dangnhap'])){
//     header("Location: home.php?quanly=dangnhap");
// }
?>

<!DOCTYPE html>
<html lang="vi">

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
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c111c65069.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>SIGNIN</title>
</head>

<body style="background:url(./ig/bg2.png)">

    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card" style="margin-bottom:100px">
                        <div class="card-header" style="background-color: #ce2a37;">
                            <h3 style="text-align: center ; color: #f1f1f1;">THÊM TÀI KHOẢN ADMIN</h3>
                        </div>
                        <div class="card-body" style="margin-left: 100px ; ">
                            <form id="signupForm" method="post" class="form-horizontal" action="#">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="firstname">Tài Khoản</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="firstname" name="username" placeholder="Tài khoản" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="email">Email</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Hộp thư điện tử" />
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col-sm-7 offset-sm-4" >
                                        <button type="submit" class="btn btn-primary" name="dangky" value="Sign up" style="background:#ce2a37 ; border: #ce2a37;">Thêm Tài Khoản</button>
                                        <!-- <button type="submit" class="btn btn-primary" name="dangnhap" value="Login" style="background:repeat ; color:#ce2a37; border: none">Đã Có Tài Khoản</button> -->

                                    </div>
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div> <!-- Cột nội dung -->
            </div> <!-- Dòng nội dung -->
        </form>
    </div> <!-- Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="signin.js"></script>
    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function() {
                alert("submitted!");
            }
        });
        $(document).ready(function() {
            $("#signupForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Bạn chưa nhập vào họ của bạn",
                    lastname: "Bạn chưa nhập vào tên của bạn",
                    username: {
                        required: "Bạn chưa nhập tên đăng nhập",
                        minlength: "Tên đăng nhập phải có ít nhất 2 ký tự",
                    },
                    password: {
                        required: "Bạn chưa nhập vào mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 5 ký tự"
                    },
                    confirm_password: {
                        required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                        equalTo: "Mật khẩu không trùng khớp"
                    },
                    email: "Hộp thư điện tử không hợp lệ",
                    agree: "Bạn phải đồng ý với các quy định của chúng tôi"
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.siblings("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-valid");

                }
            });
        });
    </script>


</body>

</html>