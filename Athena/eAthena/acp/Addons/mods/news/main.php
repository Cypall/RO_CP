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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "default.php")){
	Header("Location: ../../index.php");
	die();
}

$op = $_GET['op'];
if(empty($op)){
$op = $_POST['op'];
}
include("system/DB_Connect_CP.php");
function index(){
global $db, $dbfetch, $dbnum, $link2, $newsblock, $cnewshome, $sitename;

ROhead();
wmsg();
$result2 = $db("SELECT nid, ntitle, ntext, ndate, nautor FROM "._CPBD."_news ORDER BY nid DESC LIMIT 0,$newsblock",$link2);
TableStart();
echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1' cellpadding='1'>
  <tr>
    <td class='row2' width='65%' colspan='3'>
      <p align='center'><b>:: "._LATEST." $newsblock "._NEWS." | $sitename :: </b></td>
    <td class='row2' width='10%'>
      <p align='center'><b>"._AUTOR."</b></td>
    <td class='row2' width='25%'>
      <p align='center'><b>"._DATE."</b></td>
  </tr>
";
while(list($nid, $ntitle, $ntext, $ndate, $nautor) = $dbfetch($result2)){

echo "
  <tr>
    <td class='row2' width='1%'><img border='0' src='images/arrow.gif' width='10' height='7'></td>
    <td class='row2' width='1%'>$nid</td>
    <td class='row2' width='65%'><a href='index.php?st=ReadStory&article=$nid'>$ntitle</a></td>
    <td class='row2' align='center' width='10%'>$nautor</td>
    <td class='row2' align='center' width='25%'>$ndate</td>
  </tr>
";

}
echo "</table>";
sql_cls($result2);
TableEnd();

$result = $db("SELECT nid, ntitle, ntext, ndate, nautor FROM "._CPBD."_news ORDER BY nid DESC LIMIT 0,$cnewshome",$link2);
while(list($nid, $ntitle, $ntext, $ndate, $nautor) = $dbfetch($result)){
skinnews($nautor,$ntitle,$ntext, $ndate);
}
sql_cls($result);

@sql_cls($result2); 
@sql_cls($result); 

ROfoot();
}

function ReadStory(){
global $db, $dbfetch, $dbnum, $link2;
$article = $_GET['article'];
ROhead();
wmsg();
$result = $db("SELECT nid, ntitle, ntext, ndate, nautor FROM "._CPBD."_news WHERE nid='$article'",$link2);
list($nid, $ntitle, $ntext, $ndate, $nautor) = $dbfetch($result);
skinnews($nautor,$ntitle,$ntext, $ndate);
ROfoot();
sql_cls($result);
}

switch($st){
case "ReadStory":ReadStory();break;
default:index();break;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>