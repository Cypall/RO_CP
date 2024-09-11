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

include("system/main_functions.php");
include("system/DB_Connect_CP.php");

$adm = $_GET['adm'];
if(empty($adm)){
$adm = $_POST['adm'];
}

function administration(){
global $link2, $db, $dbnum, $admin;
$adminreg = $db("SELECT aid, aname, apass FROM "._CPBD."_admins",$link2);
$e3a = $dbnum($adminreg);
sql_cls($adminreg);

if($e3a=="0"){
header("location: panel.php?adm=AdminReg");
}else{

if(is_admin($admin)){
header("Location: panel.php?adm=AdminMenu");
}else{
header("Location: panel.php?adm=AdminLogin");
}

}
}

function AdminReg(){
global $link2, $db, $dbfetch, $dbnum;
$result2 = $db("SELECT aid, aname, apass FROM "._CPBD."_admins",$link2);
$e5a = $dbnum($result2);
sql_cls($result2);

if($e5a!="0"){
header("location: panel.php");
}

ROhead();
TableStart();
echo "
<center>
"._ADMINFORM."
<form method='POST' action='panel.php'>
  <b>"._USERNAME.":</b> <input type='text' name='aname' size='20'><br>
  <b>"._PASSWORD.":</b> <input type='password' name='apass' size='20'><br>
  <b>"._REPASSWORD.":</b> <input type='password' name='aretype' size='20'><br>
<input type='hidden' name='adm' value='AdminSaveRed' size='20'>
  <input type='submit' value='"._SUBMIT."'>
</form>
</center>
";
TableEnd();
ROfoot();
}

function AdminSaveRed(){
global $db, $dbnum, $link2;
$result2 = $db("SELECT aid, aname, apass FROM "._CPBD."_admins",$link2);
$e4a = $dbnum($result2);
sql_cls($result2);

if($e4a!="0"){
header("location: panel.php");
}

$aname = $_POST['aname'];
$apass = $_POST['apass'];
$aretype = $_POST['aretype'];

if(empty($aname)){
header("location: panel.php");
}elseif(empty($apass)){
header("location: panel.php");
}elseif(empty($aretype)){
header("location: panel.php");
}elseif($apass!=$aretype){
header("location: panel.php");
}else{

$passw = "".md5($apass)."";

$result = mysql_query("insert into "._CPBD."_admins values (NULL, '$aname', '$passw')",$link2);
sql_cls($result);

header("location: panel.php");
}
}

function AdminLogin(){
global $db, $dbfetch, $dbnum, $link2, $admin;
$username = $_POST['username'];
$password = $_POST['password'];
$formulario = $_POST['formulario'];

if(is_admin($admin)){
header("Location: panel.php?adm=AdminMenu");
}else{

if(empty($formulario)){
ROhead();
TableStart();
echo "<center><b>"._ADMINLOGIN."</b><br>";
echo "
    <form method='POST' action='panel.php'>
      <table>
        <tr>
          <td align=\"right\">"._USERNAME.":</td>
          <td align=\"left\">
          <input maxLength=\"23\" size=\"23\" name=\"username\">
          </td>
        </tr>
        <tr>
          <td align=\"right\">"._PASSWORD.":</td>
          <td align=\"left\">
          <input type=\"password\" maxLength=\"23\" size=\"23\" name=\"password\">
          <input type=\"hidden\" name=\"formulario\" value='ok'>
          <input type=\"hidden\" name=\"adm\" value='AdminLogin'>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type=\"submit\" value=\""._SUBMIT."\"></td>
        </tr>
      </table>
    </form>
</center>
";
TableEnd();
ROfoot();
}else{
$result2 = $db("SELECT aname, apass FROM "._CPBD."_admins WHERE aname='$username'",$link2);
list($userid, $user_pass) = $dbfetch($result2);
$ea = $dbnum($result2);
sql_cls($result2); 

$password = "".md5($password)."";

if($ea=="0"){
ROhead();
TableStart();
echo ""._NEEDUSERNAME."";
TableEnd();
ROfoot();
}elseif($password!=$user_pass){
ROhead();
TableStart();
echo ""._NEEDPASSWORD."";
TableEnd();
ROfoot();
}else{
$_SESSION["aloged"]= "$userid"; 
header("location: panel.php?adm=AdminMenu");
}

}

}

}

