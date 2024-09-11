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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "common.php")){
	Header("Location: ../index.php");
	die();
}

include("system/DB_Connect_RO.php");
include("system/DB_Connect_CP.php");
global $link2, $db, $dbfetch;
$result2 = @$db("SELECT sitename, siteslogan, wmsg, CPlang, siteskin, cnewshome, newsblock, showbanners, banner1, banurl1, banmsg1, banner2, banurl2, banmsg2, banner3, banurl3, banmsg3, banner4, banurl4, banmsg4, linktarget, showstatus, serverip, acc_port, char_port, map_port, grlimit, playerlimit, homunlimit, rates, serverinfo FROM "._CPBD."_config",$link2);
list($sitename, $siteslogan, $wmsg, $CPlang, $siteskin, $cnewshome, $newsblock, $showbanners, $banner1, $banurl1, $banmsg1, $banner2, $banurl2, $banmsg2, $banner3, $banurl3, $banmsg3, $banner4, $banurl4, $banmsg4, $linktarget, $showstatus, $serverip, $acc_port, $char_port, $map_port, $grlimit, $playerlimit, $homunlimit, $rates, $serverinfo) = @$dbfetch($result2);
sql_cls($result2); 

session_start();
$nickname = $_SESSION["nikname"];
$admin = $_SESSION["aloged"];

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>