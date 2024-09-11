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

function AdminMods(){
global $db, $dbfetch, $link2, $admin;
if(is_admin($admin)){
$handle=opendir('Addons/mods');
while ($file = readdir($handle)){
if ((!ereg("[.]",$file))){
$modlist .= "$file ";
}
}
closedir($handle);
$modlist = explode(" ", $modlist);
sort($modlist);

for($i=0; $i < sizeof($modlist); $i++){
$mod_folder = $modlist[$i];
if(!empty($mod_folder)){

$result2 = $db("SELECT mod_folder FROM "._CPBD."_mods WHERE mod_folder='$mod_folder'",$link2);
list($modfolder) = $dbfetch($result2);
sql_cls($result2);

if($modfolder!=$mod_folder){
$result = $db("insert into "._CPBD."_mods values (NULL, '$mod_folder', '0', '0', '$mod_folder')",$link2);
sql_cls($result);
}
}
}

ROhead();
menuadm();
TableStart();
echo "<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<tr>
    <td width='100%' colspan='6' class='row2' align='center'><b>"._MODSADMIN."</b><br><b><i><font color='#808080'>"._COLOR."</font></i>: "._MEANS." "._INHOME."</b></td>
  </tr>
";
$result2 = $db("SELECT mod_id, mod_name, mod_status, mod_home, mod_folder FROM "._CPBD."_mods",$link2);
echo "
<tr>
    <td width='50%' colspan='2' class='row2' align='center'><b>"._MODFOLDER."</b></td>
    <td width='50%' class='row2' align='center'><b>"._MODNAME."</b></td>
    <td width='1%' colspan='3' class='row2' align='center'><b>"._EDIT."</b></td>
  </tr>
";
while(list($mod_id, $mod_name, $mod_status, $mod_home, $mod_folder) = $dbfetch($result2)){

if(!file_exists("Addons/mods/".$mod_folder."/main.php")){
$result = $db("delete from "._CPBD."_mods where mod_id='$mod_id'",$link2);
}

if($mod_status==1){
$modstatus = "<img alt='"._ACTIVE."' src='images/active.gif' border='0'>";
$modchange = "<a href='panel.php?adm=ChangeStatusMod&mod=$mod_id'><img alt='"._DEACTIVATE."' src='images/deactive.gif' border='0'></a>";
}elseif($mod_status==0){
$modstatus = "<img alt='"._INACTIVE."' src='images/deactive.gif' border='0'>";
$modchange = "<a href='panel.php?adm=ChangeStatusMod&mod=$mod_id'><img alt='"._ACTIVATE."' src='images/active.gif' border='0'></a>";
}

if($mod_home==1){
$ital = "<i><font color='#808080'>";
}else{
$ital = "";
}

echo "
<tr>
    <td width='1%' class='row2' align='center'><img src='images/arrow.gif' border='0'></td>
    <td width='50%' class='row2'><b><a href='index.php?sec=$mod_folder'>".$ital."$mod_folder</a></b></td>
    <td width='50%' class='row2'><b><a href='index.php?sec=$mod_folder'>".$ital."$mod_name</a></b></td>
    <td width='1%' class='row2' align='center'>".$modstatus."</td>
    <td width='1%' class='row2' align='center'>".$modchange."</td>
    <td width='1%' class='row2' align='center'><a href='panel.php?adm=EditMod&mod=$mod_id'><img src='images/edit.gif' alt='"._EDIT."' border='0'></a></td>
  </tr>
";
}
echo "</table>";
sql_cls($result2);


TableEnd();
ROfoot();
}else{
header("Location: panel.php");
}
}

function ChangeStatusMod(){
global $admin, $link2, $db, $dbfetch;
if(is_admin($admin)){
$mod = $_GET['mod'];

if(empty($mod)){
header("Location: panel.php?adm=AdminMods");
}

$result2 = $db("SELECT mod_status FROM "._CPBD."_mods WHERE mod_id='$mod'",$link2);
list($mod_status) = $dbfetch($result2);
sql_cls($result2);

if($mod_status=="0"){
$newstatus = "1";
}elseif($mod_status=="1"){
$newstatus = "0";
}

$result = $db("UPDATE "._CPBD."_mods SET mod_status='$newstatus' WHERE mod_id='$mod'",$link2);
header("Location: panel.php?adm=AdminMods");

}else{
header("Location: panel.php");
}
}

function EditMod(){
global $admin, $db, $dbfetch, $link2;
if(is_admin($admin)){
$mod = $_GET['mod'];

if(empty($mod)){
$mod = $_POST['mod'];
}

$edited = $_POST['edited'];
$mod_home2 = $_POST['mod_home2'];
$mod_name2 = $_POST['mod_name2'];

if(!empty($mod)){

if(empty($edited)){
ROhead();
menuadm();
TableStart();
echo "<center><b>"._MODSADMIN."</b></center>";



$result2 = $db("SELECT mod_name, mod_home FROM "._CPBD."_mods WHERE mod_id='$mod'",$link2);
list($mod_name, $mod_home) = $dbfetch($result2);

echo "
<form method='POST' action='panel.php?adm=EditMod'>
<b>"._MODNAME."</b>: <input type='text' name='mod_name2' value='$mod_name' size='20'><br>
";

$sel = "selected";

echo "<b>"._ATHOME."</b>: <select size='1' name='mod_home2'>";

if($mod_home=="1"){
echo "<option value='1' $sel>"._YES."</option>";
}else{
echo "<option value='1'>"._YES."</option>";
}

if($mod_home=="0"){
echo "<option value='0' $sel>"._NO."</option></select>";
}else{
echo "<option value='0'>"._NO."</option></select>";
}
echo "
<br><input type='hidden' name='adm' value='EditMod'>
<input type='hidden' name='edited' value='ok'>
<input type='hidden' name='mod' value='$mod'>
<input type='submit' value='"._SUBMIT."'>
</form>
";


TableEnd();
ROfoot();
}else{
$result = $db("UPDATE "._CPBD."_mods SET mod_name='$mod_name2' WHERE mod_id='$mod'",$link2);

if($mod_home2==1){
$result = $db("UPDATE "._CPBD."_mods SET mod_home='0'",$link2);
$result = $db("UPDATE "._CPBD."_mods SET mod_home='$mod_home2' WHERE mod_id='$mod'",$link2);
}

header("Location: panel.php?adm=AdminMods");
}

}else{
header("Location: panel.php?adm=AdminMods");
}

}else{
header("Location: panel.php");
}
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>