function menuadm(){
TableStart();
echo "
<center><b><a href='panel.php'>"._ADMINCP."</a>
<table border='0' bgcolor='#000000' width='100%' cellspacing='1' cellpadding='1'><tr>
<td align='center' class='row2' width='50%' colspan='2'>
<img src='images/banners/pwby.gif'><br><b>EyeX-ROCP Project by </b><a href='http://www.flow-impact.net' target='_blank'>Kiryu</a><br><b>
Support Board: </b><a href='http://www.sathena.net/foro/' target='_blank'>SAthena</a>
</td>
<td class='row2' align='center' width='25%'>
<b>
<a href='panel.php?adm=AdminConfig'><img alt='"._CONFIG."' src='images/menu/preferences.png' width='32' height='32' border='0'><br>"._CONFIG."</a>
</b>
</td>

<td class='row2' align='center' width='25%'>
<b>
<a href='panel.php?adm=AdminEXIT'><img alt='"._LOGOUT."' src='images/menu/logout.png' width='32' height='32' border='0'><br>"._LOGOUT."</a>
</b>
</td>

</tr><tr>
<td align='center' class='row2' width='25%'>
<b>
<a href='panel.php?adm=setcastles'><img alt='"._CASTLES."' src='images/menu/castles.png' width='32' height='32' border='0'><br>"._CASTLES."</a>
</b>
</td>
<td class='row2' align='center' width='25%'>
<a href='panel.php?adm=AdminBlocks'><img alt='"._BLOCKSADM."' src='images/menu/blocks.png' width='32' height='32' border='0'><br><b>"._BLOCKSADM."</b></a>
</td>
<td class='row2' align='center' width='25%'>
<a href='panel.php?adm=AdminMods'><img alt='"._MODS."' src='images/menu/mods.png' width='32' height='32' border='0'><br><b>"._MODS."</b></a>
</td>

<td class='row2' align='center' width='25%'>
<a href='panel.php?adm=AdminNews'><img alt='"._NEWS."' src='images/menu/news.png' width='32' height='32' border='0'><br><b>"._NEWS."</b></a>
</td>

</tr>
";


global $db, $dbfetch, $link2;

$modsadmin = $db("SELECT mod_folder FROM "._CPBD."_mods",$link2);
echo "<tr>";
while(list($modfolder) = $dbfetch($modsadmin)){
if(file_exists("Addons/mods/".$modfolder."/admin/admin.php") AND file_exists("Addons/mods/".$modfolder."/admin/functions.php")){
echo "<td class='row2' align='center' width='25%'>";
include("Addons/mods/".$modfolder."/admin/admin.php");
echo "".$linkimg."";
echo "</td>";
if ($coun == 3) {
echo "</tr><tr>";
$coun = 0;
}else{
$coun++;
}
}else{
}

}
echo "</tr>";
echo "</table>
</b></center>
";

sql_cls($modsadmin);




TableEnd();
}


function AdminMenu(){
global $admin;
if(is_admin($admin)){
ROhead();
menuadm();
ROfoot();
}else{
header("Location: panel.php");
}
}

function AdminEXIT(){
global $admin;
if(is_admin($admin)){
session_start();
session_destroy();
header("Location: panel.php");
}else{
header("Location: panel.php");
}
}

if(file_exists("Addons/mods/".$adm."/admin/functions.php")){
include("Addons/mods/".$adm."/admin/functions.php");
}else{
switch($adm){
case "FixBlocksPos":include("Addons/admin/blocks.php");FixBlocksPos();break;
case "PositBlock":include("Addons/admin/blocks.php");PositBlock();break;
case "DeleteBlock":include("Addons/admin/blocks.php");DeleteBlock();break;
case "MakeBlock":include("Addons/admin/blocks.php");MakeBlock();break;
case "UpdateBlock":include("Addons/admin/blocks.php");UpdateBlock();break;
case "EditBlock":include("Addons/admin/blocks.php");EditBlock();break;
case "DeactBlock":include("Addons/admin/blocks.php");DeactBlock();break;
case "AdminBlocks":include("Addons/admin/blocks.php");AdminBlocks();break;
case "AdminEXIT":AdminEXIT();break;
case "AdminLogin":AdminLogin();break;
case "AdminSaveRed":AdminSaveRed();break;
case "AdminLogin":AdminLogin();break;
case "AdminReg":AdminReg();break;
case "AdminMenu":AdminMenu();break;

case "AdminNews":include("Addons/admin/news.php");AdminNews();break;
case "deletestory":include("Addons/admin/news.php");deletestory();break;
case "AddStory":include("Addons/admin/news.php");AddStory();break;
case "SendStory":include("Addons/admin/news.php");SendStory();break;
case "EditStory":include("Addons/admin/news.php");EditStory();break;

case "ChangeStatusMod":include("Addons/admin/mods.php");ChangeStatusMod();break;
case "AdminMods":include("Addons/admin/mods.php");AdminMods();break;
case "EditMod":include("Addons/admin/mods.php");EditMod();break;

case "changecastle":include("Addons/admin/config_sys.php");changecastle();break;
case "setcastles":include("Addons/admin/config_sys.php");setcastles();break;
case "SaveConfChanges":include("Addons/admin/config_sys.php");SaveConfChanges();break;
case "AdminConfig":include("Addons/admin/config_sys.php");AdminConfig();break;
default:administration();break;
}

}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>