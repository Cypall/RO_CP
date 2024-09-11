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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "banners.php")){
	Header("Location: ../index.php");
	die();
}

function banners(){
global $linktarget;
global $banner1, $banner2, $banner3, $banner4;
global $banurl1, $banurl2, $banurl3, $banurl4;
global $banmsg1, $banmsg2, $banmsg3, $banmsg4;
echo "<a href='$banurl1' target='".$linktarget."'><img src='$banner1' border='0' alt='$banmsg1'></a>";
echo "<br>";
echo "<a href='$banurl2' target='".$linktarget."'><img src='$banner2' border='0' alt='$banmsg2'></a>";
echo "<br>";
echo "<a href='$banurl3' target='".$linktarget."'><img src='$banner3' border='0' alt='$banmsg3'></a>";
echo "<br>";
echo "<a href='$banurl4' target='".$linktarget."'><img src='$banner4' border='0' alt='$banmsg4'></a>";
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>