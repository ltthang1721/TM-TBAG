<?php
if (isset($_SESSION['cart'])) {
    $i = 0;
    $dem = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
      if (isset($cart_item['masp'])) {
        $dem++;
      }
      $i++;
    }
  
    // echo '[ ';
    echo '<span style="margin-top:-39px; margin-left: 39px">' ;
    echo $dem;
    echo '</span>';
    // echo ' ]';

   
    // header('refresh:1');
  }
