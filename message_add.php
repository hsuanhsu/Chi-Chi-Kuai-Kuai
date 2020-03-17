<?php
require("message_total.php");
$date = date("Y-m-d");
if ($_SESSION['user_id'] == "llcshan96")
    $g_id =  15;
else if ($_SESSION['user_id'] == "dankong")
    $g_id =  16;
else if (isset( $_SESSION['no_id']))
    $g_id =  $_SESSION['no_id'];
else
    $g_id = 0;
$SaveNewMsg = mysqli_query($link, "INSERT INTO message(guest_id, content, date) VALUES('$g_id','$_POST[msg]','$date')");
echo "<script>location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
//header('Location: message_total.php');
?>
