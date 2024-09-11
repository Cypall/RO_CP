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

function RankMenu(){
global $sitename;

$orderby = $_GET['orderby'];
if(empty($orderby)){
$orderby = $_POST['orderby'];
}

$query = $_GET['query'];
if(empty($query)){
$query = $_POST['query'];
}

echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='index.php?sec=GuildRank'>
  <tr>
    <td width='100%' colspan='2' class='row2' align='center'><b>"._GUILDRANK." "._OF." ".$sitename."</b></td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._SEARCHBOX3."</b>:</td>
    <td width='50%' class='row2'>
<input type='hidden' name='sec' value='GuildRank'>
  <input type='text' name='query' size='20' value='$query'>
<input type='submit' value='"._SUBMIT."'></td>
</tr>
</form>
<form method='POST' action='index.php?sec=GuildRank'>


  <tr>
    <td width='50%' class='row2' align='right'><b>"._ORDERBY."</b>:</td>
    <td width='50%' class='row2'>
<select onchange=top.location.href=this.options[this.selectedIndex].value name=page>";
$sel = "selected";
if(empty($orderby)){
echo "<option value='#'>--------- "._NONE." ---------</option>";
}else{
echo "<option value='#' $sel>--------- "._NONE." ---------</option>";
}

if($orderby=="name"){
echo "<option value='index.php?sec=GuildRank&orderby=name' $sel>"._NAME."</option>";
}else{
echo "<option value='index.php?sec=GuildRank&orderby=name'>"._NAME."</option>";
}

if($orderby=="guild_lv"){
echo "<option value='index.php?sec=GuildRank&orderby=guild_lv' $sel>"._GUILDLVL."</option>";
}else{
echo "<option value='index.php?sec=GuildRank&orderby=guild_lv'>"._GUILDLVL."</option>";
}

if($orderby=="master"){
echo "<option value='index.php?sec=GuildRank&orderby=master' $sel>"._MASTER."</option>";
}else{
echo "<option value='index.php?sec=GuildRank&orderby=master'>"._MASTER."</option>";
}

echo "</select>
</td>
  </tr>
</form>
</table>
";
}

function index(){
global $sitename, $grlimit, $dbname, $db, $dbfetch, $dbnum;
$page = $_GET["page"]; 
if (!$page) { 
$start = 0;
$page=1;
$guild = 0;
} 
else { 
$start = ($page - 1) * $grlimit; 
$guild = ($page - 1) * $grlimit; 
}

$orderby = $_GET['orderby'];
if(empty($orderby)){
$orderby = "guild_lv";
}

$query = $_GET['query'];
if(empty($query)){
$query = $_POST['query'];
}

if(!empty($query)){
$query2 = "WHERE name LIKE '%$query%'";
}

$func24 = $db("SELECT * FROM ".$dbname.".guild $query2");
$regtotal = $dbnum($func24); 
$pages = ceil($regtotal / $grlimit); 


include("system/DB_Connect_CP.php");
ROhead();
RankMenu();
TableStart();
$result = @$db("SELECT guild_id, name, char_id, master, guild_lv, average_lv, exp FROM ".$dbname.".guild $query2 ORDER BY $orderby DESC LIMIT $start,$grlimit");
echo "<form method='get' action='index.php'>";
echo "
<table border='0' width='100%' cellspacing='1' bgcolor='#000000'>
  <tr>
    <td width='1%' colspan='2' class='row2' align='center'><b>#</b></td>
    <td width='68%' class='row2' align='center'><b>"._GUILDNAME."</b></td>
    <td width='10%' class='row2' align='center'><b>"._GUILDLVL."</b></td>
    <td width='10%' class='row2' align='center'><b>"._GUILDPROM."</b></td>
    <td width='10%' class='row2' align='center'><b>"._GUILDEXP."</b></td>
  </tr>
";
while(list($guild_id, $name, $char_id, $master, $guild_lv, $average_lv, $exp) = @$dbfetch($result)){


$result32 = $db("SELECT gld_id, gld_master, gld_emblem, gld_msg FROM "._CPBD."_guildmasters WHERE gld_id='$guild_id'",$link2);
list($gld_id, $gld_master, $gld_emblem, $gld_msg) = $dbfetch($result32);
sql_cls($result32);


if(!empty($gld_emblem)){
$themblem = "<img border='0' alt='$name' width='24' height='24' src='uploads/$gld_emblem'>";
}else{
$themblem = "<img border='0' alt='$name' width='24' height='24' src='images/blank.gif'>";
}


echo "
  <tr>
    <td width='1%' class='row2' align='center'>$guild</td>
    <td width='1%' class='row2' align='center'>".$themblem."</td>
    <td width='68%' class='row2'>
<table border='0' width='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='1%'><img src='images/arrow4.gif' border='0'></td>
    <td width='99%' align='center'><a href='index.php?sec=GuildRank&op=GuildInfo&g=$guild_id'>$name</a></td>
  </tr>
</table>
	</td>
    <td width='10%' class='row2' align='center'>$guild_lv</td>
    <td width='10%' class='row2' align='center'>$average_lv</td>
    <td width='10%' class='row2' align='center'>$exp</td>
  </tr>
";
$guild++;
}
echo "</table>";

@sql_cls($result); 

if(!empty($query)){
$query2 = "&query=$query";
}

if(!empty($orderby)){
$orderby2 = "&orderby=$orderby";
}

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
echo "<option value='index.php?sec=GuildRank".$query2."".$orderby2."&page=".$i."' $sel>$page2</option>";
}
echo "</select>";
}
echo "</center>";



