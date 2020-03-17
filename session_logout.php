<?
  session_start();
  session_destroy();
  setcookie("cart","",time()+3600);//清空Cookie
  header("Location:index.php");
?>
