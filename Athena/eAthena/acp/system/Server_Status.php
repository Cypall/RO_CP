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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "Server_Status.php")){
	Header("Location: ../index.php");
	die();
}

require("Settings/Basic_Config.php");

global $showstatus, $serverip, $acc_port, $char_port, $map_port;

if($_COOKIE["checked"] != "true"){
if($showstatus=="yes"){
$acc = fsockopen($serverip, $acc_port, $errno, $errstr, 1);
$char = fsockopen($serverip, $char_port, $errno, $errstr, 1);
$map = fsockopen($serverip, $map_port, $errno, $errstr, 1);
}

if(!$acc){
$acc_status = $offline;
setcookie("acc_status", "offline", $interval);
}else{
$acc_status = $online;
}

if(!$char){
$char_status = $offline;
setcookie("char_status", "offline", $interval);
}else{
$char_status = $online;
}

if(!$map){
$map_status = $offline;
setcookie("map_status", "offline", $interval);
}else{
$map_status = $online;
}

setcookie("checked", "true", $interval);
}elseif($_COOKIE["checked"] == "true"){
if($_COOKIE["acc_status"] == "offline"){
$acc_status = $offline;
}else{
$acc_status = $online;
}

if($_COOKIE["char_status"] == "offline"){
$char_status = $offline;
}else{
$char_status = $online;
}

if($_COOKIE["map_status"] == "offline"){
$map_status = $offline;
}else{
$map_status = $online;
}
}

/**************************************************/
/* This Script is an Adaptation only.             */
/* Script Credits:                                */
/* Latheesan - http://www.soulro.net              */
/**************************************************/

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>