TableEnd2();
TableStart2();

echo "<center><b>"._GUILDCASTLES."</b></center>";
$result2 = @$db("SELECT castle_id, guild_id  FROM ".$dbname.".`guild_castle`");
echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
  <tr>
    <td width='1%' colspan='2' class='row2' align='center'><b>#</b></td>
    <td width='35%' class='row2' align='center'><b>"._CASTLE."</b></td>
    <td width='65%' class='row2' align='center'><b>"._GUILD."</b></td>
    <td width='5%' class='row2' align='center'><b>"._GUILDLVL."</b></td>
  </tr>
";
global $dbnameCP, $pfixCP, $dbname;
while(list($castle_id, $guild_id) = @$dbfetch($result2)){


$result32 = $db("SELECT gld_id, gld_master, gld_emblem, gld_msg FROM "._CPBD."_guildmasters WHERE gld_id='$guild_id'",$link2);
list($gld_id, $gld_master, $gld_emblem, $gld_msg) = $dbfetch($result32);
sql_cls($result32);


$result4 = @$db("SELECT name, char_id, master, guild_lv FROM ".$dbname.".guild WHERE guild_id='$guild_id'");
list($name, $char_id, $master, $guild_lv) = @$dbfetch($result4);
sql_cls($result4);

$result244 = $db("SELECT c_active FROM "._CPBD."_castle WHERE castle_id='$castle_id'",$link2);
list($cact) = $dbfetch($result244);
sql_cls($result244);

if($cact=="yes"){
$status = "<font color='green'><img src='images/ON.gif' border='0' alt='"._ACTIVE."'></font>";
}else{
$status = "<font color='red'><img src='images/OFF.gif' border='0' alt='"._INACTIVE."'></font>";
}

if(!empty($gld_emblem)){
$themblem = "<img border='0' alt='$name' width='24' height='24' src='uploads/$gld_emblem'>";
}else{
$themblem = "<img border='0' alt='$name' width='24' height='24' src='images/blank.gif'>";
}

echo "
  <tr>
    <td width='1%' class='row2' align='center'>".$status."</td>
    <td width='1%' class='row2' align='center'>".$themblem."</td>
    <td width='35%' class='row2' align='center'>".castles($castle_id)."</td>
    <td width='65%' class='row2' align='center'><a href='index.php?sec=GuildRank&op=GuildInfo&g=$guild_id'>".$name."</a></td>
    <td width='5%' class='row2' align='center'>".$guild_lv."</td>
  </tr>
";
}
echo "</table>";

TableEnd();
ROfoot();
@sql_cls($result2); 
}

