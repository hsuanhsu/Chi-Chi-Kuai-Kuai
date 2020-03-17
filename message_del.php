<?
require("message_total.php");
mysqli_query($link, "DELETE FROM message WHERE id='$_GET[id]'");
echo "<script>location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
?>
