<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
	font-family: MS Sans Serif;
	font-size: 11px;
	color: #000000;
}
body {
	background-color: transparent;
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>


<div align="center">
  <td valign="top" background="main/float_main_02.gif">

      <TABLE width="100%" cellspacing="1" cellpadding="1" align="center" >

	<TBODY>

	<TR align="center" class="topic_title3" style="font-weight: bold;">

		<TD width="24%" class="style11">Castle</TD>

		<TD width="30%" class="style11">Guild</TD>

		<TD width="26%" class="style11">Master</TD>

		<TD width="20%" class="style11">Emblem</TD>

	</TR>      



<?
session_start();
require('config.php');
require('function.php');
function getcastlename($castle_value) {

	$castle_name = explode("\r\n", file_get_contents("guild_castles_name.def"));

	return $castle_name[$castle_value];

}



$conn=ea_connect($CONFIG['sql_host'],$CONFIG['sql_username'],$CONFIG['sql_password'],$CONFIG['sql_dbname']);



$query = "SELECT guild_castle.castle_id, guild.name, guild_castle.guild_id, guild.master, guild.emblem_data FROM guild, guild_castle WHERE guild_castle.guild_id = guild.guild_id ORDER BY guild_castle.castle_id ASC limit 0,4";



$result = $conn->query($query);



require_once "config_guild.php";

	while($grow=mysqli_fetch_object($result))

	{

		$gvalue=$grow->castle_id;

		if($GUILD_CASTLE[$gvalue])

		{

			$countstanding=1;

			$gvalue = getcastlename($gvalue);

			$guild_name=$grow->name;

			$g_master_name=$grow->master;

			$guild_id=$grow->guild_id;

			$emblems[$guild_id]=$grow->emblem_data;

			echo "<TR align=\"center\" class=\"topic_title4\" class=\"style11\">

			<TD class=\"style11\">$gvalue</TD>

			<TD class=\"style11\">$guild_name</TD>

			<TD class=\"style11\">$g_master_name</TD>

			<TD class=\"style11\"><img src=\"emblem.php?data=$guild_id\" alt=\"$guild_name\"></TD>

			</TR>";

		}

	}

	mysqli_free_result($result);

	if (isset($emblems)) {

		session_register("emblems");

		$_SESSION['emblems'] = $emblems;

	}

	ea_close($conn);

?>

	</TBODY>

</TABLE>

</td>
</div>
</body>
</html>
