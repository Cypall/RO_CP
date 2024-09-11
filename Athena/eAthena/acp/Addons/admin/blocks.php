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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "blocks.php")){
	Header("Location: ../../index.php");
	die();
}

function AdminBlocks(){
global $db, $dbfetch, $dbnum, $link2, $admin;
if(is_admin($admin)){
ROhead();
menuadm();
$cont = "";

	$blocksdir = dir("Addons/blocks");
$ord = 0;
	while($func=$blocksdir->read()) {
	    if(substr($func, 0, 6) == "block-") {
    		$blockslist .= "$func ";
$result2 = $db("SELECT bfile FROM "._CPBD."_blocks WHERE bfile='$func'",$link2);
list($bfile) = $dbfetch($result2);
sql_cls($result2);

		$titl = ereg_replace("block-","",$func);
		$titl = ereg_replace(".php","",$titl);
		$titl = ereg_replace("_"," ",$titl);

if($bfile!=$func){
$result = $db("insert into "._CPBD."_blocks values (NULL, '$titl', '$func', '$cont', '$ord', 'no', '0')",$link2);
sql_cls($result);
}

$ord++;
	    }
	}
	closedir($blocksdir->handle);



TableStart();
echo "<center><b>"._BLOCKSADM2." [ <a href='panel.php?adm=FixBlocksPos'></b>"._BLOCKSFIX."<b></a> ]</b></center>";

$result2 = $db("SELECT bid, btitle, bfile, bcontent, bactive, bposit FROM "._CPBD."_blocks ORDER BY bposit ASC",$link2);
$ea = $dbnum($result2);
echo "
<table bgcolor='#000000' border='0' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td class='row2' width='49%'><center><b>"._TITLE."</b></center></td>
    <td class='row2' width='49%'><center><b>"._FILE."</b></center></td>
    <td class='row2' width='5%' colspan='5'><center><b>"._EDIT."</b></center></td>
  </tr>
";
while(list($bid, $btitle, $bfile, $bcontent, $bactive, $bposit) = $dbfetch($result2)){
if($bactive=="yes"){
$bactive = "<img alt='"._ACTIVE."' src='images/active.gif' border='0'>";
$binactive = "<a href='panel.php?adm=DeactBlock&blok=$bid'><img alt='"._DEACTIVATE."' src='images/deactive.gif' border='0'></a>";
}else{
$bactive = "<img alt='"._INACTIVE."' src='images/deactive.gif' border='0'>";
$binactive = "<a href='panel.php?adm=DeactBlock&blok=$bid'><img alt='"._ACTIVATE."' src='images/active.gif' border='0'></a>";
}
if($bfile!="none"){
if(!file_exists("Addons/blocks/$bfile")){
$result = $db("delete from "._CPBD."_blocks where bid='$bid'",$link2);
}
}

if($bfile=="none"){
$bfile = "HTML Block";
}

$delethtml = "<td width='1%'><a href='panel.php?adm=DeleteBlock&blok=$bid'><img src='images/delete.png' border='0' alt='"._DELETE."'></a></td>";

echo "
  <tr>
    <td class='row2' width='49%'>$btitle</td>
    <td class='row2' width='49%'>
<table border='0' width='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='99%'>$bfile</td>
";

echo "$delethtml";

echo "
  </tr>
</table>
</td><td class='row2' width='1%'>";

if($bposit!=$ea){
echo "<a href='panel.php?adm=PositBlock&blok=$bid&pos=down'><img alt='"._DOWN."' border='0' src='images/down.gif'></a>";
}else{
echo "<img alt='"._DOWN."' border='0' src='images/down.gif'>";
}
echo "</td><td class='row2' width='1%'>";

if($bposit!="1"){
echo "<a href='panel.php?adm=PositBlock&blok=$bid&pos=up'><img alt='"._UP."' border='0' src='images/up.gif'></a>";
}else{
echo "<img alt='"._UP."' border='0' src='images/up.gif'>";
}

echo "</td>
    <td class='row2' width='1%'>$bactive</td>
    <td class='row2' width='1%'>$binactive</td>
    <td class='row2' width='1%' align='center'><a href='panel.php?adm=EditBlock&blok=$bid'><img src='images/edit.gif' border='0' alt='"._EDIT."'></a></td>
  </tr>
";
}
echo "</table>";
sql_cls($result2);

TableEnd();
TableStart2();
echo "<center><b>"._MAKEBLOCK."</b><br></center>";

$ea2 = $ea+1;
echo "
<form method='POST' action='panel.php'>

<center>
<table width='80%' cellspacing='0' cellpadding='0'>
<tr>
<td width='50%' class='row2' align='right'>
<b>"._BLOCKTITLE.":</b>
</td>
<td width='50%' class='row2' align='center'>
<input type='text' size='30' name='btitle2'>
</td>
</tr>
<tr>
<td width='50%' class='row2' align='right'>
<b>"._BLOCKIMG.":</b>
</td>
<td width='50%' class='row2'>


	<select name='blockimg2'>";

    $handle=opendir('images/blocks');
    while ($file = readdir($handle)) {
	if (ereg("^(.+)\.gif", $file, $matches)) {
            $langFound = $matches[1];
            $imageslist .= "$langFound ";
        }
    }
    closedir($handle);
    $imageslist = explode(" ", $imageslist);
    sort($imageslist);
if($blockimg=="0"){
$sel = "selected";
}
echo "<option name='blockimg2' value='0' $sel>"._NONE."</option>";
    for ($i=0; $i < sizeof($imageslist); $i++) {
	if(!empty($imageslist[$i])) {
	    echo "<option name='blockimg2' value='$imageslist[$i]' ";
		if($imageslist[$i]==$blockimg) echo "selected";
		echo ">".ucfirst($imageslist[$i])."\n";
	}
    }
    echo "</select>


</td>
</tr>

<tr>
<td width='100%' colspan='2' class='row2' align='center'>
<center><b>"._HTMLCONTENT."</b></center><br>
<textarea cols='45' rows='4' name='bcontent2'></textarea>
</td>
</tr>
<tr>
<td width='50%' class='row2' align='right'>
<b>"._ACTIVATEBLOCK.":</b>
</td>
<td width='50%' class='row2' align='left'>
  <select size='1' name='bactive2'>
    <option value='yes' selected>"._YES."</option>
    <option value='no'>"._NO."</option>
  </select>
</td>
</tr>
<tr>
<td width='100%' colspan='2' class='row2' align='center'>
<input type='hidden' name='adm' value='MakeBlock'>
<input type='hidden' name='bposit2' value='$ea2'>
<input type='submit' value='"._SUBMIT."'>
</td>
</tr>
</table>
</center>

</form>
";
TableEnd2();
ROfoot();
}else{
header("Location: panel.php");
}
}

