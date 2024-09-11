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


require("Settings/Basic_Config.php");


$code = $_GET['code'];

if(empty($code)){
header("Location: index.php");
}

if($code=="SQL"){
// DataBase Connection
$link1 = @mysql_connect("$dbhost", "$dbuname", "$dbpass");
$result = @mysql_select_db($dbname,$link1);

if($result){
header("Location: index.php");
}

echo "<title>Error de Conexion SQL</title><center><img src='images/banner.gif' border='0'><br><b>Error de Conexion SQL</b></center>";
}

if($code=="NOHOME"){
include("system/main_functions.php");
global $db, $dbfetch;
$mainfun2 = $db("SELECT mod_folder FROM "._CPBD."_mods WHERE mod_status='1' AND mod_home='1'",$link2);
list($mod_folder1) = $dbfetch($mainfun2);

if(file_exists("Addons/mods/".$mod_folder1."/main.php")){
  include("Addons/mods/".$mod_folder1."/main.php");
}else{

ROhead();
TableStart();
echo "<title>No Se Ha Definido Mod Principal</title><center><img src='images/banner.gif' border='0'><br><b>No Se Ha Definido Mod Principal</b></center>";
TableEnd();
ROfoot();
}

}

if($code=="NOMOD"){
header("Location: index.php");
}

if($code=="NOACTIVE"){
header("Location: index.php");
}


/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>