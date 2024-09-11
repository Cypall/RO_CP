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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "main_functions.php")){
	Header("Location: ../index.php");
	die();
}

// Variables - Config File
include("Settings/Basic_Config.php");
// SQL Functions - Config File
include("system/sql_functions.php");
// Common Variables
include("system/common.php");
// Global Variables
global $CPlang, $disperror;
// Disable Error Reporting
error_reporting($disperror);
// Language Files
if(file_exists("language/lang-".$CPlang.".php")){
include("language/lang-".$CPlang.".php");
}else{
include("language/lang-spanish.php");
}

// Include the Head and Foot Functions
include("system/head_foot.php");
// Include the Blocks Functions
include("system/blocks.php");
// Include the Banners Functions
include("system/banners.php");
// Include the Admin Functions
include("system/Admin_Options.php");
// Castle Name Functions
include("system/castles.php");
// Jobs Name Functions
include("system/jobs.php");

// Login Security System Function sys_security();
function sys_security($user){
$res = TRUE;
if(empty($user)){
$res = FALSE;
}
return $res;
}

function is_admin($admin){
$res = TRUE;
if(empty($admin)){
$res = FALSE;
}
return $res;
}

function sys_admin(){
Global $ServerStatus;
session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}else{
header("Location: panel.php?adm=AdminMenu");
}
}

// Date Format
function format_date($date){
list($year,$month,$day) = explode("-",$date);

if($month=="01"){
$month = ""._JANUARY."";
}
if($month=="02"){
$month = ""._FEBRUARY."";
}
if($month=="03"){
$month = ""._MARCH."";
}
if($month=="04"){
$month = ""._APRIL."";
}
if($month=="05"){
$month = ""._MAY."";
}
if($month=="06"){
$month = ""._JUNE."";
}
if($month=="07"){
$month = ""._JULY."";
}
if($month=="08"){
$month = ""._AUGUST."";
}
if($month=="09"){
$month = ""._SEPTEMBER."";
}
if($month=="10"){
$month = ""._OCTOBER."";
}
if($month=="11"){
$month = ""._NOVEMBER."";
}
if($month=="12"){
$month = ""._DECEMBER."";
}

$date = "".$day." "._OF." ".$month." "._DEL." ".$year."";
return $date;
}

// Verify Status Function
function VerifyStatus($user){
global $db, $dbfetch, $dbnum;
$result32 = $db("SELECT account_id FROM `login` WHERE userid='$user'");
list($account_id) = $dbfetch($result32);
sql_cls($result32);

$result2 = $db("SELECT * FROM `char` WHERE account_id='$account_id' AND online='1'");
$isonline = $dbnum($result2);
sql_cls($result2);

$resultado = TRUE;
if($isonline!="0"){
$resultado = FALSE;
}
return $resultado;
}


// Welcome Message Function
function wmsg(){
global $wmsg;
TableStart2();
echo "$wmsg";
TableEnd2();
}
/**************************************************/
/*  Do Not Edit or Delete This Lines | Copyright  */
/*      Legal Notes, Copyright, Autor Links       */
/*          DO NOT MOVE THIS LINES~!!             */
/**************************************************/
$legacy = "<b>EyeX ROCP Project by</b>: <a target='_blank' href='http://eyex.sourceforge.net/'>Kiryu</a> <b>Support Board</b>: <a href='http://www.sathena.net/' target='_blank'>SAthena</a> <b>Default Skin by</b>: <a href='http://www.flow-impact.net/' target='_blank'>Kiryu</a><br>";
/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>