function EditBlock(){
global $db, $dbfetch, $dbnum, $link2, $admin;
if(is_admin($admin)){
$blok = $_GET['blok'];
ROhead();
menuadm();
TableStart();

$result2 = $db("SELECT bid, btitle, bfile, bcontent, bposit, bactive, blockimg FROM "._CPBD."_blocks WHERE bid='$blok'",$link2);
list($bid, $btitle, $bfile, $bcontent, $bposit, $bactive, $blockimg) = $dbfetch($result2);
sql_cls($result2);

echo "
<center><b>"._BLOCKSADM2."</b><br></center>
<form method='POST' action='panel.php'>

<center>
<table width='80%' cellspacing='0' cellpadding='0'>
<tr>
<td width='50%' class='row2' align='right'>
<b>"._BLOCKTITLE.":</b>
</td>
<td width='50%' class='row2'>
<input type='text' size='30' name='btitle2' value='$btitle'>
</td>
</tr>
<tr>
<td width='50%' class='row2' align='right'>
<b>"._BLOCKIMG.":</b>
</td>
<td width='50%' class='row2'>


	<select name='blockimg2'>";

    $handle=opendir('images/blocks');
    while ($file = readdir($handle)) {
	if (ereg("^(.+)\.gif", $file, $matches)) {
            $langFound = $matches[1];
            $imageslist .= "$langFound ";
        }
    }
    closedir($handle);
    $imageslist = explode(" ", $imageslist);
    sort($imageslist);
if($blockimg=="0"){
$sel = "selected";
}
echo "<option name='blockimg2' value='0' $sel>"._NONE."</option>";
    for ($i=0; $i < sizeof($imageslist); $i++) {
	if(!empty($imageslist[$i])) {
	    echo "<option name='blockimg2' value='$imageslist[$i]' ";
		if($imageslist[$i]==$blockimg) echo "selected";
		echo ">".ucfirst($imageslist[$i])."\n";
	}
    }
    echo "</select>


</td>
</tr>
<tr>
<td width='100%' colspan='2' class='row2' align='center'>
<center><b>"._HTMLCONTENT."</b></center><br>
<textarea cols='45' rows='4' name='bcontent2'>$bcontent</textarea>
</td>
</tr>
<tr>
<td width='100%' colspan='2' class='row2' align='center'>
<input type='hidden' name='adm' value='UpdateBlock'>
<input type='hidden' name='bid2' value='$blok'>
<input type='submit' value='"._SUBMIT."'>
</td>
</tr>
</table>
</center>

</form>
";


TableEnd();
ROfoot();
}else{
header("Location: panel.php");
}
}

