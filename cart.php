<?php
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if(!empty($_SESSION['user_id'])){
    if($_SESSION['user_id'] == "llcshan96" || $_SESSION['user_id'] == "dankong"){
      echo "<script>alert('您為使用者，無法進入購物車！'); location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
    else{

    }
  }
  else{
    exit(header("Location: login.php"));
  }

  if(isset($_POST['delete'])){
    if(isset($_COOKIE['cart']))
        $cart = $_COOKIE['cart'];
    else
        $cart="";
    $arr_cart = array_filter(explode(",",$cart),"myfunction");//將購物車Cookie轉成陣列,並移除空值
    $c=$_POST['cart'];
    for($i=0; $i < count($c); $i++){
      $arr_cart[$c[$i]]=" ";
    }
    $arr_cart_tmp=array_filter($arr_cart,"myfunction");
    $cart = implode(",",$arr_cart_tmp); //將所有商品以逗號連結成一字串
    setcookie("cart",$cart,time()+3600);//寫入Cookie,保留1個小時
    $cartsql="update cart set productlist='" . $cart . "' where account='" . $_SESSION['user_id'] . "'"; //寫入cart資料庫
    if ( $result = mysqli_query($link, $cartsql) )
      exit(header("Location: cart.php"));
  }
  else if(isset($_POST['pay'])){
    $arr_cart = array_filter(explode(",",$cart),"myfunction");//將購物車Cookie轉成陣列,並移除空值
    $c=$_POST['cart'];
    $myorder = "";
    for($i=0; $i < count($c); $i++){ // 有被勾選的
      $sql1 = "select * FROM product WHERE p_id='" . $arr_cart[$c[$i]] . "'";
      if ( $result = mysqli_query($link, $sql1) ) {
            $row = mysqli_fetch_assoc($result);
            $id = $_SESSION['user_id'];
            $p_id = $row['p_id'];
            $ps = $_POST['ps'];
            $p = "SELECT * FROM product WHERE p_id='" . $p_id . "'";
            if ( $result = mysqli_query($link, $p) ) {
              $row = mysqli_fetch_assoc($result);
              $temp = explode(",",$row["standard"]);//將購物車Cookie轉成陣列,並移除空值
            }

            if($_POST['standard'] == 'f')
              $standard="規格統一(隨機出貨)";
            else if($_POST['standard'] != '0')
              $standard=$temp[$_POST['standard']-1];
            else
              $standard="規格統一(隨機出貨)";

            if($_POST['num'] == '0')
              $num=1;
            else
              $num=$_POST['num'];

            $myorder = $myorder . "[" . $p_id . "-" . $standard . "*" . $num . "]   ";
            $arr_cart[$c[$i]] = " ";
      }
    }
    $sql2="insert into orders values ('$id','$myorder','$ps',NOW(),'已收到訂單')";
    mysqli_query($link, $sql2); // 送出查詢的SQL指令
    $arr_cart_tmp=array_filter($arr_cart,"myfunction");
    $cart = implode(",",$arr_cart_tmp); //將所有商品以逗號連結成一字串
    setcookie("cart",$cart,time()+3600);//寫入Cookie,保留1個小時
    $cartsql="update cart set productlist='" . $cart . "' where account='" . $_SESSION['user_id'] . "'"; //寫入cart資料庫
    if ( $result = mysqli_query($link, $cartsql) )
      echo "<script>alert('結帳成功！即將導至會員中心。'); location.href = 'member_centre.php';</script>";
  }

  function myfunction($v)
  {
    if ($v == " ")
      return false;
    else
      return true;
  }
?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 Cart</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body>
        <!-- Top menu -->
        <nav>
            <div class="col-md-3">
                <form class="navbar-form navbar-left" role="search" method="post" action="search.php">
                    <div class="form-group">
                        <input id="search-box" type="text" name="keyword" />
                    </div>
                    <button type="submit" name="submit" class="btn btn-default"><img src="assets/img/search.gif"></button>
                </form>
            </div>
            <div class="col-md-9"> <a href="index.php">首頁</a> <a href="aboutus.php">關於我們</a> <span class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">商品分類<b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="product_list.php?Id=1">兒童玩具</a></li>
      <li><a href="product_list.php?Id=2">電子產品</a></li>
      <li><a href="product_list.php?Id=3">派對小物</a></li>
      <li><a href="product_list.php?Id=4">實用小物</a></li>
    </ul>
    </span>
                <?
    if(empty($_SESSION['user_id']))
      echo "<a href='login.php'>會員登入</a>";
      else if($_SESSION['user_id'] == "llcshan96"){
        echo "<span class='dropdown'>";
        echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>辰姍，歡迎<b class='caret'></b></a>";
        echo "<ul class='dropdown-menu'>";
        echo "<li><a href='administrator.php'>管理中心</a></li>";
        echo "<li><a href='session_logout.php'>登出</a></li>";
        echo "</ul>";
        echo "</span>";
      }
      else if($_SESSION['user_id'] == "dankong"){
        echo "<span class='dropdown'>";
        echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>瑄筑，歡迎<b class='caret'></b></a>";
        echo "<ul class='dropdown-menu'>";
        echo "<li><a href='administrator.php'>管理中心</a></li>";
        echo "<li><a href='session_logout.php'>登出</a></li>";
        echo "</ul>";
        echo "</span>";
      }
    else{
      if ($result = mysqli_query($link, "SELECT * FROM general"))
      {
          while ($row = mysqli_fetch_assoc($result))
          {
                  if ($row["account"] == $_SESSION['user_id']){
                    $name = $row["name"];
                  }
          }
          mysqli_free_result($result);
      }
      echo "<span class='dropdown'>";
      echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>" . $name . "，歡迎<b class='caret'></b></a>";
      echo "<ul class='dropdown-menu'>";
      echo "<li><a href='member_centre.php'>會員中心</a></li>";
      echo "<li><a href='session_logout.php'>登出</a></li>";
      echo "</ul>";
      echo "</span>";
    }
    ?>
                    <a href="cart.php">購物車</a> <a href="message_total.php">留言版</a>
                    <div class="hide-menu"> <a href=""><i class="fa fa-bars"></i></a> </div>
            </div>
        </nav>
        <div class="show-menu"> <a href=""><i class="fa fa-bars"></i></a> </div>
        <!-- LogIn -->
        <div class="block-1-container section-container section-container-gray">
            <div class="container">
                <div class="row">
                    <div class="section-description wow rotateIn"> <br>
                        <p style="font-size:40px; color:#666666; font-weight:bold;">購物車</p>
                    </div>
                </div>
                <br>
                </br>
                <div class="row">
                    <form action="" id="c" name="c" method="post" class="form-group">
                        <?
        $cartsql = "SELECT * FROM cart WHERE account='" . $_SESSION['user_id'] . "'";
        if ( $result = mysqli_query($link, $cartsql) ) {
              $row = mysqli_fetch_assoc($result);
              $cart = $row['productlist'];
        }

        $arr_cart = array_filter(explode(",",$cart));//將購物車Cookie轉成陣列,並移除空值
        //$total_money = 0;
        for($i = 0; $i < count($arr_cart); $i++){
          $p = "SELECT * FROM product WHERE p_id=" . $arr_cart[$i];
          if ( $result = mysqli_query($link, $p) ) {
            $row = mysqli_fetch_assoc($result);
            $total_money += $row["p_cost"];
          }
        }

        echo "<table id='mycart' name='mycart' border='2' width='1000' align='center' bordercolor='#B7BAB4'>";
        echo "<tr align='center'>";
        echo "<td><input type='checkbox' name='CheckAll' id='CheckAll' onclick='checkall(" . $total_money . ")'></td>" .
             "<td style='color:#A2B8DB; font-weight:bold;'>商品編號</td>" .
             "<td style='color:#A2B8DB; font-weight:bold;'>商品名稱</td>" .
             "<td style='color:#A2B8DB; font-weight:bold;'>商品金額</td>" .
             "<td style='color:#A2B8DB; font-weight:bold;'>商品規格</td>" .
             "<td style='color:#A2B8DB; font-weight:bold;'>商品數量</td>";
        echo "</tr>";
        for($i = 0; $i < count($arr_cart); $i++){
          $p = "SELECT * FROM product WHERE p_id=" . $arr_cart[$i];
          if ( $result = mysqli_query($link, $p) ) {
                $row = mysqli_fetch_assoc($result);
                echo "<tr align='center'>";
                  echo "<td><input type='checkbox' id='cart_" . $row["p_id"] . "' name='cart[]' value='" . $i . "' class='checkbox-inline cart_group' onclick='check(" . $row["p_cost"] . "," . $row["p_id"] . ")'></td>";
                  echo "<td>" . $row["p_id"] . "</td>";
                  echo "<td>" . $row["p_name"] . "</td>";
                  echo "<td>$ " . $row["p_cost"] . "</td>";
                  echo "<td>";
                  $standard = explode(",",$row["standard"]);//將購物車Cookie轉成陣列,並移除空值
                  echo "<select id='standard' name='standard' size='1'>";
                  for($j = 0; $j < count($standard); $j++){
                    if(count($standard) > 1){
                      if($j == 0){
                        echo "  <option value='" . $j . "' selected>請選擇商品規格</option>";
                        echo "  <option value='" . ($j+1) . "'>" . $standard[$j] . "</option>";
                      }
                      else
                        echo "  <option value='" . ($j+1) . "'>" . $standard[$j] . "</option>";
                    }
                    else{
                      echo "  <option value='f' selected>" . $standard[$j] . "</option>";
                    }
                  }
                  echo "</select>";
                  echo "</td>";
                  echo "<td>";
                  echo "<select id='num' name='num' size='1');'>";
                    echo "  <option value='0' selected>請選擇商品數量</option>";
                    echo "  <option value='1'>1</option>";
                    echo "  <option value='2'>2</option>";
                    echo "  <option value='3'>3</option>";
                    echo "  <option value='4'>4</option>";
                    echo "  <option value='5'>5</option>";
                  echo "</select>";
                  echo "</td>";
                echo "</tr>";
                mysqli_free_result($result); // 釋放佔用的記憶體
          }
        }
        echo "</td></tr>";
        echo "<tr align='center'><td colspan='7'><span style='font-size:18px;color:#A2B8DB; font-weight:bold;'>備註</span><br><textarea id='ps' name='ps' rows='3' cols='60' placeholder='請注意，結帳後無法修改訂單。未選擇商品數量一律以1件計算。未選擇商品規格一律隨機寄出。'></textarea>";
        echo "</td></tr>";

        echo "</td></tr>";
        echo "<tr align='center'><td colspan='7'>";
        echo "<div id='total' class='form-group'></div><br>";
        echo "<div id='ship' class='form-group'></div><br>";
        echo "<div id='final' class='form-group'></div>";
        echo "</td></tr>";
        echo "</td></tr>";

        echo "<tr align='center'><td colspan='7'>
        <div id='message' class='form-group'></div>
        <br>
        <button id='delete' name='delete' type='submit' class='btn btn-default btn-sm'>取消購物車</button>" . "&nbsp;&nbsp;&nbsp;&nbsp;" .
        "<button id='pay' name='pay' type='submit' class='btn btn-default btn-sm'>結帳</button><br></br>";
        echo "</td></tr>";
        echo "</table>";

      ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- Scroll to top -->
        <div class="section-container section-container-gray">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="scroll-to-top"> <a class="scroll-link" href="#top-content"><i class="fa fa-chevron-up"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 footer-copyright"> &copy; Chi Chi Kuai Kuai by <a href="aboutus.php">C.S.Lin & H.C.Hsu</a>. </div>
                    <div class="col-sm-5 footer-social"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a> </div>
                </div>
            </div>
        </footer>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <!-- JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <!--中文錯誤訊息-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>

        <script>
        var total_cost = 0;
        var ship = 0;
        var final = 0;
        var cost_temp;
        $("#total").html("總金額$ " + total_cost);
        $("#ship").html("運費$ " + ship);
        $("#final").html("應付金額$ " + (total_cost + ship));
        function check(cost, id) {
          var str = "cart_" + id;
          cost_temp = cost;
          if(document.getElementById(str).checked == true){
            total_cost = total_cost + cost_temp;
            $("#total").html("總金額$ " + total_cost);
            if(total_cost < 3000 && total_cost != 0)
              ship = 60;
            else
              ship = 0;
            $("#ship").html("運費$ " + ship);
            $("#final").html("應付金額$ " + (total_cost + ship));
          }
          else if(document.getElementById(str).checked == false){
            total_cost = total_cost - cost_temp;
            $("#total").html("總金額$ " + total_cost);
            if(total_cost < 3000 && total_cost != 0)
              ship = 60;
            else
              ship = 0;
            $("#ship").html("運費$ " + ship);
            $("#final").html("應付金額$ " + (total_cost + ship));
          }
        }

        function checkall(total_money) {
          total_cost = total_money;
          if(document.getElementById("CheckAll").checked == true){
            $("#total").html("總金額$ " + total_cost);
            if(total_cost < 3000 && total_cost != 0)
              ship = 60;
            else
              ship = 0;
            $("#ship").html("運費$ " + ship);
            $("#final").html("應付金額$ " + (total_cost + ship));
          }
          else if(document.getElementById("CheckAll").checked == false){
            total_cost = 0;
            $("#total").html("總金額$ " + total_cost);
            if(total_cost < 3000 && total_cost != 0)
              ship = 60;
            else
              ship = 0;
            $("#ship").html("運費$ " + ship);
            $("#final").html("應付金額$ " + (total_cost + ship));
          }
        }

        var num_temp = 1;
        var num = 1;
        function checknum(cost, id) {
          var str = "cart_" + id;
          if(document.getElementById(str).checked == true){
            str = "num_" + id;
            cost_temp = cost;
            total_cost = total_cost - cost_temp*num_temp;
            num = value;
            total_cost = total_cost + cost_temp*num;
            $("#total").html("總金額$ " + total_cost);
            if(total_cost < 3000 && total_cost != 0)
              ship = 60;
            else
              ship = 0;
            $("#ship").html("運費$ " + ship);
            $("#final").html("應付金額$ " + (total_cost + ship));
          }
        }
        </script>

        <script>
          $(document).ready(function($) {
            $("#c").submit(function() {
                var cnt_cart = $("input:checkbox:checked[name='cart[]']").length;
                if (cnt_cart < 1) {
                      $("#message").html("未選擇項目 !");
                      return false;
                }
              });
          });
        </script>

        <script>
            $(document).ready(function() {
                $("#CheckAll").click(function() {
                    if ($("#CheckAll").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
                        $("input[name='cart[]']").each(function() {
                            $(this).prop("checked", true); //把所有的核取方框的property都變成勾選
                        })
                    } else {
                        $("input[name='cart[]']").each(function() {
                            $(this).prop("checked", false); //把所有的核方框的property都取消勾選
                        })
                    }
                })
            })
        </script>

        <style type="text/css">
        #message {
          color: #D82424;
          font-size: 16px;
          font-weight: normal;
          font-family: "微軟正黑體";
          display: inline;
          padding: 1px;
        }
        #total {
          color: #333333;
          font-size: 18px;
          font-weight: normal;
          font-family: "微軟正黑體";
          display: inline;
          padding: 1px;
        }
        #ship {
          color: #333333;
          font-size: 18px;
          font-weight: normal;
          font-family: "微軟正黑體";
          display: inline;
          padding: 1px;
        }
        #final {
          color: #333333;
          font-size: 22px;
          font-weight: bold;
          font-family: "微軟正黑體";
          display: inline;
          padding: 1px;
        }
        </style>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>

    </html>
