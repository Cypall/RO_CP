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

// Get our configuration file.
include_once("config.php");

// Reveal all errors.
error_reporting(E_ALL);

// Gets information from form data.
$username = $_POST['username'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$image = $_POST['image'];
$imageverify = $_POST['imageverify'];

$coded = "<br />";
$coded .= "<div class=\"center\">RORegister Version 1.3</div>";
$coded .= "<div class=\"center\">&copy; 2003-2007 The RORegister Development Team</div>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $server_name; ?> | Registration Results</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
require_once('header.php');

// Set the title.
echo "<br />";
echo "<div class=\"title\">";
echo "Registration Results";
echo "</div>";

// Check whether the fields are empty.
if(empty($username) || empty($password) || empty($sex) || empty($email) || empty($imageverify)){
    echo "<div class=\"results\">";
    echo "You must fill in all required fields!<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>.";
    echo "</div>";
    die($coded);
}

// Can username and password be the same?
if($reg_userpass_same == '1'){
	if($username == $password){
		echo "<div class=\"results\">";
		echo "Your username cannot be same as your password!<br />";
		echo "Return to the <a href=\"index.php\">Registration Page</a>.";
		echo "</div>";
		die($coded);
	}
}

// Usernames can only contain alphanumerals.
if(!ereg("[a-z||0-9]", $username)){ 
    echo "<div class=\"results\">";
    echo "Your username is invalid! Only alphanumerals are allowed.<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>.";
    echo "</div>";
    die($coded);
}

// Check email pattern.
if(!ereg("[a-z||0-9]@[a-z||0-9].[a-z]", $email)){
    echo "<div class=\"results\">";
    echo "Your email address is invalid!<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>.";
    echo "</div>";
    die($coded);
}

// Are we using MD5 passwords?
if($reg_md5 == "1"){
    $password = md5($password);
}

// Image verification and validation.
if($image != $imageverify){
    echo "<div class=\"results\">";
    echo "The images and the words are not the same!<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>.";
    echo "</div>";
    die($coded);
}

// Connect to MySQL Server.
$conn = mysql_connect($sql_host, $sql_user, $sql_pass);
if(!$conn){
    echo "<div class=\"results\">";
    echo "Failed to register because: ".mysql_error()."<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>";
    echo "</div>";
    die($coded);
}

// Select the relevant database.
if(!mysql_select_db($sql_db, $conn)){
    echo "<div class=\"results\">";
    echo "Failed to register because: ".mysql_error()."<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>";
    echo "</div>";
    die($coded);
}

// Email checking module. [Cypress]
$checkemail = "SELECT `email` FROM `login` WHERE `email` LIKE '{$email}'";
$result = mysql_query($checkemail);

// Check whether the email exists.
if (mysql_num_rows($result) > 0){
    echo "<div class=\"results\">";
    echo "Failed to register because: ";
    echo "You have already registered with this e-mail.<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>";
    echo "</div>";
    die($coded);
}

// Username checking module. [Cypress]
$checkuserid = "SELECT `userid` FROM `login` WHERE `userid` LIKE '{$username}'";
$result = mysql_query($checkuserid);

// Check whether the username exists.
if (mysql_num_rows($result) > 0){
    echo "<div class=\"results\">";
    echo "Failed to register because: ";
    echo "The name you have chosen is taken already. Please go back and select another.<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>";
    echo "</div>";
    die($coded);
}

// Construct the query string.
$query_string = "INSERT INTO login(`userid`, `user_pass`, `sex`, `email`, `level`) ";
$query_string .= "VALUES ('{$username}', '{$password}', '{$sex}', '{$email}', 0)";
$query  =   mysql_query($query_string);

// Check query.
if(!$query){
    echo "<div class=\"results\">";
    echo "Failed to register because: ".mysql_error()."<br />";
    echo "Return to the <a href=\"index.php\">Registration Page</a>"; 
    echo "</div>";
    die($coded);
}

echo 'Registration Successful.'; //If all goes well, print this message.
?>

</body>
</html>
