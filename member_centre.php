<?
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if(!empty($_SESSION['user_id'])){
    if($_SESSION['user_id'] == "llcshan96" || $_SESSION['user_id'] == "dankong")
      echo "<script>alert('您為管理者，無法進入會員中心！'); location.href = 'index.php';</script>";
  }
  else
    echo "<script>alert('您未登入，即將導至登入頁面！'); location.href = 'login.php';</script>";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 Member Centre</title>
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
                    <div class="section-description wow bounceInUp"> <br>
                        <p style="font-size:40px; color:#666666; font-weight:bold;">會員中心</p>
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#mp">Member Profile</a></li>
                        <li><a data-toggle="tab" href="#Orders">Orders</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="mp" class="tab-pane fade in active">
                            <?
            if(empty($_SESSION['user_id']))
              ;
            else if($_SESSION['user_id'] == "llcshan96" || $_SESSION['user_id'] == "dankong")
              ;
            else{
              if ($result = mysqli_query($link, "SELECT * FROM general"))
              {
                  while ($row = mysqli_fetch_assoc($result))
                  {
                          if ($row["account"] == $_SESSION['user_id']){
                            $name = $row["name"];
                            $account = $row["account"];
                            $email = $row["email"];
                            $phone = $row["phone"];
                            $address = $row["address"];
                          }
                  }
                  mysqli_free_result($result);
              }
              echo "<br>";
              echo "<table align='center'>";
              echo "<tr>";
              echo "  <td height='50' width='100' style='font-weight:bold; font-size:18px; color:#A2B8DB;' align='left'>Name</td>";
              echo "  <td height='50' width='200' style='font-size:18px;'>" . $name ."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "  <td height='50' width='100' style='font-weight:bold; font-size:18px; color:#A2B8DB;' align='left'>Account</td>";
              echo "  <td height='50' width='200' style='font-size:18px;'>" . $account ."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "  <td height='50' width='100' style='font-weight:bold; font-size:18px; color:#A2B8DB;' align='left'>E-mail</td>";
              echo "  <td height='50' width='200' style='font-size:18px;'>" . $email ."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "  <td height='50' width='100' style='font-weight:bold; font-size:18px; color:#A2B8DB;' align='left'>Phone</td>";
              echo "  <td height='50' width='200' style='font-size:18px;'>" . $phone ."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "  <td height='50' width='100' style='font-weight:bold; font-size:18px; color:#A2B8DB;' align='left'>Address</td>";
              echo "  <td height='50' width='200' style='font-size:18px;'>" . $address ."</td>";
              echo "</tr>";
              echo "</table>";
            }
          ?>
                        </div>
                        <div id="Orders" class="tab-pane fade">
                            <form action="" id="myorderform" name="myorderform" method="post" class="form-group">
                                <?
              echo "<br>";
              echo "<table id='myorder' name='myorder' border='2' width='800' align='center' bordercolor='#B7BAB4'>";
              echo "<tr align='center'>";
              echo "<td style='color:#A2B8DB; font-weight:bold;'>商品編號,規格及數量</td>" .
                   /*"<td style='color:#A2B8DB; font-weight:bold;'>結帳金額</td>" .*/
                   "<td style='color:#A2B8DB; font-weight:bold;'>備註</td>" .
                   "<td style='color:#A2B8DB; font-weight:bold;'>下單時間</td>" .
                   "<td style='color:#A2B8DB; font-weight:bold;'>訂單狀態</td>";
              echo "</tr>";

              $sql = "SELECT * FROM orders WHERE account='" . $_SESSION['user_id'] . "'";
              if ( $result = mysqli_query($link, $sql) ) {
                  $total_records = mysqli_num_rows($result);
                  for($j = 1; $j <= $total_records; $j++){
                    $row = mysqli_fetch_assoc($result);
                    echo "<tr align='center'>";
                      echo "<td>" . $row["orders"] . "</td>";
                      /*echo "<td>" . <script>total_money</script> . "</td>";*/
                      echo "<td>" . $row["ps"] . "</td>";
                      echo "<td>" . $row["time"] . "</td>";
                      echo "<td>" . $row["arrive"] . "</td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result); // 釋放佔用的記憶體
              }

              echo "</table>";
            ?>
                            </form>
                        </div>
                    </div>
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
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>

    </html>
