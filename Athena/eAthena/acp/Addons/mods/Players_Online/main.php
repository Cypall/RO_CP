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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "main.php")){
	Header("Location: ../../../index.php");
	die();
}

$op = $_GET['op'];
if(empty($op)){
$op = $_POST['op'];
}

include("system/DB_Connect_RO.php");

function rankmenu(){
global $db, $dbnum;
echo "<center><b>"._ONLINEPLAYERS."</b><br>";
$func24 = $db("SELECT * FROM ".$dbname.".`char` WHERE online='1'");
$online = $dbnum($func24); 
echo "<b>"._WEHAVE.": <font color='red'>".$online."</font> "._PLAYERS." "._PLAYING."</b></center>";
}


function index(){

global $link2, $db, $dbfetch, $dbnum, $playerlimit, $dbname;
$page = $_GET["page"]; 
if (!$page) { 
$start = 0;
$page=1;
$sum122 = 0;
} 
else { 
$start = ($page - 1) * $playerlimit; 
$sum122 = ($page - 1) * $playerlimit;
}


$func24 = $db("SELECT * FROM ".$dbname.".`char` WHERE online='1'");
$regtotal = $dbnum($func24); 
$pages = ceil($regtotal / $playerlimit); 
sql_cls($func24);

ROhead();
rankmenu();
TableStart();
echo "<form method='get' action='index.php'>";

$result22 = $db("SELECT * FROM ".$dbname.".`char` WHERE online='1'");

$result2 = $db("SELECT char_id, account_id, name, class, base_level, job_level, zeny, max_hp, max_sp, guild_id, last_map, last_x, last_y, partner_id, online FROM ".$dbname.".`char` WHERE online='1' ORDER BY base_level DESC LIMIT $start,$playerlimit");

while(list($char_id, $account_id, $name, $class, $base_level, $job_level, $zeny, $max_hp, $max_sp, $guild_id, $last_map, $last_x, $last_y, $partner_id, $online) = $dbfetch($result2)){

$result24 = $db("SELECT char_id, name FROM ".$dbname.".`char` WHERE char_id='$partner_id'");
list($char_id3, $partner) = $dbfetch($result24);
sql_cls($result24);

$result245 = $db("SELECT name FROM ".$dbname.".`guild` WHERE guild_id='$guild_id'");
list($guild) = $dbfetch($result245);
sql_cls($result245);

$result245 = $db("SELECT userid FROM ".$dbname.".`login` WHERE account_id='$account_id'");
list($account) = $dbfetch($result245);
sql_cls($result245);

if(empty($partner)){
$partner = ""._NOPARTNER."";
}

if($partner_id=="0"){
$partner_id2 = ""._SINGLE."";
}else{
$partner_id2 = ""._MARRIED."";
}

if($online==1){
$online = "<font color='green'>"._ONLINE."</font>";
}else{
$online = "<font color='red'>"._OFFLINE."</font>";
}

echo "
<table border='0' width='100%' cellspacing='1' bgcolor='#000000'>
  <tr>
    <td class='row2' width='25%' align='center'>
<b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b>
<br>
".jobs2($class,$account)."
</td>
    <td class='row2' width='75%' align='center'>
<b>"._CHARINFO." ".$online."</b>
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>

  <tr>
    <td class='row2' colspan='3' width='50%' align='right'><b>#".$sum122."</b></td>
  </tr>

  <tr>
    <td class='row2' colspan='2' width='50%'><b>"._CLASS."</b>:".jobs($class)."</td>
    <td class='row2' width='50%'><b>".$partner_id2."</b></td>
  </tr>

  <tr>
    <td class='row2' width='35%'><b>"._MAXHP."</b>:".$max_hp."</td>
    <td class='row2' width='35%'><b>"._MAXSP."</b>:".$max_sp."</td>
    <td class='row2' width='30%'><b>"._LVL."</b>: ".$base_level."/".$job_level."</td>
  </tr>
  <tr>
    <td class='row2' colspan='2' width='50%'><b>"._ONLINEMAP."</b>:".$last_map." (".$last_x.",".$last_y.")</td>
    <td class='row2' width='50%'><b>"._ZENY."</b>:".$zeny."</td>
  </tr>
";

if($partner_id!="0"){
echo "
  <tr>
    <td class='row2' colspan='3' width='50%'><b>"._PARTNER."</b>: <a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$partner_id'>".$partner."</a></td>
  </tr>
";
}
$result32 = $db("SELECT gld_emblem FROM "._CPBD."_guildmasters WHERE gld_id='$guild_id'",$link2);
list($gld_emblem) = $dbfetch($result32);


if(!empty($gld_emblem)){
$themblem = "<img border='0' alt='$guild' width='24' height='24' src='uploads/$gld_emblem'>";
}else{
$themblem = "<img border='0' alt='$guild' width='24' height='24' src='images/blank.gif'>";
}


if($guild_id!="0"){
echo "
  <tr>
    <td class='row2' colspan='3' width='100%' align='center'>
<table border='0' width='100%' cellspacing='1'>
  <tr>
    <td width='1%'>".$themblem."</td>
    <td width='99%'><b>"._GUILD.":</b> <a href='index.php?sec=GuildRank&op=GuildInfo&g=$guild_id'>".$guild."</a></td>
  </tr>
</table>
</td>
  </tr>
";
}

echo "
</table>

</td>
  </tr>
</table>
";

$sum122++;



}
sql_cls($result2);


echo "<center>";
if ($pages > 1){
echo "<b>"._SELPAGE."</b>: ";
echo "<select style='WIDTH: 40px' onchange=top.location.href=this.options[this.selectedIndex].value name=page>";
for ($i=1;$i<=$pages;$i++){
if($page == $i){
$sel ="selected";
$page2 ="$page";
}else{
$sel ="";
$page2 ="$i";
}
echo "<option value='index.php?sec=Players_Online&page=".$i."' $sel>$page2</option>";

}
echo "</select></form>";
}
echo "</center>";

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