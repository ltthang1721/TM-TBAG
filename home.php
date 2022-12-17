<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/seeding.ico" />
  <link rel="stylesheet" href="./css/home.css">
  <link rel="stylesheet" href="./css/tintuc.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="shortcut icon" href="icon.png" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <link rel="stylesheet" href="css/fontawesome-free-6.1.2-web/css/all.css">
  <title>RÓE</title>
</head>

<body>
  <?php
  include("./admin/config/config.php");
  include("./page/header.php");
  ?>
  <?php
  // unset($_SESSION['dangky']);
  if (isset($_GET['quanly'])) {
    $temp = $_GET['quanly'];
  } else {
    $temp = '';
  }
  if ($temp == '') {
    include("page/main.php");
  }
   elseif ($temp == 'sanpham') {
    include("sanpham/sanpham.php");
  } 
  elseif ($temp == 'giohang') {
    include("sanpham/giohang.php");
  } 
  elseif ($temp == 'tintuc') {
    include("page/tintuc/index.php");
  } 
  elseif ($temp == 'danhmucbaiviet') {
    include("page/tintuc/danhmucbaiviet.php");
  } 
  elseif ($temp == 'xembaiviet') {
    include("page/tintuc/baiviet.php");
  }
  elseif ($temp == 'vechungtoi') {
    include("page/vechungtoi.php");
  } 
  elseif($temp == 'dangky'){
    include("page/dangky.php");
  } 
  elseif($temp == 'thanhtoan'){
    include("sanpham/thanhtoan.php");
  } 
  elseif($temp == 'dangnhap'){
    include("page/dangnhap.php");
  } 
  elseif($temp == 'timkiem'){
    include("page/timkiem.php");
  } 
  elseif($temp == 'timkiemtintuc'){
    include("page/tintuc/timkiemtintuc.php");
  } 
  elseif($temp == 'camon'){
    include("page/camon.php");
  } 
  elseif ($temp == 'index') {
    include("sanpham/index.php");
  } 
  elseif ($temp == 'thaydoimatkhau') {
    include("sanpham/thaydoimatkhau.php");
  }
  elseif ($temp == 'vanchuyen') {
    include("sanpham/vanchuyen.php");
  }
  elseif ($temp == 'thongtinthanhtoan') {
    include("sanpham/thongtinthanhtoan.php");
  }
  elseif ($temp == 'hoadon') {
    include("sanpham/hoadon.php");
  }
  elseif ($temp == 'lichsudonhang') {
    include("sanpham/lichsudonhang.php");
  }
  elseif ($temp == 'xemdonhang') {
    include("sanpham/xemdonhang.php");
  }
  ?>
  <?php
  include("./page/footer.php");
  ?>
  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 1500); // Change image every 2 seconds
    }
  </script>
  <script src="./home.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>



</html>