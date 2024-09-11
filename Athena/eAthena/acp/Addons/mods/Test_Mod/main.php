<?php
/**************************************************/
/* EyeX ROCP | EyeX Project Active Again          */
/* PHP/MYSQL Experts Working                      */
/* ===========================                    */
/* Copyright (c) 2007 by Kiryu                    */
/* http://www.flow-impact.net                     */
/* ===========================                    */
/*      ____                     __   __          */
/*     /\  _`\                  /\ \ /\ \         */
/*     \ \ \L\_\  __  __     __ \ `\`\/'/'        */
/*      \ \  _\L /\ \/\ \  /'__`\`\/ > <          */
/*       \ \ \L\ \ \ \_\ \/\  __/   \/'/\`\       */
/*        \ \____/\/`____ \ \____\  /\_\\ \_\     */
/*         \/___/  `/___/> \/____/  \/_/ \/_/     */
/*                    /\___/                      */
/*                    \/__/                       */
/* =========================                      */
/* Project Made in Tijuana B.C Mexico.            */
/* Copyright(c) By Kiryu                          */
/* Please Do Not Modify The Content of This Files */
/* If You Need Support You Can Contact Me Here:   */
/* http://www.flow-impact.net/ [Spanish WebSite]  */
/* or Here: http://www.jamma-ro.net/[Spanish Too] */
/* or: ew.info@gmail.com | support/sales Email.   */
/**************************************************/

/**************************************************/
/* THIS IS ONLY A TEST MOD ADDED TO EYEX-ROCP     */
/* MODIFY THIS IF YOU NEED A CUSTOM MOD           */
/**************************************************/

if(stristr(htmlentities($_SERVER['PHP_SELF']), "main.php")){
	Header("Location: ../../../index.php");
	die();
}

$op = $_GET['op'];
if(empty($op)){
$op = $_POST['op'];
}

global $CPlang;
if(file_exists("Addons/mods/Test_Mod/language/lang-".$CPlang.".php")){
include("Addons/mods/Test_Mod/language/lang-".$CPlang.".php");
}else{
include("Addons/mods/Test_Mod/language/lang-spanish.php");
}

function index(){
global $sitename, $rates, $serverinfo, $db, $dbnum, $dbfetch, $link2;
RoHead();
TableStart();
echo "<center><b>"._TESTMODADDED."</b></center>";

echo '
HTML
<table width="100%" bgcolor="#000000" border="0" cellspacing="1">
<tr>
<td width="100%" class="row2">
TEST TEST TEST TEST TEST TEST
</td>
</tr>
</table>
';

TableEnd();
ROfoot();
}

switch($op){
default:index();break;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>