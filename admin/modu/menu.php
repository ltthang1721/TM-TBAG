<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangnhap']);
    header('Location: login.php');
}

?>

<aside id="sidebar" style="font-family:Muli">
    <div class="sidebar-title">
        <div class="sidebar-brand">
            <span style="padding-left: 30px;font-size:50px; margin-top:-20px" class="material-icons-outlined">person</span>
            <p style="padding-left: 80px; margin-top:-28px">RÓE</p>

        </div>
    </div>

    <ul class="sidebar-list" style="margin-top:-45px">
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">dashboard</span> <a href="index.php?action=quanlytrangchu&query=trangchu">Trang Chủ</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">book</span> <a href="index.php?action=quanlydanhmucsanpham&query=them">QL danh mục sản phẩm</a>
        </li>
        <li class="sidebar-list-item ">
            <span class="material-icons-outlined">fact_check</span>
            <a data-toggle="collapse" aria-expanded="false" data-target="#demo">Quản lý sản phẩm</a>
            <ul id="demo" class="collapse">
                <li class="list-group-item"><span class="material-icons-outlined" style="font-size:18px ;">add </span> <a href="index.php?action=quanlysanpham&query=them">Thêm Sản Phẩm</a></li>

                <li class="list-group-item"><span class="material-icons-outlined" style="font-size:16px ;">visibility </span> <a href="index.php?action=quanlysanpham&query=lietke">Xem Tất Cả Sản Phẩm</a></li>

            </ul>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">article</span> <a href="index.php?action=quanlydanhmucbaiviet&query=them">QL danh mục bài viết</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">newspaper </span>
            <a data-toggle="collapse" aria-expanded="false" data-target="#demo1">Quản lý bài viết</a>
            <ul id="demo1" class="collapse">
                <li class="list-group-item"><span class="material-icons-outlined" style="font-size:18px ;">add </span> <a href="index.php?action=quanlybaiviet&query=them">Thêm Bài Viết</a></li>

                <li class="list-group-item"><span class="material-icons-outlined" style="font-size:16px ;">visibility </span> <a href="index.php?action=quanlybaiviet&query=lietke">Xem Tất Cả Bài Viết</a></li>

            </ul>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined"> shopping_cart</span> <a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">people</span> <a href="index.php?action=quanlyusers&query=lietke">Quản lý thành viên</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">settings </span>
            <a data-toggle="collapse" aria-expanded="false" data-target="#demo3">Cài Đặt</a>
            <ul id="demo3" class="collapse">
                <li class="list-group-item"><span class="material-icons-outlined" style="font-size:18px ;">edit</span> <a href="index.php?action=doimatkhau&query=doi"> Đổi Mật Khẩu</a></li>

                <li class="list-group-item" style="list-style:none ;">
                    <span class="material-icons-outlined">logout</span>
                    <a href="index.php?dangxuat=1">Đăng Xuất:
                        <?php if (isset($_SESSION['dangnhap'])) {
                            echo $_SESSION['dangnhap'];
                        }
                        ?></a>
                </li>
            </ul>
        </li>

    </ul>

    <!-- <ul class="sidebar-list">
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">dashboard</span> <a href="index.php?action=quanlytrangchu&query=trangchu">Trang Chủ</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">book</span> <a href="index.php?action=quanlydanhmucsanpham&query=them">QL danh mục sản phẩm</a>
        </li>
        <li class="sidebar-list-item ">
            <span class="material-icons-outlined">fact_check</span>
            <a href="index.php?action=quanlysanpham&query=them" data-toggle="collapse" aria-expanded="false" data-target="#demo">Quản lý sản phẩm</a>
            <ul id="demo" class="collapse" class="sidebar-list">
                <li class="sidebar-list-item"><a href="">Lorem ipsum dolor sit amet</a></li>

                <li class="sidebar-list-item"><a href="">Lorem ipsum dolor sit amet</a></li>

            </ul>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">article</span> <a href="index.php?action=quanlydanhmucbaiviet&query=them">QL danh mục bài viết</a>
            <div class="dropdown">
            <span class="material-icons-outlined">article</span>
            <a href="index.php?action=quanlydanhmucbaiviet&query=them" class="nut">QL danh mục bài viết</a>
            <div class="dropdown">
                <div class="noidung_dropdown">
                    <li class="sidebar-list-item"><a href="">Lorem ipsum dolor sit amet</a></li>
                    <li class="sidebar-list-item"><a href="">Lorem ipsum dolor sit amet</a></li>

                 </div>
            </div>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">newspaper </span> <a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined"> shopping_cart</span> <a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">settings</span> <a>Settings</a>
        </li>
        <li class="sidebar-list-item">
            <span class="material-icons-outlined">logout</span>
            <a href="index.php?dangxuat=1">Đăng Xuất:
                <?php if (isset($_SESSION['dangnhap'])) {
                    echo $_SESSION['dangnhap'];
                }
                ?></a>
        </li>

    </ul> -->


</aside>