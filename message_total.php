<?php
session_start();
$link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");


//如果沒有登入的SESSION，就轉址
/*if (isset($_SESSION['user_id']) == FALSE) {
    header('Location: login.php');
}*/
?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 Message</title>
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
                    echo "<span class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>" . $name . "，歡迎<b class='caret'></b></a>
                            <ul class='dropdown-menu'>
                                <li><a href='member_centre.php'>會員中心</a></li>
                                <li><a href='session_logout.php'>登出</a></li>
                            </ul>
                          </span>";
                }
                ?>
                    <a href="cart.php">購物車</a> <a href="message_total.php">留言版</a>
                    <div class="hide-menu"> <a href=""><i class="fa fa-bars"></i></a> </div>
            </div>
        </nav>
        <div class="show-menu"> <a href=""><i class="fa fa-bars"></i></a> </div>

        <!-- message -->

        <div class="container">
            <div class="row">
                <div class="section-description"> <br>
                    <p style="font-size:40px; color:#666666; font-weight:bold;">留言板</p>
                </div>
            </div>
            <br>
            <?
            if (isset($_SESSION['user_id']) == FALSE)
            {
                echo "<div class=\"row\">
                        <div class=\"alert alert-danger alert-dismissable\">
                            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> 會員登入
                            <a href=\"login.php\" class=\"alert-link\"><strong>請點我</strong></a>
                        </div>
                      </div>";
            }
            ?>
                <p class="pull-right">以
                    <?
                    if ($_SESSION['user_id'] == "llcshan96")
                        echo "辰姍";
                    else if ($_SESSION['user_id'] == "dankong")
                        echo "瑄筑";
                    else if (isset($_SESSION['user_id']))
                        echo $name;
                    else
                        echo "訪客";
                    ?>
                                        的身份留言</p>
                <h4 align = "left">新增留言</h4>
                <form action="message_add.php" method="post">
                    <textarea name="msg" class="form-control"></textarea>
                    <br>
                    <input type="submit" name="submit" value="送出" class="btn btn-primary btn-sm pull-right">
                </form>
                <br>
                <hr>
                <div  align = "left">
            <?
            $result = mysqli_query($link, "SELECT * FROM message ORDER BY id ASC"); // ASC大到小 // DESC
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_array($result))
                {
                    $memberRe = mysqli_query($link, "SELECT * FROM general WHERE no='". $row['guest_id'] . "'");
                    $memberRow = mysqli_fetch_array($memberRe);
                    echo "<div class=\"panel panel-default\">
                            <div class=\"panel-heading\">";
                   // echo $_SESSION['name'];
                    if ($memberRow)
                        echo $memberRow['name'];
                    else if ($row['guest_id'] == 15)
                        echo "辰姍";
                    else if ($row['guest_id'] == 16)
                        echo "瑄筑";
                    else
                        echo "訪客";
                    echo        "<span class=\"pull-right\">$row[date]&nbsp;";
                    if (($_SESSION['user_id'] == "dankong" || $_SESSION['user_id'] == "llcshan96") || ($_SESSION['user_id'] != null && $memberRow['name'] == $_SESSION['name']))
                        echo        "<a href=\"message_del.php?id=$row[id]\" class=\"btn btn-danger btn-xs\">DELETE</a>";
                    echo        "</span>
                            </div>
                            <div class=\"panel-body\"> $row[content]</div>
                          </div>";
                }
            }
            else
            {
                echo "<p class=\"text-center\">沒有任何訊息！</p>";
            }
            ?>
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
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <!--中文錯誤訊息-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
        <style type="text/css">


        </style>
        <!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
    </body>

    </html>
