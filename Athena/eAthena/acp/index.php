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

if (!is_file("./Settings/Basic_Config.php"))
	die("<a href=\"./instalacion/instalar.php\">Comenzar la instalación.</a>");

include("system/main_functions.php");

global $link2, $admin, $db, $dbfetch;

$sec = $_GET['sec'];
if(empty($sec)){	$sec = $_POST['sec'];	}

$mainfun2 = $db("SELECT mod_folder FROM "._CPBD."_mods WHERE mod_status='1' AND mod_home='1'",$link2);
list($mod_folder1) = $dbfetch($mainfun2);
sql_cls($mainfun2);


if(empty($sec)){

if(file_exists("Addons/mods/".$mod_folder1."/main.php")){
  include("Addons/mods/".$mod_folder1."/main.php");
}else{
header("Location: error.php?code=NOHOME");
}

}else{

$mainfun3 = $db("SELECT mod_status, mod_folder FROM "._CPBD."_mods WHERE mod_folder='$sec'",$link2);
list($mod_status, $mod_folder) = $dbfetch($mainfun3);
sql_cls($mainfun3);

if(file_exists("Addons/mods/".$mod_folder."/main.php")){

if(is_admin($admin)){
		include("Addons/mods/".$mod_folder."/main.php");
}else{
	if($mod_status=="1"){
		include("Addons/mods/".$mod_folder."/main.php");
	}else{
		header("Location: error.php?code=NOACTIVE");
	}
}

}else{
header("Location: error.php?code=NOMOD");
}


}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>