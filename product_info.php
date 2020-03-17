<?
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if (!$_GET["Id"])
      $id = 1;
  else
      $id = $_GET["Id"];
  if (!$_GET["C"])
      $C = 1;
  else
      $C = $_GET["C"];

  $sql_class = "SELECT p_class_name FROM p_class a, product b where a.p_class_id = b.p_class_id and b.p_id = $id";
  $sql_product = "SELECT * FROM product where p_id = $id";
  $sql_img = "SELECT * FROM p_img where p_id = $id";
?>

<? // 訪客總人數
  $file = fopen("people.txt","r");
  $num = fgets($file);
  $num++;
  $str = "" + $num;
  $len = strlen($str);
  $file = fopen("people.txt","w");
  fwrite($file,$num);
  fclose($file);
?>

<? // 在線人數
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  $timeoutseconds = 300; //存活時間，以秒計算
  $online_time = time(); //現在時間
  $timeout = $online_time-$timeoutseconds; //清除紀錄的時間差標準

  $check_select="SELECT * FROM online_user WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'";
  if ($result = mysqli_query($link, $check_select)){
    $total_records=mysqli_num_rows($result);
  }


  if($total_records == 0){ //驗證回傳是否為空
      $insert = "INSERT INTO online_user VALUES('" . $online_time . "','" . $_SERVER['REMOTE_ADDR'] . "')";
      $result2=mysqli_query($link, $insert);
      if(!($result2)) {
          echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤0";
      }
  }else{
      //不為空則更新在線時間
      $update = "UPDATE online_user SET online_time=" . $online_time . " WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'";
      $result2=mysqli_query($link, $update);
      if(!($result2)) {
          echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";
      }
  }

  $delete = "DELETE FROM online_user WHERE online_time < " . $timeout; //清除小於$timeout的值
  $result3=mysqli_query($link, $delete);
  if(!($result3)) {
      echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";
  }

  $select = "SELECT count(ip) FROM online_user"; //搜尋所有現存ip，統計人數
  $result4=mysqli_query($link, $select);
  if(!($result4)) {
      echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";
  }
  while($row=mysqli_fetch_array($result4)){
      $user_nums=$row['count(ip)'];
  }
?>

        <!DOCTYPE html>
        <html>

        <head>

            <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>奇奇怪怪</title>

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


            <!-- breadcrumbs start -->
            <div class="container extra_mr">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="breadcrumb" align=left>
                            <li>商品分類</li>
                            <li>
                                <?
                  if ($result = mysqli_query($link, "SELECT * FROM p_class"))
                  {
                      while ($row = mysqli_fetch_assoc($result))
                      {
                           if ($C == $row["p_class_id"])
                                echo $row["p_class_name"];
                      }
                       mysqli_free_result($result);
                  }
              ?>
                            </li>
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
                                    <span style="font-size:25px; font-weight:normal;"><? echo $user_nums?><span>
                                </div>
                            </div>
                            <div row>
                                <div class="module colmn-categories">
                                    <h3 class="module-heading">訪客總人數</h3>
                                    <span style="font-size:40px; font-weight:bold;"><? echo substr($str,0,1)?><span>
          <span style="font-size:25px; font-weight:normal;"><? echo substr($str,1,$len-1)?><span>
				</div>
			</div>

			</div>
	<!-- center column -->
  <div id="centerColumn" class="col-xs-9">
<form class="form-group" name="cart_quantity" action="http://" method="post">
  <div class="product-info row">
    <div id="productImage" class="col-xs-4">
      <div id="tsShopContainer">
	<div id="tsImgS"><a href="assets/img/products/<?echo $id;?>-1.jpg" title="Images" class="MagicZoom" id="MagicZoom"><img width="300" height="300" src="assets/img/products/<?echo $id;?>-1.jpg" /></a></div>
	<div id="tsPicContainer">
		<div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
		<div id="tsImgSCon">
			<ul>
                <?
                    if ($result = mysqli_query($link, $sql_img))
                    {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result))
                        {
                ?>
                            <li onclick="showPic(<?echo $i;?>)" rel="MagicZoom"<?if($i==0) echo " class=\"tsSelectImg\"";?>><img height="42" width="42" src="assets/img/products/<?echo $id;?>-<?echo $i+1;?>.jpg" tsImgS="assets/img/products/<?echo $id;?>-<?echo $i+1;?>.jpg" /></li>

                <?
                            $i++;
                        }
                        mysqli_free_result($result);
                    }

                    if ($result = mysqli_query($link, $sql_product))
                    {
                        while ($row = mysqli_fetch_assoc($result))
                        {

                ?>
			</ul>
		</div>
		<div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
	</div>
	<img class="MagicZoomLoading" width="16" height="16" src="assets/img/loading.gif" alt="Loading..." />
</div>
    </div>
    <div class="col-xs-1"> </div>
    <div id="productInfo" class="col-xs-3">
      <h1 class="page-product-name"><?echo $row["p_name"];?><span class="productModel">產品編號:<?echo $row["p_id"];?></span></h1>
                                    <?echo $row["s_description"];?>
                                </div>

                                <div id="productActions" class="col-xs-4">
                                    <div class="product-action-inner">
                                        <div class="page-product-price price"><span class="price">$<?echo $row["p_cost"];?></span></div>
                                        <span style="font-size:15px;" align="center">此商品適用於本站優惠</span>
                                        <br></br>
                                        <span style="font-size:15px; color:red; font-weight:bold;">本月優惠：購物滿3000元，運費由我們出！</span>
                                        <br></br>
                                        <span style="font-size:15px;">規格及數量請於結帳時一並選擇</span>
                                        <br></br>
                                        <div class="buttonSet"> <span class="buttonAction">
                                          <input type="hidden" name="products_id" value="1" />
                                          <button id="tdb9" class="cart btn btn-primary" type="button" onclick="location.href='addcart.php?pid=<? echo $row['p_id']?>'">加入購物車</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>

                            <div row>
                                <div class="module">
                                    <h3 class="module-heading">產品簡介</h3>
                                    <div align="left">
                                        <h4 style="line-height: 30px;">
                                            <?echo $row["description"];?>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?
                        }
                        mysqli_free_result($result);
                    }
                    mysqli_close($link);
                ?>

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

        </body>

        </html>
