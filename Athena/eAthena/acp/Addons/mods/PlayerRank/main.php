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
global $link2, $db, $dbfetch, $dbnum;
TableStart();
$limitby = $_GET['limitby'];
if(!empty($limitby)){
list($limit1,$limit2) = explode("-",$limitby);
$limitby2 = "&limitby=$limitby";
$limitby = "WHERE $limit1='$limit2'";
}

$orderby = $_GET['orderby'];
if(!empty($orderby)){
$orderby2 = "&orderby=$orderby";
}

$func24 = $db("SELECT * FROM ".$dbname.".`char`");
$regtotal = $dbnum($func24); 
sql_cls($func24);

$func244 = $db("SELECT * FROM ".$dbname.".`login`");
$regmember = $dbnum($func244); 
sql_cls($func244);

$sel = "selected";

echo "<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "<form method='get' action='index.php'>
  <tr>
    <td class='row2' width='100%' colspan='2' align='center'>
";
echo "<b>"._PLAYERRANK."</b>";
echo "</td></tr>
    <td class='row2' width='100%' colspan='2' align='center'>
";
$query = $_GET['query'];
if(empty($query)){
$query = $_POST['query'];
}

echo "<form method='POST' action='index.php?sec=PlayerRank'>
<b>"._SEARCHBOX."</b>:<input type='hidden' name='sec' value='PlayerRank'>
  <input type='text' name='query' size='20' value='$query'>
<b>"._SEARCHBY."</b>: <select size='1' name='searchby'>
    <option value='name'>"._NAME."</option>
    <option value='zeny'>"._ZENY."</option>
    <option value='base_level'>"._BASELVL."</option>
    <option value='job_level'>"._JOBLVL."</option>
</select>

<input type='submit' value='"._SUBMIT."'>
";
echo "
</td></tr></form>

<tr><td class='row2' width='50%' align='right'><b>"._ORDERBY."</b>:</td>";

echo "<td class='row2' width='50%'><select onchange=top.location.href=this.options[this.selectedIndex].value name=page>";
$sel = "selected";
if(empty($orderby)){
echo "<option value='#'>--------- "._NONE." ---------</option>";
}else{
echo "<option value='#' $sel>--------- "._NONE." ---------</option>";
}

if($orderby=="name"){
echo "<option value='index.php?sec=PlayerRank&orderby=name".$limitby2."' $sel>"._NAME."</option>";
}else{
echo "<option value='index.php?sec=PlayerRank&orderby=name".$limitby2."'>"._NAME."</option>";
}

if($orderby=="zeny"){
echo "<option value='index.php?sec=PlayerRank&orderby=zeny".$limitby2."' $sel>"._ZENY."</option>";
}else{
echo "<option value='index.php?sec=PlayerRank&orderby=zeny".$limitby2."'>"._ZENY."</option>";
}

if($orderby=="base_level"){
echo "<option value='index.php?sec=PlayerRank&orderby=base_level".$limitby2."' $sel>"._BASELVL."</option>";
}else{
echo "<option value='index.php?sec=PlayerRank&orderby=base_level".$limitby2."'>"._BASELVL."</option>";
}

if($orderby=="job_level"){
echo "<option value='index.php?sec=PlayerRank&orderby=job_level".$limitby2."' $sel>"._JOBLVL."</option>";
}else{
echo "<option value='index.php?sec=PlayerRank&orderby=job_level".$limitby2."'>"._JOBLVL."</option>";
}

echo "</select><br></td></tr><tr>";

echo "<td class='row2' width='50%' align='right'><b>"._SHOWONLY."</b>:</td>";

echo "<td class='row2' width='50%'><select onchange=top.location.href=this.options[this.selectedIndex].value name=page>";
echo "<option value='#'>--------- "._NONE." ---------</option>";

if(empty($limitby)){
echo "<option value='index.php?sec=PlayerRank' $sel>"._ALL."</option>";
}else{
echo "<option value='index.php?sec=PlayerRank'>"._ALL."</option>";
}

echo "<option value='#'>--------- "._CLASS." ---------</option>";

$result22 = $db("SELECT job_id, job_name FROM "._CPBD."_jobs",$link2);
while(list($jobid2, $jobname2) = $dbfetch($result22)){

$func242 = $db("SELECT * FROM ".$dbname.".`char` WHERE class='$jobid2'");
$regclass = $dbnum($func242); 
sql_cls($func242);

if($limit2 == $jobid2){
echo "<option value='index.php?sec=PlayerRank".$orderby2."&limitby=class-$jobid2' $sel>$jobname2 [$regclass]</option>";
}else{
echo "<option value='index.php?sec=PlayerRank".$orderby2."&limitby=class-$jobid2'>$jobname2 [$regclass]</option>";
}
}
sql_cls($result22);
echo "</select>
    </td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._TOTALMEMBERS."</b>:</td>
    <td class='row1' width='50%'>".$regmember."</td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._TOTALCHARS."</b>:</td>
    <td class='row1' width='50%'>".$regtotal."</td>
  </tr>
