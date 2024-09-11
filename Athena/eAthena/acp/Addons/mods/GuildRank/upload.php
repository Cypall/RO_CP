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

ROhead();
global $sitename, $db, $dbfetch, $dbnum;

$gid = $_POST['gid'];
$gmaster = $_POST['gmaster'];

TableStart();
echo "<center><b>"._GUILDRANK." "._OF." ".$sitename."</b><br>"._MASTEROPTIONS." <b>[ <a href='index.php?sec=GuildRank&op=GuildInfo&g=$gid'>"._BACKTOGUILD."</a> ]</b></center>";
TableEnd();
TableStart();


$target = "uploads/"; 
$ok=1; 

if ($uploaded_size > 5000) 
{ 
echo ""._FILELARGE.".<br>"; 
$ok=0; 
} 

if (!($uploaded_type=="image/bmp")) {
echo ""._ONLYBMP.".<br>";
$ok=0;
} 

if ($ok==0) 
{ 
Echo ""._NOUPLOADED.""; 
} 

else 
{ 

function findexts ($filename) 
{ 
$filename = strtolower($filename) ; 
$exts = split("[/\\.]", $filename) ; 
$n = count($exts)-1; 
$exts = $exts[$n]; 
return $exts; 
} 

$ext = findexts ($_FILES['uploaded']['name']) ;

$ran = rand () ;

$ran2 = $ran."";

$filename = "emblem-$ran2.$ext";
$target = "".$target."".$filename."";


global $link2;
$result32 = $db("SELECT gld_id, gld_master, gld_emblem, gld_msg FROM "._CPBD."_guildmasters WHERE gld_id='$gid'",$link2);
list($gld_id, $gld_master, $gld_emblem, $gld_msg) = $dbfetch($result32);
sql_cls($result32);

if(!empty($gld_emblem)){
$target2 = "uploads/$gld_emblem";
if(file_exists("$target2")){
$fh = fopen($target2, 'w') or die("can't open file");
fclose($fh);
unlink($target2);






if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{
$result = $db("UPDATE "._CPBD."_guildmasters SET gld_emblem='$filename' WHERE gld_id='$gid'",$link2);

echo ""._THEFILE." ".basename($_FILES['uploadedfile']['name'])." "._UPLOADEDOK.""; 
} 
else 
{ 
echo ""._ERRORUPLOADING.""; 
} 







}

}else{

if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{
$result = $db("insert into "._CPBD."_guildmasters values ('$gid', '$gmaster', '$filename', '')",$link2);

echo ""._THEFILE." ".basename($_FILES['uploadedfile']['name'])." "._UPLOADEDOK.""; 
} 
else 
{ 
echo ""._ERRORUPLOADING.""; 
} 

}

} 
TableEnd();
ROfoot();


/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>