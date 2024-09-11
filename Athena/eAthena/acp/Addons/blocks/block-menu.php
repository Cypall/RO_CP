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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "users_online.php")){
	Header("Location: ../../index.php");
	die();
}


global $db, $dbfetch, $link2, $admin, $dbnum, $nickname;
$content = "<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";

$blockfunc = $db("SELECT mod_id, mod_name, mod_status, mod_home, mod_folder FROM "._CPBD."_mods WHERE mod_status='1' AND mod_home!='1' ORDER BY mod_name",$link2);
$content .= "<tr>
    <td width='1%' class='row2' align='center'><img src='images/arrow.gif' border='0'></td>
    <td width='100%' class='row2'><b><a href='index.php'>"._HOME."</a></b></td>
  </tr>
";

if(!sys_security($nickname)){
$content .= "<tr>
    <td width='1%' class='row2' align='center'><img src='images/arrow.gif' border='0'></td>
    <td width='100%' class='row2'><b><a href='index.php?sec=CP&op=Register'>"._REGISTER."</a></b></td>
  </tr>
";
}

while(list($mod_id, $mod_name, $mod_status, $mod_home, $mod_folder) = $dbfetch($blockfunc)){
$content .= "
<tr>
    <td width='1%' class='row2' align='center'><img src='images/arrow.gif' border='0'></td>
    <td width='100%' class='row2'><b><a href='index.php?sec=$mod_folder'>$mod_name</a></b></td>
  </tr>
";
}
sql_cls($blockfunc);

if(is_admin($admin)){
$content .= "<tr>
    <td width='1%' colspan='2' class='row2' align='center'><b>"._INACTIVEMODS." [</b><a href='panel.php'><font color='red'>"._ADMIN."</font></a><b>]</b></td>
  </tr>
";
$blockfunc3 = $db("SELECT * FROM "._CPBD."_mods WHERE mod_status='0' AND mod_home!='1'",$link2);
$inactivos = $dbnum($blockfunc3);

$blockfunc2 = $db("SELECT mod_id, mod_name, mod_status, mod_home, mod_folder FROM "._CPBD."_mods WHERE mod_status='0' AND mod_home!='1' ORDER BY mod_name",$link2);
if($inactivos=="0"){
$content .= "
<tr>
    <td width='1%' class='row2' align='center'><img src='images/arrow.gif' border='0'></td>
    <td width='100%' class='row2'>"._NONE."</td>
  </tr>
";
}
while(list($mod_id, $mod_name, $mod_status, $mod_home, $mod_folder) = $dbfetch($blockfunc2)){
$content .= "
<tr>
    <td width='1%' class='row2' align='center'><img src='images/arrow.gif' border='0'></td>
    <td width='100%' class='row2'><b><a href='index.php?sec=$mod_folder'>$mod_name</a></b></td>
  </tr>
";
}
sql_cls($blockfunc2);
}
$content .= "</table>";

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>