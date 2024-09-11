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

function AdminConfig(){
global $db, $dbfetch, $link2;
global $sitename, $siteslogan, $wmsg, $CPlang, $siteskin, $cnewshome, $newsblock, $showbanners, $linktarget, $showstatus, $serverip;
global $acc_port, $char_port, $map_port, $grlimit, $playerlimit, $homunlimit, $rates, $serverinfo;
global $banner1, $banurl1, $banmsg1, $banner2, $banurl2, $banmsg2, $banner3, $banurl3, $banmsg3, $banner4, $banurl4, $banmsg4;
ROhead();
menuadm();

session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

TableStart();
echo "<center><b>"._CONFIGSYS."</b></center>";
echo "
<form method='POST' action='panel.php'>
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<tr>
<td align='center' width='100%' class='row2' colspan='2'>
<b><img src='images/arrow2.gif' border='0'><font color='red'>"._SITEPREF."</font></b><img src='images/arrow2.gif' border='0'>
</td>
</tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._SITENAME.":</b></td>
    <td class='row2' width='50%'><input type='text' name='sitename2' value='$sitename' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._SITESLOGAN.":</b></td>
    <td class='row2' width='50%'><input type='text' name='siteslogan2' value='$siteslogan' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='100%' colspan='2' align='center'><b>"._WMESSAGE.":</b><br><textarea rows='4' name='wmsg2' cols='100'>$wmsg</textarea></td>
  </tr>

<tr>
    <td class='row2' width='50%' align='right'><b>"._SITELANG.":</b></td>
    <td class='row2' width='50%'>
	<select name='CPlang2'>";

    $handle=opendir('language');
    while ($file = readdir($handle)) {
	if (ereg("^lang\-(.+)\.php", $file, $matches)) {
            $langFound = $matches[1];
            $languageslist .= "$langFound ";
        }
    }
    closedir($handle);
    $languageslist = explode(" ", $languageslist);
    sort($languageslist);
    for ($i=0; $i < sizeof($languageslist); $i++) {
	if(!empty($languageslist[$i])) {
	    echo "<option name='CPlang2' value='$languageslist[$i]' ";
		if($languageslist[$i]==$CPlang) echo "selected";
		echo ">".ucfirst($languageslist[$i])."\n";
	}
    }
    echo "</select>";



echo "</td>
</tr>








<tr>
    <td class='row2' width='50%' align='right'><b>"._SITESKIN.":</b></td>
    <td class='row2' width='50%'>
    <select name='siteskin2'>";


    $handle=opendir('Skin');
    while ($file = readdir($handle)) {
	if ( (!ereg("[.]",$file)) ) {
		$themelist .= "$file ";
	}
    }
    closedir($handle);
    $themelist = explode(" ", $themelist);
    sort($themelist);
    for ($i=0; $i < sizeof($themelist); $i++) {
	if(!empty($themelist[$i])) {
	    echo "<option name='siteskin2' value='$themelist[$i]' ";
		if($themelist[$i]==$siteskin) echo "selected";
		echo ">$themelist[$i]\n";
	}
    }
    echo "</select>";



echo "</td>
</tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._FULLNEWSHOME.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='cnewshome2'>";
$sel = "selected";

if($cnewshome==1){
echo "<option value='1' $sel>1</option>";
}else{
echo "<option value='1'>1</option>";
}
if($cnewshome==2){
echo "<option value='2' $sel>2</option>";
}else{
echo "<option value='2'>2</option>";
}
if($cnewshome==3){
echo "<option value='3' $sel>3</option>";
}else{
echo "<option value='3'>3</option>";
}
if($cnewshome==4){
echo "<option value='4' $sel>4</option>";
}else{
echo "<option value='4'>4</option>";
}
if($cnewshome==5){
echo "<option value='5' $sel>5</option>";
}else{
echo "<option value='5'>5</option>";
}
if($cnewshome==10){
echo "<option value='10' $sel>10</option>";
}else{
echo "<option value='10'>10</option>";
}
if($cnewshome==15){
echo "<option value='15' $sel>15</option>";
}else{
echo "<option value='15'>15</option>";
}
if($cnewshome==20){
echo "<option value='20' $sel>20</option>";
}else{
echo "<option value='20'>20</option>";
}

echo "
</select>
</td>
  </tr>


  <tr>
    <td class='row2' width='50%' align='right'><b>"._NEWSBLOCK.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='newsblock2'>";
$sel = "selected";

if($newsblock==1){
echo "<option value='1' $sel>1</option>";
}else{
echo "<option value='1'>1</option>";
}
if($newsblock==2){
echo "<option value='2' $sel>2</option>";
}else{
echo "<option value='2'>2</option>";
}
if($newsblock==3){
echo "<option value='3' $sel>3</option>";
}else{
echo "<option value='3'>3</option>";
}
if($newsblock==4){
echo "<option value='4' $sel>4</option>";
}else{
echo "<option value='4'>4</option>";
}
if($newsblock==5){
echo "<option value='5' $sel>5</option>";
}else{
echo "<option value='5'>5</option>";
}
if($newsblock==10){
echo "<option value='10' $sel>10</option>";
}else{
echo "<option value='10'>10</option>";
}
if($newsblock==15){
echo "<option value='15' $sel>15</option>";
}else{
echo "<option value='15'>15</option>";
}
if($newsblock==20){
echo "<option value='20' $sel>20</option>";
}else{
echo "<option value='20'>20</option>";
}

echo "
</select>
</td>
  </tr>
<tr>
<td align='center' width='100%' class='row2' colspan='2'>
<b><img src='images/arrow2.gif' border='0'><font color='red'>"._BANERPREF."</font></b><img src='images/arrow2.gif' border='0'>
</td>
</tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._SHOWBANNERS.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='showbanners2'>";
$sel = "selected";

if($showbanners==1){
echo "<option value='1' $sel>"._YES."</option>";
}else{
echo "<option value='1'>"._YES."</option>";
}
if($showbanners==0){
echo "<option value='0' $sel>"._NO."</option>";
}else{
echo "<option value='0'>"._NO."</option>";
}

echo "
</select>
</td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANERTARGET.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='linktarget2'>";
$sel = "selected";
if($linktarget == "_parent"){
echo "<option value='_parent' $sel>_parent</option>";
}else{
echo "<option value='_parent'>_parent</option>";
}

if($linktarget == "_blank"){
echo "<option value='_blank' $sel>_blank</option>";
}else{
echo "<option value='_blank'>_blank</option>";
}

if($linktarget == "_top"){
echo "<option value='_top' $sel>_top</option>";
}else{
echo "<option value='_top'>_top</option>";
}

if($linktarget == "_self"){
echo "<option value='_self' $sel>_self</option>";
}else{
echo "<option value='_self'>_self</option>";
}

echo "
</select>
</td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERIMG." 1:</b></td>
    <td class='row2' width='50%'><input type='text' name='banner12' value='$banner1' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERURL." 1:</b></td>
    <td class='row2' width='50%'><input type='text' name='banurl12' value='$banurl1' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERMSG." 1:</b></td>
    <td class='row2' width='50%'><input type='text' name='banmsg12' value='$banmsg1' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERIMG." 2:</b></td>
    <td class='row2' width='50%'><input type='text' name='banner22' value='$banner2' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERURL." 2:</b></td>
    <td class='row2' width='50%'><input type='text' name='banurl22' value='$banurl2' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERMSG." 2:</b></td>
    <td class='row2' width='50%'><input type='text' name='banmsg22' value='$banmsg2' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERIMG." 3:</b></td>
    <td class='row2' width='50%'><input type='text' name='banner32' value='$banner3' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERURL." 3:</b></td>
    <td class='row2' width='50%'><input type='text' name='banurl32' value='$banurl3' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERMSG." 3:</b></td>
    <td class='row2' width='50%'><input type='text' name='banmsg32' value='$banmsg3' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERIMG." 4:</b></td>
    <td class='row2' width='50%'><input type='text' name='banner42' value='$banner4' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERURL." 4:</b></td>
    <td class='row2' width='50%'><input type='text' name='banurl42' value='$banurl4' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._BANNERMSG." 4:</b></td>
    <td class='row2' width='50%'><input type='text' name='banmsg42' value='$banmsg4' size='40'></td>
  </tr>

<tr>
<td align='center' width='100%' class='row2' colspan='2'>
<b><img src='images/arrow2.gif' border='0'><font color='red'>"._SERVPREF."</font></b><img src='images/arrow2.gif' border='0'>
</td>
</tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._RATES.":</b></td>
    <td class='row2' width='50%'>"._USETHISFORMAT."<br><input type='text' name='rates2' value='$rates' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='100%' colspan='2' align='center'><b>"._SERVERINFO.":</b><br><textarea rows='4' name='serverinfo2' cols='100'>$serverinfo</textarea></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._SHOWSTATUS.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='showstatus2'>";
$sel = "selected";

if($showstatus=="yes"){
echo "<option value='yes' $sel>"._YES."</option>";
}else{
echo "<option value='yes'>"._YES."</option>";
}
if($showstatus=="no"){
echo "<option value='no' $sel>"._NO."</option>";
}else{
echo "<option value='no'>"._NO."</option>";
}

echo "
</select>

</td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._SERVERIP.":</b></td>
    <td class='row2' width='50%'><input type='text' name='serverip2' value='$serverip' size='40'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._ACCPORT.":</b></td>
    <td class='row2' width='50%'><input type='text' name='acc_port2' value='$acc_port' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._CHARPORT.":</b></td>
    <td class='row2' width='50%'><input type='text' name='char_port2' value='$char_port' size='40'></td>
  </tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._MAPPORT.":</b></td>
    <td class='row2' width='50%'><input type='text' name='map_port2' value='$map_port' size='40'></td>
  </tr>

<tr>
<td align='center' width='100%' class='row2' colspan='2'>
<b><img src='images/arrow2.gif' border='0'><font color='red'>"._GUILDPREF."</font></b><img src='images/arrow2.gif' border='0'>
</td>
</tr>

  <tr>
    <td class='row2' width='50%' align='right'><b>"._GRLIMIT.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='grlimit2'>";
$sel = "selected";

if($grlimit==1){
echo "<option value='1' $sel>1</option>";
}else{
echo "<option value='1'>1</option>";
}
if($grlimit==2){
echo "<option value='2' $sel>2</option>";
}else{
echo "<option value='2'>2</option>";
}
if($grlimit==3){
echo "<option value='3' $sel>3</option>";
}else{
echo "<option value='3'>3</option>";
}
if($grlimit==4){
echo "<option value='4' $sel>4</option>";
}else{
echo "<option value='4'>4</option>";
}
if($grlimit==5){
echo "<option value='5' $sel>5</option>";
}else{
echo "<option value='5'>5</option>";
}
if($grlimit==10){
echo "<option value='10' $sel>10</option>";
}else{
echo "<option value='10'>10</option>";
}
if($grlimit==15){
echo "<option value='15' $sel>15</option>";
}else{
echo "<option value='15'>15</option>";
}
if($grlimit==20){
echo "<option value='20' $sel>20</option>";
}else{
echo "<option value='20'>20</option>";
}

echo "
</select>
</td>
  </tr>


<tr>
<td align='center' width='100%' class='row2' colspan='2'>
<b><img src='images/arrow2.gif' border='0'><font color='red'>"._PLAYERPREF."</font></b><img src='images/arrow2.gif' border='0'>
</td>
</tr>


  <tr>
    <td class='row2' width='50%' align='right'><b>"._PLAYERLIMIT.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='playerlimit2'>";
$sel = "selected";

if($playerlimit==1){
echo "<option value='1' $sel>1</option>";
}else{
echo "<option value='1'>1</option>";
}
if($playerlimit==2){
echo "<option value='2' $sel>2</option>";
}else{
echo "<option value='2'>2</option>";
}
if($playerlimit==3){
echo "<option value='3' $sel>3</option>";
}else{
echo "<option value='3'>3</option>";
}
if($playerlimit==4){
echo "<option value='4' $sel>4</option>";
}else{
echo "<option value='4'>4</option>";
}
if($playerlimit==5){
echo "<option value='5' $sel>5</option>";
}else{
echo "<option value='5'>5</option>";
}
if($playerlimit==10){
echo "<option value='10' $sel>10</option>";
}else{
echo "<option value='10'>10</option>";
}
if($playerlimit==15){
echo "<option value='15' $sel>15</option>";
}else{
echo "<option value='15'>15</option>";
}
if($playerlimit==20){
echo "<option value='20' $sel>20</option>";
}else{
echo "<option value='20'>20</option>";
}

echo "
</select>
</td>
  </tr>








<tr>
<td align='center' width='100%' class='row2' colspan='2'>
<b><img src='images/arrow2.gif' border='0'><font color='red'>"._HOMUNPREF."</font></b><img src='images/arrow2.gif' border='0'>
</td>
</tr>


  <tr>
    <td class='row2' width='50%' align='right'><b>"._HOMUNLIMIT.":</b></td>
    <td class='row2' width='50%'>
<select size='1' name='homunlimit2'>";
$sel = "selected";

if($homunlimit==1){
echo "<option value='1' $sel>1</option>";
}else{
echo "<option value='1'>1</option>";
}
if($homunlimit==2){
echo "<option value='2' $sel>2</option>";
}else{
echo "<option value='2'>2</option>";
}
if($homunlimit==3){
echo "<option value='3' $sel>3</option>";
}else{
echo "<option value='3'>3</option>";
}
if($homunlimit==4){
echo "<option value='4' $sel>4</option>";
}else{
echo "<option value='4'>4</option>";
}
if($homunlimit==5){
echo "<option value='5' $sel>5</option>";
}else{
echo "<option value='5'>5</option>";
}
if($homunlimit==10){
echo "<option value='10' $sel>10</option>";
}else{
echo "<option value='10'>10</option>";
}
if($homunlimit==15){
echo "<option value='15' $sel>15</option>";
}else{
echo "<option value='15'>15</option>";
}
if($homunlimit==20){
echo "<option value='20' $sel>20</option>";
}else{
echo "<option value='20'>20</option>";
}

echo "
</select>
</td>
  </tr>


  <tr>
    <td class='row2' width='100%' colspan='2' align='center'>
<input type='hidden' name='adm' value='SaveConfChanges'>
<input type='submit' value='"._SUBMIT."'>
</form>
    </td>
  </tr>
</table>
";

TableEnd();
ROfoot();
}

