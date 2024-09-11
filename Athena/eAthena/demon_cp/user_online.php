<?php
/* eAthena SQL Database Config */
$host  = "localhost";
$user  = "ใส่ ID";
$pass  = "ใส่Pass";
$db    = "ใส่ DB";
#####################################
$link = mysql_connect($host, $user, $pass) or die(mysql_error());
@mysql_select_db($db,$link);
$query = "SELECT COUNT(*) as total FROM `char` WHERE online = '1'";
$result = mysql_query($query,$link);
mysql_close($link);
$arr = mysql_fetch_array($result);
$usersonline = $arr["total"];
?>