function GuildInfo(){
global $sitename, $nickname, $db, $dbfetch, $dbnum;
$g = $_GET['g'];
$result = @$db("SELECT guild_id, name, char_id, master, guild_lv, average_lv, exp  FROM `guild` WHERE guild_id='$g'");
list($guild_id, $name, $char_id, $master, $guild_lv, $average_lv, $exp) = @$dbfetch($result);
sql_cls($result);
ROhead();
TableStart();



$result9 = @$db("SELECT account_id  FROM `char` WHERE name='$master'");
list($maccount) = @$dbfetch($result9);
sql_cls($result9);


echo "<center><b>"._GUILDRANK." "._OF." ".$sitename."</b></center>";



$result9 = @$db("SELECT account_id  FROM `login` WHERE userid='$nickname'");
list($account) = @$dbfetch($result9);
sql_cls($result9);

if($maccount==$account){
$masteroptions = "<br>[ <b><a href='index.php?sec=GuildRank&op=MasterOptions&g=$g'>Opciones de GuildMaster</a></b> ]";
}

TableEnd();
TableStart();
global $dbnameCP, $pfixCP, $link2;
$result32 = $db("SELECT gld_id, gld_master, gld_emblem, gld_msg FROM "._CPBD."_guildmasters WHERE gld_id='$g'",$link2);
list($gld_id, $gld_master, $gld_emblem, $gld_msg) = $dbfetch($result32);
sql_cls($result32);

if(!empty($gld_msg)){
$gnotice = "<br><b>"._GNOTICE."</b>: $gld_msg";
}

if(!empty($gld_emblem)){
$themblem = "<img class='imagefade' absolute' border='0' alt='$name' width='24' height='24' src='uploads/$gld_emblem'>";
}else{
$themblem = "<img class='imagefade' border='0' alt='$name' width='24' height='24' src='images/blank.gif'>";
}
echo "<center><b>"._GUILD.": <a href='index.php?sec=GuildRank&op=GuildInfo&g=$g'>$name</a></b>".$gnotice."$masteroptions</center>";


echo "
<table border='0' width='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='50%' valign='top'>


".$themblem."<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
  <tr>
    <td width='100%' class='row2' colspan='2' align='center'><b>"._GUILDINFO.":</b></td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._GUILDMASTER.":</b></td>
    <td width='50%' class='row1'><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$master."</a></td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._GUILDLVL.":</b></td>
    <td width='50%' class='row1'>".$guild_lv."</td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._GUILDPROM.":</b></td>
    <td width='50%' class='row1'>".$average_lv."</td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._GUILDEXP.":</b></td>
    <td width='50%' class='row1'>".$exp."</td>
  </tr>
</table>

</td>
    <td width='50%' valign='top'>

<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
  <tr>
    <td width='100%' class='row2' align='center'><b>"._GUILDALIES.":</b></td>
  </tr>
";
$result3 = $db("SELECT alliance_id FROM guild_alliance WHERE guild_id='$guild_id'");

while(list($alliance_id) = $dbfetch($result3)){

$result44 = @$db("SELECT guild_id, name, master, guild_lv FROM ".$dbname.".guild WHERE guild_id='$alliance_id' ORDER BY name ASC LIMIT 0,3");
list($guild_id4, $name4, $master4, $guild_lv4) = @$dbfetch($result44);
sql_cls($result44);

echo "
  <tr>
    <td width='100%' class='row1' align='center'><a href='index.php?sec=GuildRank&op=GuildInfo&g=$guild_id4'>$name4</a> <b>"._LVL."</b>: $guild_lv4</td>
  </tr>
";
}
sql_cls($result3);

echo "
  <tr>
    <td width='100%' class='row2' align='center'>[ <b><a href='index.php?sec=GuildRank'>"._GOBACK."</a></b> ]</td>
  </tr>
</table>

</td>
  </tr>
</table>
";

$result3 = $db("SELECT char_id, position FROM guild_member WHERE guild_id='$guild_id' ORDER BY position ASC");
echo "
<table border='0' width='100%' cellspacing='1' bgcolor='#000000'>
  <tr>
    <td width='35%' class='row2' align='center'><b>"._MEMBER."</b></td>
    <td width='30%' class='row2' align='center'><b>"._CLASSJOB."</b></td>
    <td width='1%' class='row2' align='center'><b>"._BASE."</b></td>
    <td width='1%' class='row2' align='center'><b>"._JOB."</b></td>
    <td width='35%' class='row2' align='center'><b>"._POSITION."</b></td>
  </tr>
";
while(list($char_id2, $position2) = $dbfetch($result3)){

$result4 = $db("SELECT name, class, base_level, job_level FROM `char` WHERE char_id='$char_id2'");
list($name, $class, $base_level, $job_level) = $dbfetch($result4);
sql_cls($result4);

$result4 = $db("SELECT name FROM guild_position WHERE guild_id='$guild_id' AND position='$position2'");
list($pos_name) = $dbfetch($result4);
sql_cls($result4);
echo "
  <tr>
    <td width='35%' class='row2' align='center'><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id2'>".$name."</a></td>
    <td width='30%' class='row2' align='center'>".jobs($class)."</td>
    <td width='1%' class='row2' align='center'>$base_level</td>
    <td width='1%' class='row2' align='center'>$job_level</td>
    <td width='35%' class='row2' align='center'>$pos_name</td>
  </tr>
";
}
sql_cls($result3);
echo "</table>";

TableEnd();
ROfoot();
}

