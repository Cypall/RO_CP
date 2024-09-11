<?php
/* Server Status Script */
include("server_status.php");
include("user_online.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<style type="text/css">
<!--
.text {font-family: Tahoma; font-size:12px;}
.style5 {font-size: 14px; font-weight: bold; color: #FF0000; }
.style7 {font-size: 14px; color: #0000FF; }
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #382016;
}
-->
</style>
<table width="164" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="96"><span class="style5">Login Server </span></td>
        <td width="68"><span class="style7"><?php echo $acc_status; ?></span></td>
  </tr>
      <tr>
        <td><span class="style5">Cgar Server </span></td>
        <td><span class="style7"><?php echo $char_status; ?></span></td>
  </tr>
      <tr>
        <td><span class="style5">Map Server </span></td>
        <td><span class="style7"><?php echo $map_status; ?></span></td>
  </tr>
      <tr>
        <td><span class="style5">จำนวนผู้ Online </span></td>
        <td><span class="style7"><?php echo $usersonline; ?></span></td>
  </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
    </table>
    </html>