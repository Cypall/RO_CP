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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "blocks.php")){
	Header("Location: ../index.php");
	die();
}

include("system/DB_Connect_CP.php");
function sides(){
global $link2, $db, $dbfetch;

$result2 = $db("SELECT bid, btitle, bfile, bcontent, blockimg FROM "._CPBD."_blocks WHERE bactive='yes' ORDER BY bposit ASC",$link2);
while(list($bid, $btitle, $bfile, $bcontent, $blockimg) = $dbfetch($result2)){

if($blockimg!="0"){
$blockimg = "<center><img src='images/blocks/".$blockimg.".gif' border='0' class='imagefade' align='middle'></center>";
}else{
$blockimg = "";
}

if(file_exists("Addons/blocks/".$bfile."")){
include("Addons/blocks/".$bfile."");
if(!empty($bcontent)){
$content = "$content<hr>$bcontent";
}
}else{
$content = $bcontent;
}

skinblock($btitle,$content, $blockimg);
}
sql_cls($result2);
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>