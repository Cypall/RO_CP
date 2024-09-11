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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "castles.php")){
	Header("Location: ../index.php");
	die();
}


function castles($castle){
if($castle=="23"){
$castlename = "Novice Castle 4";
}
if($castle=="22"){
$castlename = "Novice Castle 3";
}
if($castle=="21"){
$castlename = "Novice Castle 2";
}
if($castle=="20"){
$castlename = "Novice Castle 1";
}
if($castle=="19"){
$castlename = "Gondul";
}
if($castle=="18"){
$castlename = "Skoegul";
}
if($castle=="17"){
$castlename = "Fadhgridh";
}
if($castle=="16"){
$castlename = "Swanhild";
}
if($castle=="15"){
$castlename = "Kriemhild";
}
if($castle=="14"){
$castlename = "Bamboo Grove Hill";
}
if($castle=="13"){
$castlename = "Sacred Altar";
}
if($castle=="12"){
$castlename = "Holy Shadow";
}
if($castle=="11"){
$castlename = "Scarlet Palace";
}
if($castle=="10"){
$castlename = "Bright Arbor";
}
if($castle=="9"){
$castlename = "Mersetzdeitz";
}
if($castle=="8"){
$castlename = "Bergel";
}
if($castle=="7"){
$castlename = "Yesnelph";
}
if($castle=="6"){
$castlename = "Eeyolbriggar";
}
if($castle=="5"){
$castlename = "Repherion";
}
if($castle=="4"){
$castlename = "Rothenburg";
}
if($castle=="3"){
$castlename = "Wuerzburg";
}
if($castle=="2"){
$castlename = "Nuenberg";
}
if($castle=="1"){
$castlename = "Hohenschwangau";
}
if($castle=="0"){
$castlename = "Neuschwanstein";
}

return $castlename;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>