function SaveConfChanges(){
global $db, $dbfetch, $link2;

session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

$sitename2 = $_POST['sitename2'];
$siteslogan2 = $_POST['siteslogan2'];
$wmsg2 = $_POST['wmsg2'];
$CPlang2 = $_POST['CPlang2'];
$siteskin2 = $_POST['siteskin2'];
$cnewshome2 = $_POST['cnewshome2'];
$newsblock2 = $_POST['newsblock2'];
$showbanners2 = $_POST['showbanners2'];
$banner12 = $_POST['banner12'];
$banurl12 = $_POST['banurl12'];
$banmsg12 = $_POST['banmsg12'];
$banner22 = $_POST['banner22'];
$banurl22 = $_POST['banurl22'];
$banmsg22 = $_POST['banmsg22'];
$banner32 = $_POST['banner32'];
$banurl32 = $_POST['banurl32'];
$banmsg32 = $_POST['banmsg32'];
$banner42 = $_POST['banner42'];
$banurl42 = $_POST['banurl42'];
$banmsg42 = $_POST['banmsg42'];
$linktarget2 = $_POST['linktarget2'];
$showstatus2 = $_POST['showstatus2'];
$serverip2 = $_POST['serverip2'];
$acc_port2 = $_POST['acc_port2'];
$char_port2 = $_POST['char_port2'];
$map_port2 = $_POST['map_port2'];
$grlimit2 = $_POST['grlimit2'];
$playerlimit2 = $_POST['playerlimit2'];
$homunlimit2 = $_POST['homunlimit2'];
$rates2 = $_POST['rates2'];
$serverinfo2 = $_POST['serverinfo2'];

$result = $db("UPDATE "._CPBD."_config SET sitename='$sitename2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET siteslogan='$siteslogan2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET wmsg='$wmsg2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET CPlang='$CPlang2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET siteskin='$siteskin2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET cnewshome='$cnewshome2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET newsblock='$newsblock2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET showbanners='$showbanners2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banner1='$banner12'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banurl1='$banurl12'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banmsg1='$banmsg12'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banner2='$banner22'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banurl2='$banurl22'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banmsg2='$banmsg22'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banner3='$banner32'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banurl3='$banurl32'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banmsg3='$banmsg32'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banner4='$banner42'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banurl4='$banurl42'",$link2);
$result = $db("UPDATE "._CPBD."_config SET banmsg4='$banmsg42'",$link2);
$result = $db("UPDATE "._CPBD."_config SET linktarget='$linktarget2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET showstatus='$showstatus2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET serverip='$serverip2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET acc_port='$acc_port2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET char_port='$char_port2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET map_port='$map_port2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET grlimit='$grlimit2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET playerlimit='$playerlimit2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET homunlimit='$homunlimit2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET rates='$rates2'",$link2);
$result = $db("UPDATE "._CPBD."_config SET serverinfo='$serverinfo2'",$link2);

header("Location: panel.php?adm=AdminConfig");
}

