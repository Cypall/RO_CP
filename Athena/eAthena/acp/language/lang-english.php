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

/**************************************************/
/* Translation by:                                */
/* Kiryu: http://www.flow-impact.net              */
/**************************************************/

if(stristr(htmlentities($_SERVER['PHP_SELF']), "english.php")){
	Header("Location: ../index.php");
	die();
}

define("_DB_ERROR","SQL Connection Error");
define("_DB_ECA00","Causes:");
define("_DB_ECA01","Set The DB Settings in the File Settings/Basic_Config.php");
define("_DB_ECA02","SQL Server is OffLine");
define("_DB_ECA03","Maintenance.");
define("_LOGINBLOK","LOGIN | CONNECT");
define("_SERVERBLOCK","SERVER STATUS");
define("_USERSONLINE","USERS ONLINE");
define("_BMENU","MAIN MENU");
define("_ADMINFORM","New Admin Form.");
define("_RESET","Delete Info");
define("_SUBMIT","Submit");
define("_USERNAME","UserName");
define("_PASSWORD","Password");
define("_REPASSWORD","Retype Password");
define("_ADMINLOGIN","Administration :: Login System");
define("_NEEDUSERNAME","Verify the Username");
define("_NEEDPASSWORD","Verify the Password");
define("_ADMINCP","Admin Control Panel");
define("_LOGOUT","Logout");
define("_BLOCKSADM","Blocks");
define("_BLOCKSADM2","Blocks Administration");
define("_BLOCKSFIX","Fix Blocks Position");
define("_TITLE","Title");
define("_FILE","File");
define("_EDIT","Edit");
define("_ACTIVE","Active");
define("_DEACTIVATE","Deactivate");
define("_INACTIVE","Inactive");
define("_ACTIVATE","Activate");
define("_DELETE","Delete");
define("_DOWN","Down");
define("_UP","Up");
define("_MAKEBLOCK","Make a New HTML Block");
define("_BLOCKTITLE","Block Title");
define("_HTMLCONTENT","HTML Content");
define("_ACTIVATEBLOCK","Activate Block");
define("_YES","Yes");
define("_NO","No");
define("_NICKNAME","Nickname");
define("_CONNECT","Connect");
define("_MAPSERV","Map Server");
define("_CHARSERV","Char Server");
define("_LOGINSERV","Login Server");
define("_USERSON","Users Online");
define("_GUILDNAME","Guild Name");
define("_GUILDMASTER","Guild Leader");
define("_GUILDLVL","Level");
define("_GUILDPROM","Average");
define("_GUILDEXP","Exp");
define("_GUILDRANK","Top Guilds - The Best Guilds");
define("_OF","of");
define("_GUILD","Guild");
define("_GOBACK","Go Back");
define("_GUILDCASTLES","Castles");
define("_CASTLE","Castle");
define("_CONFIG","Configuration");
define("_CONFIGSYS","Configuration System");
define("_SITENAME","Site Name");
define("_SITESLOGAN","Site Slogan");
define("_WMESSAGE","Welcome Message");
define("_SITELANG","Site Language");
define("_SITESKIN","Site Skin");
define("_FULLNEWSHOME","Full News in Home");
define("_NEWSBLOCK","News in Home Block");
define("_SHOWBANNERS","Display Right Banners");
define("_BANERPREF","Right Banners Configuration");
define("_SITEPREF","Site Basic Configuration");
define("_BANNERIMG","Banner Image");
define("_BANNERURL","Banner URL");
define("_BANNERMSG","Banner Message");
define("_BANERTARGET","Banner Target");
define("_SHOWSTATUS","Activate Server Status [Check]");
define("_SERVPREF","Server Configuration");
define("_CHARPORT","Char Port");
define("_ACCPORT","Login Port");
define("_MAPPORT","Map Port");
define("_SERVERIP","Server IP");
define("_SETCASTLES","Activate / Deactivate Castles");
define("_COLORS","Colors");
define("_STATUS","Status");
define("_CASTLES","Castles");
define("_GUILDINFO","Guild Information");
define("_GUILDALIES","Guild Alliances");
define("_MEMBER","Member");
define("_CLASSJOB","Clss / JOB");
define("_BASE","Base");
define("_JOB","Job");
define("_POSITION","Position");
define("_LVL","lvl");
define("_SELPAGE","Select Page");
define("_GUILDPREF","GuildRank Options");
define("_GRLIMIT","Number of Guilds per Page");
define("_NEWS","Stories");
define("_MODS","Mods");
define("_AUTOR","Author");
define("_DATE","Date");
define("_LATEST","Latest");
define("_NEWSADMIN","News Administration");
define("_ADDSTORY","Add Story");
define("_ADDSTORYFORM","Add Story Form");
define("_STORYTEXT","Story Text");
define("_STORYTITLE","Story Title");
define("_HTMLOK","HTML Allowed");
define("_DEL","of");
define("_JANUARY","January");
define("_FEBRUARY","February");
define("_MARCH","March");
define("_APRIL","April");
define("_MAY","May");
define("_JUNE","June");
define("_JULY","July");
define("_AUGUST","August");
define("_SEPTEMBER","September");
define("_OCTOBER","October");
define("_NOVEMBER","November");
define("_DECEMBER","December");
define("_HOME","Home");
define("_NONE","None");
define("_BLOCKIMG","Block Image");
define("_MEMBERSAREA","Members Area");
define("_LOGIN","Login");
define("_REGISTER","Register");
define("_USERLOGIN","Login System");
define("_NEWACCOUNT","New Account");
define("_SEX","Sex");
define("_EMAIL","E-Mail");
define("_MAN","Man");
define("_WOMAN","Woman");
define("_REGUSER","Register New User");
define("_LOGGEDAS","Logged As");
define("_CHANGEPASS","Change Password");
define("_CHPASSYS","Change Password System");
define("_ACTUALPASS","Actual Password");
define("_NEWPASS","New Password");
define("_CONFIRMPASS","Retype Password");
define("_VERIFEMAIL","Your Email");
define("_ERRORPASS","ERROR: Cannot Change the Password");
define("_PLEASELOGOFF","Looks Like you are Playing in the Game now, Please Logout and Try this Again");
define("_PASSCHANGED","Password Change: Success");
define("_MYINFO","My Information");
define("_WELCOME","Welcome");
define("_CHANGEMAIL","Change Email");
define("_CHANGEMAILSYS","Change Email System");
define("_ERRORMAIL","Error: Cannon Change the Email");
define("_MAILCHANGED","Email Change: Success");
define("_ACTUALMAIL","Actual Email");
define("_NEWMAIL","New Email");
define("_CONFIRMAIL","Retype Email");
define("_VERIFPASS","Your PAssword");
define("_ZENY","Zeny");
define("_SAVEDMAP","Respawn");
define("_YOURCHARINFO","Your Char Information");
define("_MAXHP","Max HP");
define("_MAXSP","Max SP");
define("_SINGLE","Single");
define("_MARRIED","Married");
define("_PARTNER","Partner");
define("_CLASS","Class");
define("_NOPARTNER","No Partner");
define("_DIVORCE","Divorce");
define("_SUBMITEDBY","Submited By");
define("_PLAYERRANK","Player Rank System");
define("_ORDERBY","Order By");
define("_ALL","View Global Rank");
define("_TOTALMEMBERS","Total Members");
define("_TOTALCHARS","Total Chars");
define("_ACTIVES","Actives");
define("_PLAYERLIMIT","Chars per Page");
define("_PLAYERPREF","PlayerRank Configuration");
define("_CHARINFO","Char Information");
define("_OWNER","Owner");
define("_HOMUNRANK","Homunculus Rank");
define("_HOMUNLIMIT","Homunculus per Page");
define("_HOMUNPREF","Homunculus Rank Configuration");
define("_MASTEROPTIONS","GuildMaster Options");
define("_CHARLENGHTW","Check the Username Limit [ More than 4 Less than 24 ]");
define("_PASSLENGHTW","Check the Password Limit [ More than 4 Less than 24 ]");
define("_SELEMBLEM","Select the Emblem (Click Browse)");
define("_EMBLEMOPTIONS","Emblem Options");
define("_EMBLEMNOTE","Notice: if you have already uploaded this Guild Emblem, We will replace the old Emblem with this new one");
define("_GUILDNOTICE","Guild Notice");
define("_CHANGEGNOTICE","Change the Guild Notice");
define("_GNOTICE","Guild Message");
define("_BACKTOGUILD","Back to Guild");
define("_ERRORUPLOADING","Sorry, there was a problem uploading your file.");
define("_THEFILE","The file");
define("_UPLOADEDOK","has been uploaded");
define("_ONLYBMP","You may only upload BMP files");
define("_FILELARGE","Your file is too large");
define("_NOUPLOADED","Sorry your file was not uploaded");
define("_SHOWONLY","Show Only");
define("_SEARCHBOX","Search Char");
define("_RESETPOSIT","Reset Position");
define("_OPTIONS","Options");
define("_RESETPOS","Reset");
define("_RESETLOOK","Reset Look");
define("_EQUIP","Equipment");
define("_UNEQUIPED","Not Equipped");
define("_EQUIPED","Equipped");
define("_RESETEKIP","Reset Equipment System");
define("_TRANSFERZENY","Transfer Zeny");
define("_TRANSZENY","Transfer Zeny System");
define("_ZENYNUM","Number of Zeny");
define("_SELECT","Select");
define("_FROM","From");
define("_TO"," to ");
define("_ZENYONCHAR","Zeny on this Char");
define("_CHARNAME","Char Name");
define("_CHARTO","Transfer to");
define("_CHANGESLOT","Change Slot");
define("_CHANGESLOTSYS","Change Slot System");
define("_SLOT","Slot");
define("_SEL","Select");
define("_CHANGE","Change");
define("_NAME","Name");
define("_SEARCHBY","Search by");
define("_BASELVL","Base Level");
define("_JOBLVL","Job Level");
define("_EXP","Experience");
define("_INTIMACY","Intimacy");
define("_SEARCHBOX2","Homunculus Searh Box");
define("_SEARCHBOX3","Guilds Search Box");
define("_MASTER","Master");
define("_INACTIVEMODS","Inactive Mods");
define("_ADMIN","Admin");
define("_MODSADMIN","Mods Administration System");
define("_COLOR","Color");
define("_MEANS","it Means");
define("_INHOME","in Home");
define("_ONLINEPLAYERS","Players Online System");
define("_ONLINEMAP","Last Map");
define("_WEHAVE","There are");
define("_PLAYERS","Players");
define("_PLAYING","Playing");
define("_ONLINE","OnLine");
define("_OFFLINE","OffLine");
define("_MODNAME","Mod Name");
define("_MODFOLDER","Mod Folder Name");
define("_RATES","Server Rates");
define("_USETHISFORMAT","(Use This Format: XX/XX/XX)");
define("_ATHOME","at Home?");
define("_SERVERINFO","Write Here Extra Server Information");
define("_SERVERINFOR","Server Information");
define("_SITERATES","Server Rates");
define("_MOREINFO","More Information");
define("_SERVERNAME","Server Name");
define("_ONLINECASTLES","Active Castles");
define("_JOBSINSERVER","Jobs List / Total Chars");
/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>