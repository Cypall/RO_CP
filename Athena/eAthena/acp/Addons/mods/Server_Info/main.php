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

$op = $_GET['op'];
if(empty($op)){
$op = $_POST['op'];
}

function index(){
global $sitename, $rates, $serverinfo, $db, $dbnum, $dbfetch, $link2;
RoHead();
TableStart();
echo "<center><b>"._SERVERINFOR."</b><br>";
echo "<b>"._SERVERNAME."</b>: $sitename<br><b>"._SITERATES."</b>: $rates<br><b>"._MOREINFO."</b>:<br>$serverinfo</center>";


$result2 = $db("SELECT castle_id, c_active FROM "._CPBD."_castle",$link2);
echo "<center><hr><table border='0' width='60%' bgcolor='#000000' cellspacing='1'>
  <tr>
    <td class='row1' colspan='3' width='100%' align='center'><b>"._ONLINECASTLES."</b></td>";

echo "
  </tr>
";
while(list($castle_id, $c_active) = $dbfetch($result2)){
echo "
  <tr>
<td class='row2' width='1%' align='center'><img src='images/arrow.gif' border='0'></td>
    <td class='row2' width='98%'>".castles($castle_id)."</td>";

if($c_active=="yes"){
echo "<td class='row2' width='1%' align='center'><font color='green'><img src='images/ON.gif' border='0' alt='"._ACTIVE."'></font></td>";
}else{
echo "<td class='row2' width='1%' align='center'><font color='red'><img src='images/OFF.gif' border='0' alt='"._INACTIVE."'></font></td>";
}

echo "
  </tr>
";
}
sql_cls($result2);
echo "</table>";


echo "<center><hr><table border='0' width='60%' bgcolor='#000000' cellspacing='1'>
  <tr>
    <td class='row1' colspan='3' width='100%' align='center'><b>"._JOBSINSERVER."</b></td>";

echo "
  </tr>
";
$result22 = $db("SELECT job_id, job_name FROM "._CPBD."_jobs",$link2);
while(list($jobid2, $jobname2) = $dbfetch($result22)){

$func242 = $db("SELECT * FROM ".$dbname.".`char` WHERE class='$jobid2'");
$regclass = $dbnum($func242);
echo "
  <tr>
<td class='row2' width='1%' align='center'><img src='images/arrow.gif' border='0'></td>
    <td class='row2' width='98%'>".$jobname2."</td>
<td class='row2' width='1%' align='center'>$regclass</td>
</tr>";
}
sql_cls($result22);
echo "</table>";



TableEnd();
ROfoot();
}


switch($op){
default:index();break;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>