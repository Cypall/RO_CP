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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "castles.php")){
	Header("Location: ../index.php");
	die();
}

function jobs($job){
global $db, $dbfetch, $link2;

$result2 = $db("SELECT job_name FROM "._CPBD."_jobs WHERE job_id='$job'",$link2);
list($jobname) = $dbfetch($result2);

sql_cls($result2); 
return $jobname;
}

function jobs2($job,$nick){
global $db, $dbfetch, $link2;

$result23 = $db("SELECT sex FROM login WHERE userid='$nick'");
list($sex) = $dbfetch($result23);
sql_cls($result23); 

$result2 = $db("SELECT job_name FROM "._CPBD."_jobs WHERE job_id='$job'",$link2);
list($jobname) = $dbfetch($result2);
sql_cls($result2); 

if(file_exists("images/Class/".$sex."/".$job.".gif")){
$jobname = "<img src='images/Class/".$sex."/".$job.".gif' border='0' alt='$jobname'>";
}
return $jobname;
}

function homuns($class){
global $db, $dbfetch, $link2;

$result2 = $db("SELECT homun_name FROM "._CPBD."_homun WHERE homun_id='$class'",$link2);
list($name) = $dbfetch($result2);
sql_cls($result2); 

return $name;
}

function homuns2($class){
global $db, $dbfetch, $link2;

$result2 = $db("SELECT homun_name FROM "._CPBD."_homun WHERE homun_id='$class'",$link2);
list($name) = $dbfetch($result2);
sql_cls($result2); 

if(file_exists("images/Class/Homunculus/".$class.".gif")){
$homunculus = "<img src='images/Class/Homunculus/".$class.".gif' border='0' alt='$name'>";
}
return $homunculus;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>