function MasterOptions(){
global $nickname, $sitename, $db, $dbfetch, $dbnum;
$g = $_GET['g'];
$result = @$db("SELECT guild_id, name, char_id, master, guild_lv, average_lv, exp  FROM `guild` WHERE guild_id='$g'");
list($guild_id, $name, $char_id, $master, $guild_lv, $average_lv, $exp) = @$dbfetch($result);
sql_cls($result);

$result9 = @$db("SELECT account_id  FROM `char` WHERE name='$master'");
list($maccount) = @$dbfetch($result9);
sql_cls($result9);

$result9 = @$db("SELECT account_id  FROM `login` WHERE userid='$nickname'");
list($account) = @$dbfetch($result9);
sql_cls($result9);

if($maccount!=$account){
header("Location: index.php?sec=GuildRank");
}

ROhead();
TableStart();
echo "<center><b>"._GUILDRANK." "._OF." ".$sitename."</b><br>"._MASTEROPTIONS." <b>[ <a href='index.php?sec=GuildRank&op=GuildInfo&g=$g'>$name</a> ]</b></center>";
TableEnd();

echo "<br>";

TableStart();

echo "
<table width='100%' bgcolor='#000000' cellspacing='1' border='0'>
<tr><td width='100%' class='row2' align='center'>
<b>"._EMBLEMOPTIONS."</b>
</td></tr>
<form enctype='multipart/form-data' action='index.php?sec=GuildRank' method='POST'>
<tr><td width='100%' class='row2' align='center'>
<b>"._SELEMBLEM."</b>:
</td></tr>
<tr><td width='100%' class='row2' align='center'>
<input name='uploaded' type='file'>
</td></tr>
<tr><td width='100%' class='row2' align='center'>
<input type='hidden' name='gid' value='$guild_id'><input type='hidden' name='gmaster' value='$master'><input type='hidden' name='op' value='UploadFile'><input type='submit' value='"._SUBMIT."'>
</td></tr>
<tr><td width='100%' class='row2' align='center'>
<b>"._EMBLEMNOTE."</b>
</td></tr>
</form> 
</table>
";

TableEnd();

echo "<br>";

TableStart();

global $dbnameCP, $pfixCP, $link2;
$result32 = $db("SELECT gld_id, gld_master, gld_emblem, gld_msg FROM "._CPBD."_guildmasters WHERE gld_id='$g'",$link2);
list($gld_id, $gld_master, $gld_emblem, $gld_msg) = $dbfetch($result32);
sql_cls($result32);

echo "
<table width='100%' bgcolor='#000000' cellspacing='1' border='0'>
<tr><td width='100%' class='row2' align='center'>
<b>"._GUILDNOTICE."</b>
</td></tr>
<form enctype='multipart/form-data' action='index.php?sec=GuildRank' method='POST'>
<tr><td width='100%' class='row2' align='center'>
<b>"._CHANGEGNOTICE."</b>:
</td></tr>
<tr>
<td width='100%' class='row2' align='center'>
<textarea rows='5' name='gmsg' cols='80'>$gld_msg</textarea>
</td></tr>
<tr><td width='100%' class='row2' align='center'>
<input type='hidden' name='gid' value='$guild_id'>
<input type='hidden' name='gmaster' value='$master'>
<input type='hidden' name='op' value='ChangeGuildMSG'>
<input type='submit' value='"._SUBMIT."'>
</td></tr>
</form> 
</table>
";

TableEnd();
ROfoot();
}

function ChangeGuildMSG(){
$gid = $_POST['gid'];
$gmaster = $_POST['gmaster'];
$gmsg = $_POST['gmsg'];

global $link2, $db, $dbfetch, $dbnum;
$result32 = $db("SELECT gld_id, gld_master, gld_emblem, gld_msg FROM "._CPBD."_guildmasters WHERE gld_id='$gid'",$link2);
list($gld_id, $gld_master, $gld_emblem, $gld_msg) = $dbfetch($result32);
$ea = $dbnum($result32);
sql_cls($result32);

if($ea!="0"){
$result = $db("UPDATE "._CPBD."_guildmasters SET gld_msg='$gmsg' WHERE gld_id='$gid'",$link2);
header("Location: index.php?sec=GuildRank&op=MasterOptions&g=$gid");
}else{
$result = $db("insert into "._CPBD."_guildmasters values ('$gid', '$gmaster', '', '$gmsg')",$link2);
header("Location: index.php?sec=GuildRank&op=MasterOptions&g=$gid");
}
}

switch($op){
case "ChangeGuildMSG":ChangeGuildMSG();break;
case "UploadFile":include("Addons/mods/GuildRank/upload.php");break;
case "MasterOptions":MasterOptions();break;
case "GuildInfo":GuildInfo();break;
default:index();break;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>