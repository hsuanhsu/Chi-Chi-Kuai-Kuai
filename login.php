<?php
session_start();
$link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$acc = $_POST['account'];
$pwd = $_POST['pwd'];

if(empty($_SESSION['user_id'])){
  if(!empty($_POST['account'])){
    if ($result = mysqli_query($link, "SELECT * FROM administrator")) // 先搜尋是否為使用者
    {
        while ($row = mysqli_fetch_assoc($result))
        {
                if ($acc == $row["account"]){
                  if($pwd == $row["password"]){
                    $_SESSION['user_id'] = $_POST['account'] ;
                    exit(header("Location: index.php"));
                  }
                }
                else{
                  $msg = "帳號或密碼輸入錯誤!!!";
                }
        }
        mysqli_free_result($result);
    }

    if ($result = mysqli_query($link, "SELECT * FROM general")) // 後搜尋是否為會員
    {
        while ($row = mysqli_fetch_assoc($result))
        {
                if ($acc == $row["account"]){
                  if($pwd == $row["password"]){
                    $_SESSION['user_id'] = $_POST['account'];
                    $_SESSION['no_id'] = $row['no'];
                    $_SESSION['name'] = $row['name'];
                    exit(header("Location: index.php"));
                  }
                }
                else {
                  $msg = "帳號或密碼輸入錯誤!!!";
                }
        }
        mysqli_free_result($result);
    }
  }
}
else
  echo "<script>alert('您已登入，如要使用其他帳號請先登出再登入！'); location.href = 'index.php';</script>";
?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 Log In</title>
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
                        <p style="font-size:40px; color:#666666; font-weight:bold;">會員登入</p>
                    </div>
                </div>
                <br>
                </br>
                <div class="row">
                    <form id="login" name="login" method="POST" class="form-group" action="">
                        <div class="col-sm-12">
                            <div class="col-sm-4"></div>
                            <div class="col-md-4 fadeInUpBig">
                                <div class="input-group"> <span class="input-group-addon">
              <label for="account"><i class="glyphicon glyphicon-user"></i></label>
              </span>
                                    <input id="account" type="text" class="form-control" name="account" placeholder="Enter Your Account">
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
              <label for="pwd"><i class="glyphicon glyphicon-lock"></i></label>
              </span>
                                    <input id="pwd" type="password" class="form-control" name="pwd" placeholder="Enter Your Password">
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        <br>
                        </br>
                        <div class="col-sm-12">
                            <span style="color:#D82424; font-weight:bold; font-size:15px;"><? echo $msg?></span>
                        </div>
                        <br>
                        </br>
                        <div class="col-sm-12">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 還不是會員嗎？會員註冊<a href="register.php" class="alert-link"><strong>請點我</strong></a> </div>
                                <div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 忘記密碼了嗎？忘記密碼<a href="forget_pwd.php" class="alert-link"><strong>請點我</strong></a> </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <br>
                        </br>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-default btn-sm">Log In</button>
                        </div>
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
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <!--中文錯誤訊息-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
        <script>
            $(document).ready(function($) {
                $("#login").validate({
                    submitHandler: function(form) {
                        form.submit();
                    },
                    rules: {
                        account: {
                            required: true,
                        },
                        pwd: {
                            required: true,
                        }
                    },
                    messages: {
                        account: {
                            required: "Please enter your account !!",
                        },
                        pwd: {
                            required: "Please enter your password !!",
                        }
                    }
                });
            });

        </script>
        <style type="text/css">
            .error {
                color: #D82424;
                font-weight: bold;
                font-family: "微軟正黑體";
                display: inline;
            }

        </style>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>

    </html>
