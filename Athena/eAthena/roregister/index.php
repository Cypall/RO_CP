<?php
/**
 * RORegister - A Ragnarok Online Control Panel
 * for both text-based and SQL-based eAthena Servers.
 *
 * Copyright (C) 2005-2007 The RORegister Development Team
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the license; or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330,
 * Boston, MA 02111-1307, USA.
 *
 * Registration processing script.
 * Main script that processes the incoming form data.
 *
 * @package    RORegister
 * @version    1.3
 * @link       http://roregister.net/
 * @irc        irc.freenode.net#roregister
 */

/**
 * Make sure other scripts are properly included.
 */
define("__included", true, true);

// Include the configuration file.
include_once("config.php");

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $server_name; ?> | Registration</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>

<?php
require_once("header.php");
?>

<form action="registerprocess.php" method="post">
<table class="reg_table" cellspacing="0" cellpadding="0">
<tr>
	<td>
		<br />
		<div class="title">Registration Page</div>
		<br />
		<table class="reg_table" cellpadding="5" cellspacing="0">
			<tr>
				<td class="inputname1">Username:</td>
				<td class="inputname1"><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td style="width: 30%;" class="inputname2">Password: </td>
				<td style="width: 70%;" class="inputname2">
				    <input type="password" name="password" />
				</td>
			</tr>
			<tr>
				<td class="inputname1">Sex: </td>
				<td class="inputname1">
				    <input type="radio" name="sex" value="M" />Male
				    <input type="radio" name="sex" value="F" />Female
				</td>
			</tr>
			<tr>
				<td class="inputname2">Email Address: </td>
	 			<td class="inputname2"><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td class="inputname1">Image Verification: </td>
				<td class="inputname1">
					<?php
					//Image Verification function
					$randomnumone = rand("0", "9");
					$randomnumtwo = rand("0", "9");
					$randomnumthree = rand("0", "9");
					$randomnumfour = rand("0", "9");
					$randomnumfive = rand("0", "9");
					$randomnumsix = rand("0", "9");
					$total =  $randomnumone." ".$randomnumtwo." ".$randomnumthree." ".$randomnumfour." ".$randomnumfive." ".$randomnumsix;
					$form = $randomnumone.$randomnumtwo.$randomnumthree.$randomnumfour.$randomnumfive.$randomnumsix;
					$exploded = explode(" ", $total);

					$one = 0;
					$two = 0;
					$three = 0;
					$four = 0;
					$five = 0;
					$six = 0;

					//Loop 1
					while($exploded['0'] != $one){
							$one++;
					}
					
					if($exploded['0'] == $one){
						echo "<img src=\"$reg_image_folder/image$one.gif\" alt=\"Validation Image\" />";
					}
					
					//Loop 2
					while($exploded['1'] != $two){
							$two++;
					}
					
					if($exploded['1'] == $two){
						echo "<img src=\"$reg_image_folder/image$two.gif\" alt=\"Validation Image\" />";
					}
					
					//Loop 3
					while($exploded['2'] != $three){
						$three++;
					}
					
					if($exploded['2'] == $three){
						echo "<img src=\"$reg_image_folder/image$three.gif\" alt=\"Validation Image\" />";
					}
					
					//Loop 4
					while($exploded['3'] != $four){
						$four++;
					}
					
					if($exploded['3'] == $four){
						echo "<img src=\"$reg_image_folder/image$four.gif\" alt=\"Validation Image\" />";
					}
					
					//Loop 5
					while($exploded['4'] != $five){
						$five++;
					}
					
					if($exploded['4'] == $five){
						echo "<img src=\"$reg_image_folder/image$five.gif\" alt=\"Validation Image\" />";
					}
					
					//Loop 6
					while($exploded['5'] != $six){
						$six++;
					}
					
					if($exploded['5'] == $six){
					    echo "<img src=\"$reg_image_folder/image$six.gif\" alt=\"Validation Image\" /><br />";
					}

					echo "<input type=\"hidden\" name=\"image\" value=\"$form\" />";
					?>
					<input type="text" name="imageverify" />
				</td>
			</tr>
			<tr>
				<td class="inputname2">&nbsp;</td>
				<td class="inputname2"><input name="submit" type="submit" value="Submit" /></td>
			</tr>
		</table>
	</td>
</tr>
</table>
</form>

<p />
<div class="center">RORegister Version 1.3</div>
<div class="center">&copy; 2003-2007 The RORegister Development Team</div>

</body>
</html>
