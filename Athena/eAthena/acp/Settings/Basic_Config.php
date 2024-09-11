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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "Basic_Config.php")){
	Header("Location: ../index.php");
	die();
}

/**************************************************/
/*     Basic Configuration of The EyeX RO CP      */
/**************************************************/

// DataBase SQL | Your Server DB Configuration
$dbhost  = "localhost";		// DataBase Host
$dbuname = "ragnarok";		// DataBase Username
$dbpass  = "ragnarok";		// DataBase Password
$dbname  = "ragnarok";		// DataBase Name

// DataBase SQL | Your CP DB Configuration
$dbhostCP  = "localhost";	// DataBase Host - You Can use The Same as Yor RO
$dbunameCP = "root";		// DataBase Username - You Can use The Same as Yor RO
$dbpassCP  = "";	// DataBase Password - You Can use The Same as Yor RO
$dbnameCP  = "eyexcp";		// DataBase Name - This is The Database of Your CP

// NOTE $pfixCP: if Your Change This, You Need To Change ALL the CP SQL Tables
$pfixCP  = "eyex";		// The CP Tables Prefix (eyex_table = ".$pfixCP."_table)
$disperror	= "1";		// Display Errors on Site? (0/1 - no/yes Default: No)

// Your Server Info.
$interval	= time()+120;			// Update Interval
$online	= "<font color='#008000'>Online</font>";		// Online Message  | Server Status
$offline	= "<font color='#FF0000'>Offline</font>";		// Offline Message | Server Status

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>