<style>

  * {
    box-sizing: border-box
  }


  ul {
    list-style: none
  }

  .generic-anchor {
    color: white;
  }

  .generic-anchor:visited {
    color: white
  }

  .generic-anchor:hover {
    color: #ccc
  }


  .flex-rw {
    display: flex;
    flex-flow: row wrap;
  }


  footer {
    background: rgb(55, 55, 55);
    margin-top: auto;
    width: 100%
  }

  .footer-list-top {
    width: 33.333%
  }

  .footer-list-top>li {
    text-align: left;
    padding-bottom: 10px;
    font-size: 15px
  }

  .footer-list-header {
    padding: 10px 0 5px 0;
    color: #fff;
    font: 25px "Muli", sans-serif;
    margin-left: 8px;
  }

  .footer-list-anchor {
    font: 1.3em "Muli", sans-serif
  }

  .footer-social-section {
    width: 100%;
    align-items: center;
    justify-content: space-around;
    position: relative;
    margin-top: 5px;
    font-size: 10px;
  }

  .footer-social-section::after {
    content: "";
    position: absolute;
    z-index: 1;
    top: 50%;
    left: 10px;
    border-top: 1px solid #ccc;
    width: calc(100% - 20px)
  }

  .footer-social-overlap {
    position: relative;
    z-index: 2;
    background: rgb(55, 55, 55);
    padding: 0 20px
  }

  .footer-social-connect {
    display: flex;
    align-items: center;
    font: 3.5em "Oswald", sans-serif;
    color: #fff
  }

  .footer-social-small {
    font-size: 0.6em;
    padding: 0px 20px
  }

  .footer-social-overlap>a {
    font-size: 3em
  }

  .footer-social-overlap>a:not(:first-child) {
    margin-left: 0.38em
  }

  .footer-bottom-section {
    width: 100%;
    padding: 10px;
    border-top: 1px solid #ccc;
    margin-top: 10px;
  }

  .footer-bottom-section>div:first-child {
    margin-right: auto
  }

  .footer-bottom-wrapper {
    font-size: 15px;
    color: #fff
  }


  @media only screen and (max-width: 768px) {
    .footer-list-header {
      font-size: 2em
    }

    .footer-list-anchor {
      font-size: 1.1em
    }

    .footer-social-connect {
      font-size: 2.5em
    }

    .footer-social-overlap>a {
      font-size: 2.24em
    }

    .footer-bottom-wrapper {
      font-size: 1.3em
    }
  }

  @media only screen and (max-width: 568px) {
    main {
      font-size: 5em
    }

    .footer-list-top {
      width: 100%
    }

    .footer-list-header {
      font-size: 3em;
    }

    .footer-list-anchor {
      font-size:15px
    }

    .footer-social-section {
      justify-content: center
    }

    .footer-social-section::after {
      top: 25%
    }

    .footer-social-connect {
      margin-bottom: 10px;
      padding: 0 10px
    }

    .footer-social-overlap {
      display: flex;
      justify-content: center;
    }

    .footer-social-icons-wrapper {
      width: 100%;
      padding: 0
    }

    .footer-social-overlap>a:not(:first-child) {
      margin-left: 20px;
    }

    .footer-bottom-section {
      padding: 0 5px 10px 5px
    }

    .footer-bottom-wrapper {
      text-align: left;
      width: 100%;
      margin-top: 10px
    }
  }

  @media only screen and (max-width: 480px) {
    .footer-social-overlap>a {
      margin: auto
    }

    .footer-social-overlap>a:not(:first-child) {
      margin-left: 0;
    }

    .footer-bottom-rights {
      display: block
    }
  }

  @media only screen and (max-width: 320px) {
    .footer-list-header {
      font-size: 2.2em
    }

    .footer-list-anchor {
      font-size: 1.2em
    }

    .footer-social-connect {
      font-size: 2.4em
    }

    .footer-social-overlap>a {
      font-size: 2.24em
    }

    .footer-bottom-wrapper {
      font-size: 1.3em
    }
  }
