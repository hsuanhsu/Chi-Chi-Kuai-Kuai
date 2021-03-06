<?
session_start();
$link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

if (!$_GET["Id"])
    $id = 1;
else
    $id = $_GET["Id"];

$sql_class = "SELECT p_class_name FROM p_class a, product b where a.p_class_id = b.p_class_id and b.p_id = $id";
$sql_product = "SELECT * FROM product where p_id = $id";
$sql_img = "SELECT * FROM p_img where p_id = $id";
?>

<?
$file = fopen("people.txt","r");
$num = fgets($file);
$num++;

$str = "" + $num;
$len = strlen($str);

$file = fopen("people.txt","w");
fwrite($file,$num);
fclose($file);
?>

<!DOCTYPE html>
<html>

    <head>

        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 最新資訊</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <link rel="stylesheet" href="assets/css/ShopShow.css">
        <link rel="stylesheet" href="assets/css/MagicZoom.css">

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


        <!-- top picture-->
        <br><br><br>
        <div class="container">
            <div class="row">
                <h1><a href="index.html">奇&nbsp;奇&nbsp;怪&nbsp;怪</a></h1>
            </div>
        </div>
        <!-- top picture end-->


        <!-- marquee -->
        <div class="container extra_mr">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" align=l eft>
                        <marquee behavior="scroll" style="letter-spacing: 5px;">奇奇怪怪神秘活動來襲!&nbsp;&nbsp;&nbsp;活動將從6/26開始&nbsp;&nbsp;&nbsp;神秘獎品等你來拿!</marquee>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumbs end -->

        <!-- left column -->
        <div class="content-wrapper">
            <div id="bodyContent">
                <div class="container">
                    <div id="columnLeft" class="col-xs-3">
                        <div row>
                            <div class="module colmn-categories">
                                <h3 class="module-heading">商品分類</h3>
                                <ul>
                                    <li class="first-level"><a href="product_list.php?Id=1">兒童玩具</a></li>
                                    <li class="first-level"><a href="product_list.php?Id=2">電子產品</a></li>
                                    <li class="first-level"><a href="product_list.php?Id=3">派對小物</a></li>
                                    <li class="first-level"><a href="product_list.php?Id=4">實用小物</a></li>
                                </ul>
                            </div>
                        </div>
                        <div row>
                            <div class="module colmn-categories">
                                <h3 class="module-heading">在線人數</h3>
                                <span>巴拉巴拉巴拉巴拉</span>
                            </div>
                        </div>
                        <div row>
                            <div class="module colmn-categories">
                                <h3 class="module-heading">訪客總人數</h3>
                                <span style="font-size:40px; font-weight:bold;"><? echo substr($str,0,1)?></span>
                                <span style="font-size:25px; font-weight:normal;"><? echo substr($str,1,$len-1)?></span>
                            </div>
                        </div>
                    </div>
                    <!-- center column -->
                    <div id="centerColumn" class="col-xs-9">
                        <div row>
                            <div class="module">
                                <h3 class="module-heading">活動資訊</h3>
                                <div align="center">
                                    盡速把握最後機會喔!!
                                </div>
                                <br>
                                <div>
                                    <img src = "assets/img/new/3.jpg" width="604" height="825">
                                </div>
                            </div>
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
                        <div class="scroll-to-top">
                            <a class="scroll-link" href="#top-content"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 footer-copyright">
                        &copy; Chi Chi Kuai Kuai by <a href="aboutus.php">C.S.Lin & H.C.Hsu</a>.
                    </div>
                    <div class="col-sm-5 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
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
        <script src="assets/js/gridlist.js"></script>

        <script src="assets/js/MagicZoom.js"></script>
        <script src="assets/js/ShopShow.js"></script>

        <script>
            $(document).ready(function() {
                $('#myCarousel').carousel({
                    interval: 3000,
                    cycle: true
                });
            });

        </script>


        <!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
        <? mysqli_close($link); ?>
    </body>

</html>
