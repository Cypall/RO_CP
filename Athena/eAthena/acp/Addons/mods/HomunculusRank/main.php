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
TableStart();

$orderby = $_GET['orderby'];

$query = $_GET['query'];
if(empty($query)){
$query = $_POST['query'];
}

echo "







<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='index.php?sec=HomunculusRank'>
  <tr>
    <td width='100%' colspan='2' class='row2' align='center'><b>"._HOMUNRANK."</b></td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._SEARCHBOX2."</b>:</td>
    <td width='50%' class='row2'>
<input type='hidden' name='sec' value='HomunculusRank'>
  <input type='text' name='query' size='20' value='$query'>
<input type='submit' value='"._SUBMIT."'></td>
</tr>
</form>
<form method='POST' action='index.php?sec=HomunculusRank'>


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
echo "<option value='index.php?sec=HomunculusRank&orderby=name' $sel>"._NAME."</option>";
}else{
echo "<option value='index.php?sec=HomunculusRank&orderby=name'>"._NAME."</option>";
}

if($orderby=="level"){
echo "<option value='index.php?sec=HomunculusRank&orderby=level' $sel>"._BASELVL."</option>";
}else{
echo "<option value='index.php?sec=HomunculusRank&orderby=level'>"._BASELVL."</option>";
}

if($orderby=="exp"){
echo "<option value='index.php?sec=HomunculusRank&orderby=exp' $sel>"._EXP."</option>";
}else{
echo "<option value='index.php?sec=HomunculusRank&orderby=exp'>"._EXP."</option>";
}

if($orderby=="intimacy"){
echo "<option value='index.php?sec=HomunculusRank&orderby=intimacy' $sel>"._INTIMACY."</option>";
}else{
echo "<option value='index.php?sec=HomunculusRank&orderby=intimacy'>"._INTIMACY."</option>";
}

echo "</select>
</td>
  </tr>
</form>
</table>

";

TableEnd();
}


function index(){

global $homunlimit, $dbname, $db, $dbfetch, $dbnum;
$page = $_GET["page"]; 
if (!$page) { 
$start = 0;
$page=1;
$sum122 = 0;
} 
else { 
$start = ($page - 1) * $homunlimit; 
$sum122 = ($page - 1) * $homunlimit;
}

$orderby = $_GET['orderby'];
if(empty($orderby)){
$orderby = "level";
}

$query = $_GET['query'];
if(empty($query)){
$query = $_POST['query'];
}

if(!empty($query)){
$query2 = "WHERE name LIKE '%$query%'";
}

$func24 = $db("SELECT * FROM ".$dbname.".`homunculus` $query2");
$regtotal = $dbnum($func24); 
$pages = ceil($regtotal / $homunlimit); 
sql_cls($func24);

ROhead();
rankmenu();
TableStart();
echo "<form method='get' action='index.php'>";


$result2 = $db("SELECT homun_id, char_id, class, name, level, exp, intimacy, hunger, max_hp, max_sp FROM ".$dbname.".`homunculus` $query2 ORDER BY ".$orderby." DESC LIMIT $start,$homunlimit");
while(list($homun_id, $char_id, $class, $name, $level, $exp, $intimacy, $hunger, $max_hp, $max_sp) = $dbfetch($result2)){

$result42 = $db("SELECT name FROM `char` WHERE char_id='$char_id'");
list($owner) = $dbfetch($result42);
sql_cls($result42);

echo "
<table border='0' width='100%' cellspacing='1' bgcolor='#000000'>
  <tr>
    <td class='row2' width='25%' align='center'>
<b>".$name."</b><br>
".homuns2($class)."
</td>
    <td class='row2' width='75%' align='center'>
<b>"._CHARINFO."</b>
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>

  <tr>
    <td class='row2' colspan='3' align='right' width='100%'><b>#$sum122</b></td>
  </tr>

  <tr>
    <td class='row2' width='35%'><b>"._CLASS."</b>:".homuns($class)."</td>
    <td class='row2' colspan='2' width='30%'><b>"._OWNER."</b>:<a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$owner."</a></td>
  </tr>

  <tr>
    <td class='row2' width='35%'><b>"._MAXHP."</b>:".$max_hp."</td>
    <td class='row2' width='35%'><b>"._MAXSP."</b>:".$max_sp."</td>
    <td class='row2' width='30%'><b>"._LVL."</b>: ".$level."</td>
  </tr>
";

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

if(!empty($query)){
$query3 = "&query=$query";
}

echo "<option value='index.php?sec=HomunculusRank&page=".$i."$query3' $sel>$page2</option>";
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