</form></table>";
TableEnd();






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

$limitby = $_GET['limitby'];
if(!empty($limitby)){


list($limit1,$limit2) = explode("-",$limitby);

$limitby = "WHERE $limit1='$limit2'";
}
$orderby = $_GET['orderby'];
if(empty($orderby)){
$orderby = "base_exp";
}

if(!empty($orderby)){
$orderby2 = "&orderby=$orderby";
}

$query = $_GET['query'];
if(empty($query)){
$query = $_POST['query'];
}

if(!empty($query)){

$searchby = $_GET['searchby'];
if(empty($searchby)){
$searchby = "name";
}

$query2 = "WHERE ".$searchby." LIKE '%$query%'";
}

$func24 = $db("SELECT * FROM ".$dbname.".`char` $query2 $limitby");
$regtotal = $dbnum($func24); 
$pages = ceil($regtotal / $playerlimit); 
sql_cls($func24);

ROhead();
rankmenu();
TableStart();
echo "<form method='get' action='index.php'>";

$result22 = $db("SELECT * FROM ".$dbname.".`char` $query2 $limitby");

$result2 = $db("SELECT char_id, account_id, name, class, base_level, job_level, zeny, max_hp, max_sp, guild_id, save_map, save_x, save_y, partner_id, online FROM ".$dbname.".`char` $query2 $limitby ORDER BY ".$orderby." DESC LIMIT $start,$playerlimit");

while(list($char_id, $account_id, $name, $class, $base_level, $job_level, $zeny, $max_hp, $max_sp, $guild_id, $save_map, $save_x, $save_y, $partner_id, $online) = $dbfetch($result2)){

if($online==1){
$online = "<font color='green'>"._ONLINE."</font>";
}else{
$online = "<font color='red'>"._OFFLINE."</font>";
}

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
    <td class='row2' colspan='2' width='50%'><b>"._SAVEDMAP."</b>:".$save_map." (".$save_x.",".$save_y.")</td>
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
$limitby = $_GET['limitby'];
if(!empty($limitby)){
$limitby2 = "&limitby=$limitby";
}
if(!empty($query)){

if(!empty($searchby)){
$searchby3 = "&searchby=$searchby";
}

$query3 = "".$searchby3."&query=$query";
}
echo "<option value='index.php?sec=PlayerRank".$query3."".$orderby2."".$limitby2."&page=".$i."' $sel>$page2</option>";

}
echo "</select></form>";
}
echo "</center>";

TableEnd();
ROfoot();
}

function PlayerInfo(){
global $link2, $db, $dbfetch, $dbnum;
$player = $_GET['player'];
if(empty($player)){
header("Location: index.php?sec=PlayerRank");
}
ROhead();
rankmenu();
TableStart();

$result2 = $db("SELECT char_id, account_id, name, class, base_level, job_level, zeny, max_hp, max_sp, guild_id, save_map, save_x, save_y, partner_id, online FROM ".$dbname.".`char` WHERE char_id='$player'");
list($char_id, $account_id, $name, $class, $base_level, $job_level, $zeny, $max_hp, $max_sp, $guild_id, $save_map, $save_x, $save_y, $partner_id, $online) = $dbfetch($result2);
sql_cls($result2);


if($online==1){
$online = "<font color='green'>"._ONLINE."</font>";
}else{
$online = "<font color='red'>"._OFFLINE."</font>";
}


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
    <td class='row2' colspan='2' width='50%'><b>"._CLASS."</b>:".jobs($class)."</td>
    <td class='row2' width='50%'><b>".$partner_id2."</b></td>
  </tr>

  <tr>
    <td class='row2' width='35%'><b>"._MAXHP."</b>:".$max_hp."</td>
    <td class='row2' width='35%'><b>"._MAXSP."</b>:".$max_sp."</td>
    <td class='row2' width='30%'><b>"._LVL."</b>: ".$base_level."/".$job_level."</td>
  </tr>
  <tr>
    <td class='row2' colspan='2' width='50%'><b>"._SAVEDMAP."</b>:".$save_map." (".$save_x.",".$save_y.")</td>
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
sql_cls($result32);


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


TableEnd();
ROfoot();
}

switch($op){
case "PlayerInfo":PlayerInfo();break;
default:index();break;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>