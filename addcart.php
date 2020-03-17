<?php
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if(!empty($_SESSION[user_id])){
    $cartsql = "SELECT * FROM cart WHERE account='" . $_SESSION['user_id'] . "'";
    if ( $result = mysqli_query($link, $cartsql) ) {
          $row = mysqli_fetch_assoc($result);
          $cart = $row['productlist'];
    }
    $arr_cart = array_filter(explode(",",$cart));//將購物車Cookie轉成陣列,並移除空值

    $pid = $_GET['pid'];

    if (!in_array($pid,$arr_cart))
    $arr_cart[]=$pid;//加入陣列

    $cart = implode(",",$arr_cart); //將所有商品以逗號連結成一字串
    setcookie("cart",$cart,time()+3600); //寫入Cookie,保留1個小時
    $sql="update cart set productlist='" . $cart . "' where account='" . $_SESSION['user_id'] . "'"; //寫入cart資料庫
    if ( $result = mysqli_query($link, $sql) ){
      //返回上一頁
      echo "<script>alert('商品加入購物車成功！'); location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
  }
  else
    echo "<script>alert('使用購物車功能請先登入！'); location.href = 'login.php';</script>";
?>

<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/retina-1.1.0.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/scripts.js"></script>