function UpdateBlock(){
global $db, $dbfetch, $link2, $admin;
if(is_admin($admin)){
$btitle2 = $_POST['btitle2'];
$bid2 = $_POST['bid2'];
$bcontent2 = $_POST['bcontent2'];
$blockimg2 = $_POST['blockimg2'];

if(empty($bid2)){
header("Location: panel.php?adm=AdminBlocks");
}

$result = $db("UPDATE "._CPBD."_blocks SET bcontent='$bcontent2' WHERE bid='$bid2'",$link2);
$result = $db("UPDATE "._CPBD."_blocks SET blockimg='$blockimg2' WHERE bid='$bid2'",$link2);

if(empty($btitle2)){
header("Location: panel.php?adm=AdminBlocks");
}else{
$result = $db("UPDATE "._CPBD."_blocks SET btitle='$btitle2' WHERE bid='$bid2'",$link2);
header("Location: panel.php?adm=AdminBlocks");
}

}else{
header("Location: panel.php");
}

}

function DeactBlock(){
global $db, $dbfetch, $link2, $admin;
if(is_admin($admin)){

$blok = $_GET['blok'];

$result2 = $db("SELECT bid, bactive FROM "._CPBD."_blocks WHERE bid='$blok'",$link2);
list($bid, $bactive) = $dbfetch($result2);
sql_cls($result2);

if($bactive=="yes"){
$result = $db("UPDATE "._CPBD."_blocks SET bactive='no' WHERE bid='$bid'",$link2);
}
if($bactive=="no"){
$result = $db("UPDATE "._CPBD."_blocks SET bactive='yes' WHERE bid='$bid'",$link2);
}
header("Location: panel.php?adm=AdminBlocks");
}else{
header("Location: panel.php");
}

}

function MakeBlock(){
global $db, $dbfetch, $link2, $admin;

if(is_admin($admin)){
$bactive2 = $_POST['bactive2'];
$bposit2 = $_POST['bposit2'];
$bcontent2 = $_POST['bcontent2'];
$btitle2 = $_POST['btitle2'];
$blockimg2 = $_POST['blockimg2'];



if(empty($bcontent2)){
header("Location: panel.php?adm=AdminBlocks");
}elseif(empty($btitle2)){
header("Location: panel.php?adm=AdminBlocks");
}else{

$result = $db("insert into "._CPBD."_blocks values (NULL, '$btitle2', 'none', '$bcontent2', '$bposit2', '$bactive2', '$blockimg2')",$link2);
header("Location: panel.php?adm=AdminBlocks");
}

}else{
header("Location: panel.php");
}

}

function DeleteBlock(){
global $db, $dbfetch, $link2, $admin;
if(is_admin($admin)){
$blok = $_GET['blok'];

if(empty($blok)){
header("Location: panel.php?adm=AdminBlocks");
}


$result2 = $db("SELECT bid, bposit, bactive FROM "._CPBD."_blocks WHERE bid='$blok'",$link2);
list($bid, $bposit, $bactive) = $dbfetch($result2);

$result = $db("SELECT bid, bposit, bactive FROM "._CPBD."_blocks",$link2);
while(list($bid2, $bposit2, $bactive2) = $dbfetch($result)){

$bposit3 = $bposit2-1;

if($bposit!=1){
$result = $db("UPDATE "._CPBD."_blocks SET bposit='$bposit3' WHERE bposit='$bposit2'",$link2);
}
}


$result = $db("delete from "._CPBD."_blocks where bid='$blok'",$link2);
header("Location: panel.php?adm=AdminBlocks");

}else{
header("Location: panel.php");
}

}

function PositBlock(){
global $db, $dbfetch, $link2, $admin;

if(is_admin($admin)){
$blok = $_GET['blok'];
$pos = $_GET['pos'];

$result2 = $db("SELECT bid, bposit, bactive FROM "._CPBD."_blocks WHERE bid='$blok'",$link2);
list($bid, $bposit, $bactive) = $dbfetch($result2);
sql_cls($result2);

if($pos=="down"){
$bposit2 = $bposit+1;
$bposit3 = $bposit2-1;
}elseif($pos=="up"){
$bposit2 = $bposit-1;
$bposit3 = $bposit2+1;
}

$result = $db("UPDATE "._CPBD."_blocks SET bposit='$bposit3' WHERE bposit='$bposit2'",$link2);
$result = $db("UPDATE "._CPBD."_blocks SET bposit='$bposit2' WHERE bid='$bid'",$link2);


header("Location: panel.php?adm=AdminBlocks");
}else{
header("Location: panel.php");
}

}

function FixBlocksPos(){
global $db, $dbfetch, $link2, $admin;
if(is_admin($admin)){

$result2 = $db("SELECT bid, bposit, bactive FROM "._CPBD."_blocks",$link2);
$sum = 1;
while(list($bid2, $bposit2, $bactive2) = $dbfetch($result2)){
$result = $db("UPDATE "._CPBD."_blocks SET bposit='$sum' WHERE bid='$bid2'",$link2);
$sum++;
}
sql_cls($result2);
header("Location: panel.php?adm=AdminBlocks");

}else{
header("Location: panel.php");
}

}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>