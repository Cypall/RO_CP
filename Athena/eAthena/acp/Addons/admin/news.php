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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "config_sys.php")){
	Header("Location: ../../index.php");
	die();
}

include("system/DB_Connect_CP.php");
function AdminNews(){
global $db, $dbfetch, $link2;
ROhead();
menuadm();

session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}
$result2 = $db("SELECT nid, ntitle, ntext, ndate, nautor FROM "._CPBD."_news ORDER BY nid DESC LIMIT 0,30",$link2);

TableStart();
echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1' cellpadding='1'>
  <tr>
    <td class='row2' colspan='7' width='100%' align='center'><b><img border='0' src='images/arrow.gif' width='10' height='7'>"._NEWSADMIN."<img border='0' src='images/arrow.gif' width='10' height='7'></b></td>
  </tr>
  <tr>
    <td class='row2' colspan='7' width='100%' align='center'>[ <a href='panel.php?adm=AddStory'><b>"._ADDSTORY."</b></a> ]</td>
  </tr>
";
while(list($nid, $ntitle, $ntext, $ndate, $nautor) = $dbfetch($result2)){

echo "
  <tr>
    <td class='row2' width='1%'><img border='0' src='images/arrow.gif' width='10' height='7'></td>
    <td class='row2' width='1%'>$nid</td>
    <td class='row2' width='65%'>$ntitle</td>
    <td class='row2' align='center' width='10%'>$nautor</td>
    <td class='row2' align='center' width='25%'>$ndate</td>
    <td class='row2' width='1%'><a href='panel.php?adm=EditStory&s=$nid'><img alt='"._EDIT."' src='images/edit.gif' border='0'></a></td>
    <td class='row2' width='1%'><a href='panel.php?adm=deletestory&s=$nid'><img alt='"._DELETE."' src='images/delete.png' border='0'></a></td>
  </tr>
";

}
echo "</table>";
sql_cls($result2);

TableEnd();
ROfoot();
}

function deletestory(){
global $db, $dbfetch, $link2;
session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

$s = $_GET['s'];
$result = $db("delete from "._CPBD."_news where nid='$s'",$link2);
header("Location: panel.php?adm=AdminNews");
}

function AddStory(){
global $db, $dbfetch, $link2;
session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}
ROhead();
menuadm();
TableStart();
$author = $_SESSION["aloged"];
echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='panel.php'>
  <tr>
    <td class='row2' colspan='2' width='100%' align='center'><b><img border='0' src='images/arrow.gif' width='10' height='7'>"._ADDSTORYFORM."<img border='0' src='images/arrow.gif' width='10' height='7'></b></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'>
      <b>"._STORYTITLE."</b>:</td>
    <td class='row2' width='50%'>
  <input type='text' name='ntitle' size='40'></td>
  </tr>
  <tr>
    <td class='row2'  width='100%' colspan='2' align='center'><b>"._STORYTEXT." ( "._HTMLOK." )</b>:<br>
  <textarea rows='10' name='ntext' cols='100'></textarea></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'>
      <b>"._AUTOR."</b>:</td>
    <td class='row2' width='50%'>
  <input type='hidden' name='nautor' value='$author' size='40'>$author</td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'>
      <b>"._DATE."</b>:</td>
    <td class='row2' width='50%'>
  <input type='hidden' name='ndate' value='".date('Y-m-d')."' size='40'>".date('Y-m-d')."</td>
  </tr>
  <tr>
    <td class='row2' width='100%' colspan='2' align='center'>
  <input type='hidden' name='adm' value='SendStory'>
  <input type='submit' value='"._SUBMIT."'>
    </td>
  </tr>
</form>
</table>
";
TableEnd();
ROfoot();
}

function EditStory(){
global $db, $dbfetch, $link2;
session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

$s = $_GET['s'];

$result2 = $db("SELECT nid, ntitle, ntext, ndate, nautor FROM "._CPBD."_news WHERE nid='$s'",$link2);
list($nid2, $ntitle2, $ntext2, $ndate2, $nautor2) = $dbfetch($result2);
sql_cls($result2);

ROhead();
menuadm();
TableStart();
$author = $_SESSION["aloged"];
echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='panel.php'>
  <tr>
    <td class='row2' colspan='2' width='100%' align='center'><b><img border='0' src='images/arrow.gif' width='10' height='7'>"._ADDSTORYFORM."<img border='0' src='images/arrow.gif' width='10' height='7'></b></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'>
      <b>"._STORYTITLE."</b>:</td>
    <td class='row2' width='50%'>
  <input type='text' name='ntitle' value='$ntitle2' size='40'></td>
  </tr>
  <tr>
    <td class='row2'  width='100%' colspan='2' align='center'><b>"._STORYTEXT." ( "._HTMLOK." )</b>:<br>
  <textarea rows='10' name='ntext' cols='100'>$ntext2</textarea></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'>
      <b>"._AUTOR."</b>:</td>
    <td class='row2' width='50%'>
  <input type='hidden' name='nautor' value='$nautor2' size='40'>$nautor2</td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'>
      <b>"._DATE."</b>:</td>
    <td class='row2' width='50%'>
  <input type='hidden' name='ndate' value='$ndate2' size='40'>$ndate2</td>
  </tr>
  <tr>
    <td class='row2' width='100%' colspan='2' align='center'>
  <input type='hidden' name='update' value='ok'>
  <input type='hidden' name='story' value='$nid2'>
  <input type='hidden' name='adm' value='SendStory'>
  <input type='submit' value='"._SUBMIT."'>
    </td>
  </tr>
</form>
</table>
";
TableEnd();
ROfoot();
}

function SendStory(){
global $db, $dbfetch, $link2;
session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

$ntitle = $_POST['ntitle'];
$ntext = $_POST['ntext'];
$ndate = $_POST['ndate'];
$nautor = $_POST['nautor'];
$update = $_POST['update'];
$story = $_POST['story'];

if(empty($ntitle)){
header("Location: panel.php?adm=AdminNews");
}

if(empty($ntext)){
header("Location: panel.php?adm=AdminNews");
}

if(!empty($update)){
$result = $db("UPDATE "._CPBD."_news SET ntitle='$ntitle' WHERE nid='$story'",$link2);
$result = $db("UPDATE "._CPBD."_news SET ntext='$ntext' WHERE nid='$story'",$link2);
}else{
$result = $db("insert into "._CPBD."_news values (NULL, '$ntitle', '$ntext', '$ndate', '$nautor')",$link2);
}

header("Location: panel.php?adm=AdminNews");
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>