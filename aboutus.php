<?
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 About Us</title>
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
                        <p style="font-size:40px; color:#666666; font-weight:bold;">關於我們</p>
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#CK">Chi Chi Kuai Kuai</a></li>
                        <li><a data-toggle="tab" href="#CS">C.S.Lin</a></li>
                        <li><a data-toggle="tab" href="#HC">H.C.Hsu</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="CK" class="tab-pane fade in active">
                            <h3>Chi Chi Kuai Kuai</h3>
                            <img src="assets/img/aboutus/CK.jpg" class="img-circle" alt="Chi Chi Kuai Kuai" width="200" height="200"> <br>
                            </br>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Strange</span>.</p>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Professional</span>.</p>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Imfactful</span>.</p>
                            <p style="font-size:16px; color:#666666;">Don’t listen to what others say about you.</p>
                            <p style="font-size:16px; color:#666666;">Lead your own life.</p>
                            <br></br>
                            <p style="font-size:16px; color:#666666;">Hello, We are Chi Chi Kuai Kuai.</p>
                            <p style="font-size:16px; color:#666666;">Provide customized and efficient service.</p>
                        </div>
                        <div id="CS" class="tab-pane fade">
                            <h3>C.S.Lin</h3>
                            <img src="assets/img/aboutus/CS.png" class="img-circle" alt="C.S. Lin" width="200" height="200"> <br>
                            </br>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Fearless</span>.</p>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Extraordinary</span>.</p>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">One-of-a-kind</span>.</p>
                            <p style="font-size:16px; color:#666666;">To be, or not to be.</p>
                            <p style="font-size:16px; color:#666666;">Everything depends on yourself.</p>
                            <br></br>
                            <p style="font-size:16px; color:#666666;">Hello, I'm C.S. Lin.</p>
                            <p style="font-size:16px; color:#666666;">A strange but friendly girl.</p>
                        </div>
                        <div id="HC" class="tab-pane fade">
                            <h3>H.C.Hsu</h3>
                            <img src="assets/img/aboutus/HC.png" class="img-circle" alt="H.C.Hsu" width="200" height="200"> <br>
                            </br>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Special</span>.</p>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Sincere</span>.</p>
                            <p style="font-size:16px; color:#666666;">Be <span style="font-size:16px; color:red;">Sanguine</span>.</p>
                            <p style="font-size:16px; color:#666666;">Wisdom is more precious than wealth.</p>
                            <p style="font-size:16px; color:#666666;">But still love MONEY.</p>
                            <br></br>
                            <p style="font-size:16px; color:#666666;">Hello, I'm H.C. Hsu.</p>
                            <p style="font-size:16px; color:#666666;">A strange but elegant girl.</p>
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