function setcastles(){
global $db, $dbfetch, $link2;
ROhead();
menuadm();

session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

TableStart();
$result2 = $db("SELECT castle_id, c_active FROM "._CPBD."_castle",$link2);
echo "<center><b>"._SETCASTLES."</b></center>";
echo "<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";




echo "
  <tr>
    <td class='row2' width='98%' align='center'><b>"._CASTLE."</b></td>";

echo "<td class='row2' width='1%' colspan='3' align='center'><b>"._EDIT."</b></td>
";

echo "
  </tr>
";

while(list($castle_id, $c_active) = $dbfetch($result2)){

echo "
  <tr>
    <td class='row2' width='98%'>".castles($castle_id)."</td>";

if($c_active=="yes"){
echo "<td class='row2' width='1%' align='center'><font color='green'><img src='images/ON.gif' border='0' alt='"._ACTIVE."'></font></td>";
}else{
echo "<td class='row2' width='1%' align='center'><font color='red'><img src='images/OFF.gif' border='0' alt='"._INACTIVE."'></font></td>";
}
if($c_active=="yes"){
echo "<td class='row2' width='1%'><img src='images/active.gif' border='0' alt='"._ACTIVE."'></td>
    <td class='row2' width='1%'><a href='panel.php?adm=changecastle&cast=$castle_id'><img src='images/deactive.gif' border='0' alt='"._DEACTIVATE."'></a></td>";
}else{
echo "<td class='row2' width='1%'><img src='images/deactive.gif' border='0' alt='"._INACTIVE."'></td>
    <td class='row2' width='1%'><a href='panel.php?adm=changecastle&cast=$castle_id'><img src='images/active.gif' border='0' alt='"._ACTIVATE."'></a></td>";
}

echo "
  </tr>
";
}
sql_cls($result2);
echo "</table>";
TableEnd();
ROfoot();
}

function changecastle(){
global $db, $dbfetch, $link2;

$cast = $_GET['cast'];
session_start();
if(empty($_SESSION["aloged"])){
header("Location: panel.php?adm=AdminLogin");
}

$result2 = $db("SELECT castle_id, c_active FROM "._CPBD."_castle WHERE castle_id='$cast'",$link2);
list($bid, $bactive) = $dbfetch($result2);
sql_cls($result2);

if($bactive=="yes"){
$result = $db("UPDATE "._CPBD."_castle SET c_active='no' WHERE castle_id='$bid'",$link2);
}
if($bactive=="no"){
$result = $db("UPDATE "._CPBD."_castle SET c_active='yes' WHERE castle_id='$bid'",$link2);
}
header("Location: panel.php?adm=setcastles");

}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>