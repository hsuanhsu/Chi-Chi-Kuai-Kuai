<?
  session_start();
  $link = mysqli_connect("localhost","root","root123456","group_02") or die("無法開啟MySQL資料庫連結!");
  mysqli_query($link, 'SET CHARACTER SET utf8');
  mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

  if(!empty($_SESSION['user_id'])){
    if($_SESSION['user_id'] == "llcshan96" || $_SESSION['user_id'] == "dankong"){

    }
    else{
      echo "<script>alert('您非網站管理者，無法進入管理者頁面！'); location.href = 'index.php';</script>";
    }
  }
  else
    echo "<script>alert('您未進行登入，即將導至登入頁面！'); location.href = 'login.php';</script>";

  if(isset($_POST['submit1'])){
    $member=$_POST['member'];
    for($i=0; $i < count($member); $i++){
      $sql = "Delete from general where no='" . $member[$i] . "'";
      if ( $result = mysqli_query($link, $sql) ) // 送出查詢的SQL指令
        $msg1= "<span style='color:#0000FF'>資料刪除成功!</span>";
      else
        $msg1= "<span style='color:#FF0000'>資料刪除失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" .mysqli_error($link) ."</span>";
    }
  }

  if(isset($_POST['submit2'])){
    $product=$_POST['product'];
    for($i=0; $i < count($product); $i++){
      $sql = "Delete from product where p_id='" . $product[$i] . "'";
      if ( $result = mysqli_query($link, $sql) ) // 送出查詢的SQL指令
        $msg2= "<span style='color:#0000FF'>資料刪除成功!</span>";
      else
        $msg2= "<span style='color:#FF0000'>資料刪除失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" .mysqli_error($link) ."</span>";
    }
  }

  if(isset($_POST['submit3'])){
    $sql="insert into product values ('','" . $_POST['p_name'] . "','" . $_POST['p_cost'] . "','" . $_POST['description'] . "','" . $_POST['p_description'] .
    "','" . $_POST['p_class_id'] . "','" . $_POST['standard'] . "')";

    if ( $result = mysqli_query($link, $sql) ){ // 送出查詢的SQL指令
      if ( $result1 = mysqli_query($link, "SELECT * FROM product WHERE p_name='" . $_POST['p_name'] . "'") ) {
          $row = mysqli_fetch_assoc($result1);
          $p_id = $row['p_id'];
      }

      mysqli_query($link, "insert into p_img values ('" . $p_id . "','" .  $_FILES['p_img_url_1']['name'] . "')");
      if ($_FILES['p_img_url_2']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_2']['name']. "')");
      if ($_FILES['p_img_url_3']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_3']['name'] . "')");
      if ($_FILES['p_img_url_4']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_4']['name']. "')");
      if ($_FILES['p_img_url_5']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_5']['name'] . "')");
      if ($_FILES['p_img_url_6']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_6']['name'] . "')");
      if ($_FILES['p_img_url_7']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_7']['name'] . "')");
      if ($_FILES['p_img_url_8']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_8']['name'] . "')");
      if ($_FILES['p_img_url_9']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_9']['name'] . "')");
      if ($_FILES['p_img_url_10']['size'] > 0)
        mysqli_query($link, "insert into p_img values ('" . $p_id . "','" . $_FILES['p_img_url_10']['name'] . "')");

      echo "<script>alert('新增商品成功！'); location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
  }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>奇奇怪怪 Administrator Page</title>
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
                        <p style="font-size:40px; color:#666666; font-weight:bold;">管理者頁面</p>
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#Member">Member</a></li>
                        <li><a data-toggle="tab" href="#DeleteProduct">Delete Product</a></li>
                        <li><a data-toggle="tab" href="#AddProduct">Add Product</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="Member" class="tab-pane fade in active">
                            <form action="" id="db_general" name="db_general" method="post" class="form-group">
                                <?
                echo "<br>";
                echo "<table id='db1' name='db1' border='2' width='800' align='center' bordercolor='#B7BAB4'>";
                echo "<tr align='center'>";
                echo "<td><input type='checkbox' name='CheckAllM' id='CheckAllM'></td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>Name</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>Account</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>Password</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>E-mail</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>Phone</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>Address</td>";
                echo "</tr>";

                if ( $result = mysqli_query($link, "SELECT * FROM general") ) {
                    $total_records = mysqli_num_rows($result);
                    $total_page = ceil($total_records / 10);
                    mysqli_data_seek($result, ($_GET['page'] - 1) * 10);
                    for($j = 1; $j <= 10; $j++){
                      $row = mysqli_fetch_assoc($result);
                      echo "<tr align='center'>";
                        echo "<td><input type='checkbox' name='member[]' value='" . $row["no"] . "'></td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["account"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                      echo "</tr>";
                    }
                    mysqli_free_result($result); // 釋放佔用的記憶體
                    echo "<tr align='center'><td colspan='7'>";

                    for($i = 1; $i <= $total_page; $i++){
                      if($i == $_GET['page']) echo "$i&nbsp;&nbsp;";
                      else echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=$i'>$i</a>&nbsp;&nbsp;";
                    }
                    echo "</td></tr>";
                    echo "<tr align='center'><td colspan='7'>
                    <div id='message1' class='form-group'></div>
                    <br>
                    <button id='submit1' name='submit1' type='submit' class='btn btn-default btn-sm'>Delete</button><br></br>";
                    echo "<br>" . $msg1;
                    echo "</td></tr>";
                }

                echo "</table>";
              ?>
                            </form>
                        </div>
                        <div id="DeleteProduct" class="tab-pane fade">
                            <form action="" id="db_product" name="db_product" method="post" class="form-group">
                                <?
                echo "<br>";
                echo "<table id='db2' name='db2' border='2' width='800' align='center' bordercolor='#B7BAB4'>";
                echo "<tr align='center'>";
                echo "<td><input type='checkbox' name='CheckAllP' id='CheckAllP'></td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>P_ID</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>P_Name</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>P_Cost</td>" .
                     "<td style='color:#A2B8DB; font-weight:bold;'>P_Class_ID</td>";
                echo "</tr>";

                if ( $result = mysqli_query($link, "SELECT * FROM product") ) {
                    $total_records = mysqli_num_rows($result);
                    for($j = 1; $j <= $total_records; $j++){
                      $row = mysqli_fetch_assoc($result);
                      echo "<tr align='center'>";
                        echo "<td><input type='checkbox' name='product[]' value='" . $row["p_id"] . "'></td>";
                        echo "<td>" . $row["p_id"] . "</td>";
                        echo "<td>" . $row["p_name"] . "</td>";
                        echo "<td>$" . $row["p_cost"] . "</td>";
                        echo "<td>" . $row["p_class_id"] . "</td>";
                      echo "</tr>";
                    }
                    mysqli_free_result($result); // 釋放佔用的記憶體
                    echo "<tr align='center'><td colspan='7'>
                    <div id='message2' class='form-group'></div>
                    <br>
                    <button id='submit2' name='submit2' type='submit' class='btn btn-default btn-sm'>Delete</button><br></br>";
                    echo "<br>" . $msg2;
                    echo "</td></tr>";
                }

                echo "</table>";
              ?>
                            </form>
                        </div>
                        <br>
                        </br>
                        <div id="AddProduct" class="tab-pane fade">
                          <form action="" id="addproduct" name="addproduct" method="post" class="form-group" enctype='multipart/form-data'>
                              <div class="col-sm-12">
                                  <div class="col-sm-2"></div>
                                  <div class="col-md-8 fadeInUp">
                                      <div class="input-group"> <span class="input-group-addon">
                                          <label for="p_name">&nbsp;商品名稱</label>
                                          </span>
                                          <input id="p_name" type="text" class="form-control" name="p_name">
                                      </div>
                                      <div class="input-group"> <span class="input-group-addon">
                                          <label for="p_cost">&nbsp;商品金額</label>
                                          </span>
                                          <input id="p_cost" type="text" class="form-control" name="p_cost">
                                      </div>
                                      <div class="input-group"> <span class="input-group-addon">
                                          <label for="description">&nbsp;商品詳情</label>
                                          </span>
                                          <textarea id="description" name="description" rows="3" cols="55"></textarea>
                                      </div>
                                      <div class="input-group"> <span class="input-group-addon">
                                          <label for="p_description">&nbsp;商品簡介</label>
                                          </span>
                                          <textarea id="p_description" name="p_description" rows="3" cols="55"></textarea>
                                      </div>
                                      <div class="input-group"> <span class="input-group-addon">
                                          <label for="p_class_id">&nbsp;商品分類</label>
                                          </span>
                                          <input id="p_class_id" type="text" class="form-control" name="p_class_id">
                                      </div>
                                      <div class="input-group"> <span class="input-group-addon">
                                          <label for="standard">&nbsp;商品規格</label>
                                          </span>
                                          <input id="standard" type="text" class="form-control" name="standard">
                                      </div>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_1">商品圖片1</label>
                                          </span>
                                          <input id="p_img_url_1" name="p_img_url_1" type="file" class="form-control">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_2">商品圖片2</label>
                                          </span>
                                          <input id="p_img_url_2" name="p_img_url_2" type="file" class="form-control">
                                      </div>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_3">商品圖片3</label>
                                          </span>
                                          <input id="p_img_url_3" name="p_img_url_3" type="file" class="form-control">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_4">商品圖片4</label>
                                          </span>
                                          <input id="p_img_url_4" name="p_img_url_4" type="file" class="form-control">
                                      </div>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_5">商品圖片5</label>
                                          </span>
                                          <input id="p_img_url_5" name="p_img_url_5" type="file" class="form-control">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_6">商品圖片6</label>
                                          </span>
                                          <input id="p_img_url_6" name="p_img_url_6" type="file" class="form-control">
                                      </div>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_7">商品圖片7</label>
                                          </span>
                                          <input id="p_img_url_7" name="p_img_url_7" type="file" class="form-control">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_8">商品圖片8</label>
                                          </span>
                                          <input id="p_img_url_8" name="p_img_url_8" type="file" class="form-control">
                                      </div>
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_9">商品圖片9</label>
                                          </span>
                                          <input id="p_img_url_9" name="p_img_url_9" type="file" class="form-control" width="50px">
                                          <span class="input-group-addon">
                                          <label for="p_img_url_10" style="width:65px;">商品圖片10</label>
                                          </span>
                                          <input id="p_img_url_10" name="p_img_url_10" type="file" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-sm-2"></div>
                              </div>
                              <div class="col-sm-12">
                                  <br>
                                  <button id="submit3" name="submit3" type="submit" class="btn btn-default btn-sm" style="height: 50px; width: 80px;">Add</button>
                              </div>
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
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <!--中文錯誤訊息-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>


        <script>
            $(document).ready(function() {
                $("#CheckAllM").click(function() {
                    if ($("#CheckAllM").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
                        $("input[name='member[]']").each(function() {
                            $(this).prop("checked", true); //把所有的核取方框的property都變成勾選
                        })
                    } else {
                        $("input[name='member[]']").each(function() {
                            $(this).prop("checked", false); //把所有的核方框的property都取消勾選
                        })
                    }
                })
                $("#CheckAllP").click(function() {
                    if ($("#CheckAllP").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
                        $("input[name='product[]']").each(function() {
                            $(this).prop("checked", true); //把所有的核取方框的property都變成勾選
                        })
                    } else {
                        $("input[name='product[]']").each(function() {
                            $(this).prop("checked", false); //把所有的核方框的property都取消勾選
                        })
                    }
                })
            })

        </script>

        <script>
            $(document).ready(function($) {
                $("#addproduct").validate({
                    submitHandler: function(form) {
                        form.submit();
                    },
                    rules: {
                        p_name: {
                            required: true,
                        },
                        p_cost: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                        p_description: {
                            required: true,
                        },
                        p_class_id: {
                            required: true,
                        },
                        standard: {
                            required: true,
                        },
                        p_img_url_1: {
                            required: true,
                        }
                    },
                    messages: {
                        p_name: {
                            required: "Empty !!",
                        },
                        p_cost: {
                            required: "Empty !!",
                        },
                        description: {
                            required: "Empty !!",
                        },
                        p_description: {
                            required: "Empty !!",
                        },
                        p_class_id: {
                            required: "Empty !!",
                        },
                        standard: {
                            required: "Empty !!",
                        },
                        p_img_url_1: {
                            required: "Empty !!",
                        }
                    }
                });
            });
        </script>

        <script>
          $(document).ready(function($) {
            $("#db_general").submit(function() {
                var cnt_member = $("input:checkbox:checked[name='member[]']").length;
                if (cnt_member < 1) {
                      $("#message1").html("未選擇項目 !");
                      return false;
                }
              });
          });
          $(document).ready(function($) {
            $("#db_product").submit(function() {
                var cnt_product = $("input:checkbox:checked[name='product[]']").length;
                if (cnt_product < 1) {
                      $("#message2").html("未選擇項目 !");
                      return false;
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
            #message1 {
              color: #D82424;
              font-size: 16px;
              font-weight: normal;
              font-family: "微軟正黑體";
              display: inline;
              padding: 1px;
            }
            #message2 {
              color: #D82424;
              font-size: 16px;
              font-weight: normal;
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
