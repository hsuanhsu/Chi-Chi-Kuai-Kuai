<?
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if (!$_GET["Id"])
      $id = 1;
  else
      $id = $_GET["Id"];

  $hot = array(3, 7, 11, 15, 24); // 本月熱門的5個商品編號
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
        <link rel="stylesheet" href="assets/css/stylesheet_owl.carousel.css">
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
        <!-- Loader -->
        <div class="loader">
            <div class="loader-img"></div>
        </div>
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
            <div class="col-md-9"> <a class="scroll-link" href="#top-content">首頁</a> <a href="aboutus.php">關於我們</a> <span class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">商品分類<b class="caret"></b></a>
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
        <!-- Top content -->
        <div class="top-content">
            <div class="top-content-text wow fadeInUp">
                <div class="divider-2"><span></span></div>
                <h1><a href="">奇&nbsp;奇&nbsp;怪&nbsp;怪</a></h1>
                <div class="divider-2"><span></span></div>
                <p>什麼都賣! 什麼都奇怪!</p>
                <div class="top-content-bottom-link"> <a class="big-link-1" href="product_list.php">Shop now!</a> </div>
            </div>
        </div>
        <!-- Our process -->
        <div class="block-1-container process-container section-container section-container-gray">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 block-1 section-description wow fadeIn">
                        <h2>最新資訊</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <p> 來看看我們有那些活動吧! </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 block-1-left wow fadeInLeft">
                        <div id="myCarousel" class="carousel slide" style="width:500px; height:300px;">
                            <!-- 轮播（Carousel）指标 -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- 轮播（Carousel）项目 -->
                            <div class="carousel-inner">
                                <div class="item active"> <img src="assets/img/new/01.jpg" alt="First slide" width="500" height="300"> </div>
                                <div class="item"> <img src="assets/img/new/02.jpg" alt="Second slide" width="500" height="300"> </div>
                                <div class="item"> <img src="assets/img/new/03.jpg" alt="Third slide" width="500" height="300"> </div>
                            </div>
                            <!-- 轮播（Carousel）导航 -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo; </a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo; </a> </div>
                    </div>
                    <div class="col-sm-6 block-1-right wow fadeInUp">
                        <h3>夏季大出清</h3>
                        <a href="new1.php" style="font-size: 20px;">80000件商品一件不留! 2折起 [詳情]</a>
                        <h3>奇奇怪怪血拼fun暑假</h3>
                        <a href="new2.php" style="font-size: 20px;">活動持續整整六天 [詳情]</a>
                        <h3>奇奇怪怪神秘活動</h3>
                        <a href="new3.php" style="font-size: 20px;">神秘獎品等你來拿 [詳情]</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counters -->
        <div class="counters-container section-container section-container-full-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 counter-box wow fadeInUp">
                        <h4>超過1000萬</h4>
                        <p>點閱率</p>
                    </div>
                    <div class="col-sm-3 counter-box wow fadeInDown">
                        <h4>超過100萬人</h4>
                        <p>按讚</p>
                    </div>
                    <div class="col-sm-3 counter-box wow fadeInUp">
                        <h4>超過10萬種</h4>
                        <p>商品</p>
                    </div>
                    <div class="col-sm-3 counter-box wow fadeInDown">
                        <h4>超過1歲的</h4>
                        <p>兩個製作人</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio -->
        <div class="portfolio-container section-container">
            <div class="container">
                <div class="col-md-3 column"> <br>
                    <br>
                    <br>
                    <br>
                    <div class="list-group">
                        <ul>
                            <?
                $p_class_count=mysqli_num_rows(mysqli_query($link, "SELECT * FROM p_class"));
                $p_total_count=mysqli_num_rows(mysqli_query($link, "SELECT * FROM product"));
            ?>
                                <li class="list-group-item disabled">商品目錄<span class="badge"><?echo $p_total_count;?></span></li>
                                <?
                for ($i = 1; $i <= $p_class_count; $i++)
                {
                    $result = mysqli_query($link, "SELECT * FROM p_class where p_class_id = $i");
                    $row = mysqli_fetch_assoc($result);
                    $p_count = mysqli_num_rows(mysqli_query($link, "SELECT * FROM product where p_class_id = $i"));
            ?>
                                    <li class="list-group-item">
                                        <a href="product_list.php?Id=<?echo $i;?>">
                                            <?echo $row["p_class_name"];?>
                                        </a>
                                        <span class="badge"><?echo $p_count;?></span>
                                    </li>
                                    <?
                }
                mysqli_free_result($result);
            ?>
                        </ul>
                        <br>
                        <ul class="items">
                            <li class="list-group-item disabled">本月熱門</li>
                            <?
                    for ( $i = 0; $i < count($hot); $i++)
                    {
                        if ($result = mysqli_query($link, "SELECT * FROM p_img where p_id = $hot[$i]"))
                        {
                            $row = mysqli_fetch_assoc($result);

                ?>
                                <li class="list-group-item">
                                    <a href="product_info.php?Id=<?echo $hot[$i];?>" class="product-image">
                                        <img src="assets/img/products/<?echo $hot[$i];?>-1.jpg" alt="Sample Product " width="160" height="160">
                                    </a>
                                    <?

                        }
                        mysqli_free_result($result);

                        if ($result = mysqli_query($link, "SELECT * FROM product where p_id = $hot[$i]"))
                        {
                            $row = mysqli_fetch_assoc($result)

                ?>
                                        <div class="product-details">
                                            <p class="product-name">
                                                <a href="product_info.php?Id=<?echo $hot[$i];?>">
                                                    <?echo $row["p_name"];?>
                                                </a>
                                            </p>
                                            <span class="price text-primary">$<?echo $row["p_cost"];?></span>
                                            <div class="rate text-warning">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                </li>
                                <?

                            mysqli_free_result($result);
                        }
                     }
                ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1 column"></div>
                <div class="col-md-8 column">
                    <div class="row">
                        <div class="col-sm-11 portfolio section-description wow fadeIn">
                            <h2>主打商品</h2>
                            <div class="divider-1 wow fadeInUp"><span></span></div>
                            <p> 我們有最驕傲的產品 </p>
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="page-heading">新品推薦</h2>
                        <div class="block-content home_new">
                            <ul id="owl" class="row product-listing grid owl-carousel">
                                <?
                    $result=mysqli_query($link, "SELECT * FROM product");
                    $p_count=mysqli_num_rows($result);

                    for ( $i = 0; $i < 6; $i++)
                    {
                        $temp = $p_count - $i;
                        if ($result = mysqli_query($link, "SELECT * FROM p_img where p_id = $temp"))
                        {
                            $row = mysqli_fetch_assoc($result);
                ?>
                                    <div class="product-container">
                                        <div class="product-image-box">
                                            <a class="product-image" href="product_info.php?Id=<?echo $temp;?>">
                                        <img  src="assets/img/products/<?echo $temp;?>-1.jpg" width="200" height="200" />
                                    </a>
                                        </div>
                                        <?

                        }
                        mysqli_free_result($result);

                        if ($result = mysqli_query($link, "SELECT * FROM product where p_id = $temp"))
                        {
                            $row = mysqli_fetch_assoc($result);

                ?>
                                            <div class="product-content-wrap">
                                                <div class="product-content">
                                                    <a class="product-name listing" href="product_info.php?Id=<?echo $temp;?>">
                                                        <?echo $row["p_name"];?>
                                                    </a>
                                                    <div class="info-price product-info-row">
                                                        <span class="info-text">Price:</span>
                                                        <span class="product-price"><span class="price">$<?echo $row["p_cost"];?></span></span>
                                                    </div>
                                                </div>
                                                <div class="button-container">
                                                    <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=<? echo $row['p_id']?>">Add to Cart</a>
                                                    <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=<?echo $temp;?>">View</a>
                                                </div>
                                            </div>
                                    </div>
                                    <?

                            mysqli_free_result($result);
                        }
                     }
                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <h2 class="page-heading">活動促銷</h2>
                        <div class="block-content home_new">
                            <ul id="owl-1" class="row product-listing grid owl-carousel">
                                <!-- 商品18 -->
                                <div class="product-container">
                                    <div class="product-image-box">
                                        <a class="product-image" href="product_info.php?Id=18">
                                            <img src="assets/img/products/18-1.jpg" width="200" height="200" />
                                        </a>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-content">
                                            <a class="product-name listing" href="product_info.php?Id=18">造型酒桶藍芽行動喇叭</a>
                                            <div class="info-price product-info-row">
                                                <span class="info-text">Price:</span>
                                                <span class="product-price">
                        <span class="price">$390</span>
                                                <del class="old-price price">$420</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-container">
                                            <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=18">Add to Cart</a>
                                            <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=18">View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 商品22 -->
                                <div class="product-container">
                                    <div class="product-image-box">
                                        <a class="product-image" href="product_info.php?Id=22">
                                            <img src="assets/img/products/22-1.jpg" width="200" height="200" />
                                        </a>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-content">
                                            <a class="product-name listing" href="product_info.php?Id=22">韓版迷你雙封口零食餅乾拉鍊零錢包/卡片包</a>
                                            <div class="info-price product-info-row">
                                                <span class="info-text">Price:</span>
                                                <span class="product-price">
                        <span class="price">$39</span>
                                                <del class="old-price price">$45</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-container">
                                            <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=22">Add to Cart</a>
                                            <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=22">View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 商品28 -->
                                <div class="product-container">
                                    <div class="product-image-box">
                                        <a class="product-image" href="product_info.php?Id=28">
                                            <img src="assets/img/products/28-1.jpg" width="200" height="200" />
                                        </a>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-content">
                                            <a class="product-name listing" href="product_info.php?Id=28">地中海風七彩變色LED小夜燈</a>
                                            <div class="info-price product-info-row">
                                                <span class="info-text">Price:</span>
                                                <span class="product-price">
                        <span class="price">$100</span>
                                                <del class="old-price price">$149</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-container">
                                            <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=28">Add to Cart</a>
                                            <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=28">View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 商品30 -->
                                <div class="product-container">
                                    <div class="product-image-box">
                                        <a class="product-image" href="product_info.php?Id=30">
                                            <img src="assets/img/products/30-1.jpg" width="200" height="200" />
                                        </a>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-content">
                                            <a class="product-name listing" href="product_info.php?Id=30">防燙碗夾小工具</a>
                                            <div class="info-price product-info-row">
                                                <span class="info-text">Price:</span>
                                                <span class="product-price">
                        <span class="price">$120</span>
                                                <del class="old-price price">$190</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-container">
                                            <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=30">Add to Cart</a>
                                            <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=30">View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 商品16 -->
                                <div class="product-container">
                                    <div class="product-image-box">
                                        <a class="product-image" href="product_info.php?Id=16">
                                            <img src="assets/img/products/16-1.jpg" width="200" height="200" />
                                        </a>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-content">
                                            <a class="product-name listing" href="product_info.php?Id=16">美少女戰士行動電源</a>
                                            <div class="info-price product-info-row">
                                                <span class="info-text">Price:</span>
                                                <span class="product-price">
                        <span class="price">$2899</span>
                                                <del class="old-price price">$3190</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-container">
                                            <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=16">Add to Cart</a>
                                            <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=16">View</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 商品25 -->
                                <div class="product-container">
                                    <div class="product-image-box">
                                        <a class="product-image" href="product_info.php?Id=25">
                                            <img src="assets/img/products/25-1.jpg" width="200" height="200" />
                                        </a>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-content">
                                            <a class="product-name listing" href="product_info.php?Id=25">多功能工作桌</a>
                                            <div class="info-price product-info-row">
                                                <span class="info-text">Price:</span>
                                                <span class="product-price">
                        <span class="price">$799</span>
                                                <del class="old-price price">$850</del>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-container">
                                            <a id="tdb10" class="cart btn btn-primary" href="addcart.php?pid=25">Add to Cart</a>
                                            <a id="tdb11" class="info btn btn-default" href="product_info.php?Id=25">View</a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Contact us -->
        <div class="contact-container section-container section-container-gray">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 contact section-description wow fadeIn">
                        <h2>Contact us</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <p> Any question? </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 contact-form wow fadeInLeft">
                        <form role="form" action="contact.php" method="post">
                            <div class="form-group">
                                <label class="sr-only" for="contact-email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="contact-email" id="contact-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="contact-subject">Subject</label>
                                <input type="text" name="subject" placeholder="Subject..." class="contact-subject" id="contact-subject">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="contact-message">Message</label>
                                <textarea name="message" placeholder="Message..." class="contact-message" id="contact-message"></textarea>
                            </div>
                            <button type="submit" class="btn">Send message</button>
                        </form>
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
        <script>
            $(document).ready(function() {
                $('#myCarousel').carousel({
                    interval: 3000,
                    cycle: true
                });
            });

        </script>

        <!-- owl-carousel -->
        <script type="text/javascript" src="assets/js/jscript_owl.carousel.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#owl").owlCarousel({
                    items: 4,
                    itemsDesktop: [1299, 4],
                    itemsTablet: [995, 4],
                    itemsTabletSmall: [767, 4],
                    itemsMobile: [479, 3],
                    lazyLoad: true,
                    pagination: true,
                    navigation: true,
                    addClassActive: true
                });

            });
            $(document).ready(function() {
                $("#owl-1").owlCarousel({
                    items: 4,
                    itemsDesktop: [1299, 4],
                    itemsTablet: [995, 4],
                    itemsTabletSmall: [767, 4],
                    itemsMobile: [479, 3],
                    lazyLoad: true,
                    pagination: true,
                    navigation: true,
                    addClassActive: true
                });
            });

        </script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

        <? mysqli_close($link); ?>
    </body>

    </html>
