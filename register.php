<?
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if (isset($_POST['account']))
  {
    $sql="insert into general values ('','" . $_POST['name'] . "','" . $_POST['account'] . "','" . $_POST['pwd'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['address'] . "')";

    if ( $result = mysqli_query($link, $sql) ){ // 送出查詢的SQL指令
      $sql2="insert into cart values ('" . $_POST['account'] . "','')";
      if ( $result = mysqli_query($link, $sql2) )
        echo "<script>alert('會員註冊成功！將導至會員登入頁面。'); location.href = 'login.php';</script>";
    }

    mysqli_close($link); // 關閉資料庫連結
  }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 Member Register</title>
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
                    <div class="section-description wow rubberBand"> <br>
                        <p style="font-size:40px; color:#666666; font-weight:bold;">會員註冊</p>
                    </div>
                </div>
                <br>
                </br>
                <div class="row">
                    <form action="" id="register" name="register" method="post" class="form-group">
                        <div class="col-sm-12">
                            <div class="col-sm-3"></div>
                            <div class="col-md-6 fadeInUp">
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter Your Name">
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="account">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帳號&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                    <input id="account" type="text" class="form-control" name="account" placeholder="Enter Your Account(6-12)">
                                    <span id="show_msg" class="error"></span>
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="pwd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密碼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                    <input id="pwd" type="password" class="form-control" name="pwd" placeholder="Enter Your Password(6-15)">
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="pwd2">&nbsp;密碼確認</label>
                                    </span>
                                    <input id="pwd2" type="password" class="form-control" name="pwd2" placeholder="Enter Your Password Again">
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="email">&nbsp;&nbsp;&nbsp;&nbsp;E-mail&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Enter Your E-mail">
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="phone">&nbsp;連絡電話</label>
                                    </span>
                                    <input id="phone" type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number">
                                </div>
                                <div class="input-group"> <span class="input-group-addon">
                                    <label for="address">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </span>
                                    <input id="address" type="text" class="form-control" name="address" placeholder="Enter Your Address">
                                </div>
                                <br>
                                </br>
                                <div class="input-group"> <span class="input-group-addon">
                                <label for="contract">會員使用條款</label>
                                </span></div>
                                <textarea class="form-control" rows="5" id="contract" name="contract" disabled>1.奇奇怪怪係依據本服務條款提供奇奇怪怪服務 (以下簡稱「本服務」)。當會員完成奇奇怪怪之會員註冊手續、或開始使用本服務時，即表示已閱讀、瞭解並同意接受本服務條款之所有內容，並完全接受本服務現有與未來衍生的服務項目及內容。博客來公司有權於任何時間修改或變更本服務條款之內容，修改後的服務條款內容將公佈網站上，博客來將不會個別通知會員，建議會員隨時注意該等修改或變更。會員於任何修改或變更後繼續使用本服務時，視為會員已閱讀、瞭解並同意接受該等修改或變更。若不同意上述的服務條款修訂或更新方式，或不接受本服務條款的其他任一約定，會員應立即停止使用本服務。
2.若會員為未滿二十歲之未成年人，應於會員的家長（或監護人）閱讀、瞭解並同意本約定書之所有內容及其後修改變更後，方得註冊為會員、使用或繼續使用本服務。當會員使用或繼續使用博客來時，即推定會員的家長（或監護人）已閱讀、瞭解並同意接受本約定書之所有內容及其後修改變更。
3.會員及奇奇怪怪雙方同意使用本服務之所有內容包括意思表示等，以電子文件作為表示方式。</textarea>
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox" value="" id="agreement" name="agreement">
                                    我同意會員使用條款</label>
                                    </tr>
                                    <br>
                                    </br>
                                    <label class="error" for="agreement"></label>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <br>
                        </br>
                        <br>
                        </br>
                        <div class="col-sm-12">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 已經是會員了嗎？會員登入<a href="login.php" class="alert-link"><strong>請點我</strong></a> </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <br>
                        </br>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-default btn-sm">Register</button>
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
            $(function() { //網頁完成後才會載入
                $('#account').keyup(function() {
                    $.ajax({
                        url: "ajx_check_account_jquery.php",
                        data: $('#register').serialize(),
                        type: "POST",
                        dataType: 'text',
                        success: function(msg) {
                            $("#show_msg").html(msg); //顯示訊息
                            //document.getElementById('show_msg').innerHTML= msg ;
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                        }
                    });
                });
            });

        </script>
        <script>
            $(document).ready(function($) {
                $("#register").validate({
                    submitHandler: function(form) {
                        form.submit();
                    },
                    rules: {
                        name: {
                            required: true
                        },
                        account: {
                            required: true,
                            minlength: 6,
                            maxlength: 12
                        },
                        pwd: {
                            required: true,
                            minlength: 6,
                            maxlength: 15
                        },
                        pwd2: {
                            required: true,
                            equalTo: "#pwd"
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                        },
                        address: {
                            required: true,
                        },
                        agreement: {
                            required: true,
                        }
                    },
                    messages: {
                        name: {
                            required: "Please enter your name !!"
                        },
                        account: {
                            required: "Please enter your account !!",
                            minlength: "The min length of account is 6",
                            maxlength: "The max length of account is 12"
                        },
                        pwd: {
                            required: "Please enter your password !!",
                            minlength: "The max length of password is 6",
                            maxlength: "The max length of password is 15"
                        },
                        pwd2: {
                            required: "Please enter your password again !!",
                            equalTo: "You enter a differrent password !!"
                        },
                        email: {
                            required: "Please enter your E-mail !!",
                            email: "It's a wrong E-mail format !!"
                        },
                        phone: {
                            required: "Please enter your phone number !!"
                        },
                        address: {
                            required: "Please enter your address !!"
                        },
                        agreement: {
                            required: "Please agree the membership contract !!"
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