</style>

<footer class="flex-rw">

  <ul class="footer-list-top" style="padding-left: 130px;">
    <li>
      <h4 class="footer-list-header">7LA ROSE</h4>
    </li>
    <li><a class="generic-anchor footer-list-anchor" style="font-size:15px ;"><i class="fa-solid fa-location-dot"></i> 3/2 Xuân Khánh, Ninh Kiều, TPCT</a></li>
    <li><a class="generic-anchor footer-list-anchor" style="font-size:15px ;"><i class="fa-solid fa-phone"></i> 0398587715 - 19001910067</a></li>
    <li><a class="generic-anchor footer-list-anchor" style="font-size:15px ;"><i class="fa-solid fa-envelope"></i> larose1910067@gmail.com</a></li>
    <li><a class="generic-anchor footer-list-anchor" style="font-size:15px ;"><i class="fa-solid fa-globe"></i> www.7larose.com</a></li>
  </ul>
  <ul class="footer-list-top" style="padding-left: 130px;">
    <li>
      <h4 class="footer-list-header">Dịch Vụ</h4>
    </li>


    <li><a href='../../BONG/home.php' class="generic-anchor footer-list-anchor" style="font-size:15px ;"> Home</a></li>
    <li><a href='../../BONG/home.php?quanly=index' class="generic-anchor footer-list-anchor" style="font-size:15px ;"> Sản Phẩm</a></li>
    <li><a href='../../BONG/home.php?quanly=tintuc' class="generic-anchor footer-list-anchor" style="font-size:15px ;">Tin Tức</a></li>
    <li><a href='../../BONG/home.php?quanly=vechungtoi' class="generic-anchor footer-list-anchor" style="font-size:15px ;">Về Chúng Tôi</a></li>
  </ul>
  <ul class="footer-list-top">
    <li id='help'>
      <h4 class="footer-list-header">Chính Sách</h4>
    </li>
    <li><a href='#' class="generic-anchor footer-list-anchor"  style="font-size:15px ;">Chính Sách Thanh Toán</a></li>
    <li><a href='#' class="generic-anchor footer-list-anchor" style="font-size:15px ;">Chính Sách Bán Hàng</a></li>
    <li><a href='#' class="generic-anchor footer-list-anchor" style="font-size:15px ;">Chính Sách Bảo Mật</a></li>
    <li><a href='#' class="generic-anchor footer-list-anchor" style="font-size:15px ;">Điều Khoản Sử Dụng</a></li>
  </ul>
  <section class="footer-social-section flex-rw">
    <span class="footer-social-overlap footer-social-connect">
      CONNECT <span class="footer-social-small">with</span> US
    </span>
    <span class="footer-social-overlap footer-social-icons-wrapper">
      <a href="#" class="generic-anchor" title="Pinterest" ><i class="fa-brands fa-pinterest"></i></a>
      <a href="#" class="generic-anchor" title="Facebook" ><i class="fa-brands fa-facebook"></i></a>
      <a href="#" class="generic-anchor" title="Twitter" ><i class="fa-brands fa-twitter"></i></a>
      <a href="#" class="generic-anchor" title="Instagram" ><i class="fa-brands fa-instagram"></i></a>
      <a href="#" class="generic-anchor" title="Youtube" ><i class="fa-brands fa-youtube"></i></a>
      <a href="#" class="generic-anchor" title="Google Plus" ><i class="fa-brands fa-google-plus-g"></i></i></a>
    </span>
  </section>
  <section class="footer-bottom-section flex-rw">
    <div class="footer-bottom-wrapper">
      <i class="fa fa-copyright" role="copyright"> </i> 
      2022 Copyright: 7LAROSE
    </div>
    <div class="footer-bottom-wrapper">
      <a rel="nofollow">Terms</a> | <a class="generic-anchor" rel="nofollow">Privacy</a>
    </div>
  </section>
</footer>