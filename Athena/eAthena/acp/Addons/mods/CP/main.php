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
/* This is The ACCES CONTROL SYSTEM:              */
/* DO NOT EDIT / DELETE THIS FILE - REQ FUNCTIONS */
/**************************************************/

if(stristr(htmlentities($_SERVER['PHP_SELF']), "main.php")){
	Header("Location: ../../../index.php");
	die();
}

include("system/DB_Connect_RO.php");

$op = $_GET['op'];
if(empty($op)){
$op = $_POST['op'];
}

function menu(){
global $nickname;
if(!sys_security($nickname)){
echo "<center>[ <b>
	<a href='index.php?sec=CP&op=Login'>"._LOGIN."</a> | <a href='index.php?sec=CP&op=Register'>"._REGISTER."</a>
</b> ]</center>";
}else{
echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><b>"._MEMBERSAREA." | "._LOGGEDAS.": <font color='red'>$nickname</font></b></td>
  </tr>
  <tr>
    <td width='25%' class='row1' align='center'><b><a href='index.php?sec=CP'><img src='images/menu/myinfo.png' border='0' alt='"._MYINFO."'><br>"._MYINFO."</a></b></td>
    <td width='25%' class='row2' align='center'><b><a href='index.php?sec=CP&op=ChangePassword'><img src='images/menu/changepass.png' border='0' alt='"._CHANGEPASS."'><br>"._CHANGEPASS."</a></b></td>
    <td width='25%' class='row1' align='center'><b><a href='index.php?sec=CP&op=ResetLook'><img src='images/menu/changelook.png' border='0' alt='"._RESETLOOK."'><br>"._RESETLOOK."</a></b></td>
    <td width='25%' class='row2' align='center'><b><a href='index.php?sec=CP&op=Desconectar'><img src='images/menu/logout.png' border='0' alt='"._LOGOUT."'><br>"._LOGOUT."</a></b></td>
  </tr>
  <tr>
    <td width='25%' class='row2' align='center'><b><a href='index.php?sec=CP&op=ResetPosition'><img src='images/menu/resetposition.png' border='0' alt='"._RESETPOSIT."'><br>"._RESETPOSIT."</a></b></td>
    <td width='25%' class='row1' align='center'><b><a href='index.php?sec=CP&op=ChangeEmail'><img src='images/menu/changemail.png' border='0' alt='"._CHANGEMAIL."'><br>"._CHANGEMAIL."</a></b></td>
    <td width='25%' class='row2' align='center'><b><a href='index.php?sec=CP&op=ChangeSlot'><img src='images/menu/changeslot.png' border='0' alt='"._CHANGESLOT."'><br>"._CHANGESLOT."</a></b></td>
    <td width='25%' class='row1' align='center'><b><a href='index.php?sec=CP&op=TransferZeny'><img src='images/menu/transfer.png' border='0' alt='"._TRANSFERZENY."'><br>"._TRANSFERZENY."</a></b></td>
  </tr>
</table>


";
}



}

function index(){
global $nickname;
if(sys_security($nickname)){
header("Location: index.php?sec=CP&op=Info");
}else{
header("Location: index.php?sec=CP&op=Login");
}
}

function Register(){
global $nickname;
if(sys_security($nickname)){
header("Location: index.php?sec=CP");
}else{
ROhead();
TableStart();
echo "<center><b>"._REGUSER."</b></center>";
menu();
TableEnd();
TableStart();


if(isset($_SERVER['REMOTE_HOST'])){
$ip = $_SERVER['REMOTE_HOST'];
}
if(empty($ip)) {
$ip = $_SERVER['REMOTE_ADDR'];
}


echo "
<table cellSpacing=\"0\" cellPadding=\"0\" border=\"0\">
  <tr>
    <th class=\"title\" height=\"28\">"._NEWACCOUNT."</th>
  </tr>
  <tr>
    <td>
    <form method='POST' action='index.php?sec=CP'>
      <table>
        <tr>
          <td align=\"right\">"._USERNAME.":</td>
          <td align=\"left\">
          <input maxLength=\"23\" size=\"23\" name=\"username\">
          </td>
        </tr>
        <tr>
          <td align=\"right\">"._PASSWORD.":</td>
          <td align=\"left\">
          <input type=\"password\" maxLength=\"23\" size=\"23\" name=\"password\">
          </td>
        </tr>
        <tr>
          <td align=\"right\">"._REPASSWORD.":</td>
          <td align=\"left\">
          <input type=\"password\" maxLength=\"23\" size=\"23\" name=\"confirm\">
          </td>
        </tr>
        <tr>
          <td align=\"right\">"._SEX.":</td>
          <td align=\"left\">
          <select name=\"sex\">
          <option value=\"M\" selected>"._MAN."</option>
          <option value=\"F\">"._WOMAN."</option>
          </select></td>
        </tr>
        <tr>
          <td align=\"right\">"._EMAIL.":</td>
          <td align=\"left\">
          <input maxLength=\"40\" size=\"40\" name=\"email\">
          <input type=\"hidden\" value=\"1\" name=\"opt\"></td>
        </tr>
        <input type=\"hidden\" value=\"$ip\" name=\"ipaddress\">
        <tr>
          <td>&nbsp;</td>
<input type='hidden' name='op' value='SaveReg'>
          <td><input type=\"submit\" value=\""._SUBMIT."\"></td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table>
";
TableEnd();
ROfoot();
}

}

function SaveReg(){
global $db, $dbfetch, $dbnum, $nickname;
if(sys_security($nickname)){
header("Location: index.php?sec=CP");
}else{

ROhead();
TableStart();
echo "<center><b>"._REGUSER."</b></center>";
menu();
TableEnd();
TableStart();

$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$ipaddress=$_POST['ipaddress'];


$result2 = $db("SELECT * FROM login WHERE userid='$username'");
$ea = $dbnum($result2);
sql_cls($result2); 

if(empty($username)){
echo "<center><b>No puedes Dejar en Blanco el Nombre de Usuario</b></center>";
}elseif(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)$", $username)){
echo "<center><b>El Nombre de Usuario que has Agregado es Incorrecto, Solo Aceptamos:<br>a-z | A-Z | 0-9.</b></center>";
}elseif($ea!="0"){
echo "<center><b>Este Nombre de usuario ya ha sido Registrado, Prueba con otro.</b></center>";
}
elseif(empty($password)){
echo "<center><b>Has Olvidado la Contraseña</b></center>";
}elseif(empty($confirm)){
echo "<center><b>Has Olvidado Confirmar la Contraseña</b></center>";
}elseif($password!=$confirm){
echo "<center><b>El Password que has Agregado es Diferente al Confirmado, Prueba de Nuevo.</b></center>";
}elseif(empty($sex)){
echo "<center><b>Olvidaste el Sexo ¿?¿?</b></center>";
}elseif(empty($email)){
echo "<center><b>Necesitas Agregar un Email Valido.</b></center>";
}elseif (!eregi("^[a-z0-9._-]+@[a-z0-9._-]+.[a-z]{2,4}$", $email)) {
echo "<center><b>El El Email que has Proporcionado es Invalido.</b></center>";
}else{
$result = $db("insert into login values (NULL, '$username', '$password', '', '$sex', '', '$email', '0', '0', '0', '$ipaddress', '0', '0', '0')");
$_SESSION["nikname"]= "$username"; 
echo "<center><b>Registrado Correctamente<br><br>Ya Puedes Comenzar a Jugar con Esa Cuenta.</b></center>";
echo "<meta http-equiv='refresh' content='2;URL=index.php?sec=CP'>";
}
TableEnd();
ROfoot();
}

}

function Login(){
global $db, $dbfetch, $dbnum;
$username = $_POST['username'];
$password = $_POST['password'];
$formulario = $_POST['formulario'];

global $nickname;
if(sys_security($nickname)){
header("Location: index.php?sec=CP");
}else{

if(empty($formulario)){
ROhead();
TableStart();
echo "<center><b>"._USERLOGIN."</b></center>";
menu();
TableEnd();
TableStart();
echo "<center>
    <form method='POST' action='index.php?sec=CP'>
      <table>
        <tr>
          <td align=\"right\">"._USERNAME.":</td>
          <td align=\"left\">
          <input maxLength=\"23\" size=\"23\" name=\"username\">
          </td>
        </tr>
        <tr>
          <td align=\"right\">"._PASSWORD.":</td>
          <td align=\"left\">
          <input type=\"password\" maxLength=\"23\" size=\"23\" name=\"password\">
          <input type=\"hidden\" name=\"formulario\" value='ok'>
          <input type=\"hidden\" name=\"op\" value='Login'>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type=\"submit\" value=\""._SUBMIT."\"></td>
        </tr>
      </table>
    </form>
</center>
";
TableEnd();
ROfoot();
}else{
$result2 = $db("SELECT userid, user_pass FROM login WHERE userid='$username'");
list($userid, $user_pass) = $dbfetch($result2);
$ea = $dbnum($result2);
sql_cls($result2); 

$user_pass = "".md5($user_pass)."";
$password = "".md5($password)."";

if($ea=="0"){
ROhead();
TableStart();
echo ""._NEEDUSERNAME."";
TableEnd();
ROfoot();
}elseif($password!=$user_pass){
ROhead();
TableStart();
echo ""._NEEDPASSWORD."";
TableEnd();
ROfoot();
}else{
$_SESSION["nikname"]= "$userid"; 
header("location: index.php?sec=CP&op=Info");
}

}

}

}

function Info(){
global $db, $dbfetch, $dbnum, $nickname;
if(sys_security($nickname)){
$com = $_GET['com'];
ROhead();
TableStart();
menu();
TableEnd();
TableStart();
if($com==1){
echo "<center><font color='red'><b>"._PASSCHANGED."</b></font></center>";
}elseif($com=="2"){
echo "<center><font color='red'><b>"._MAILCHANGED."</b></font></center>";
}
$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account_id) = $dbfetch($result23);
sql_cls($result23);

$result2 = $db("SELECT char_id, char_num, name, class, base_level, job_level, zeny, max_hp, max_sp, guild_id, save_map, save_x, save_y, partner_id FROM `char` WHERE account_id='$account_id' ORDER BY `char_num` ASC");
while(list($char_id, $char_num, $name, $class, $base_level, $job_level, $zeny, $max_hp, $max_sp, $guild_id, $save_map, $save_x, $save_y, $partner_id) = $dbfetch($result2)){

global $link2;
$result32 = $db("SELECT gld_emblem FROM "._CPBD."_guildmasters WHERE gld_id='$guild_id'",$link2);
list($gld_emblem) = $dbfetch($result32);
sql_cls($result32);

if(!empty($gld_emblem)){
$themblem = "<img border='0' alt='$guild' width='24' height='24' src='uploads/$gld_emblem'>";
}else{
$themblem = "<img border='0' alt='$guild' width='24' height='24' src='images/blank.gif'>";
}

$result24 = $db("SELECT char_id, name FROM `char` WHERE char_id='$partner_id'");
list($char_id3, $partner) = $dbfetch($result24);
sql_cls($result24);

$result245 = $db("SELECT name FROM `guild` WHERE guild_id='$guild_id'");
list($guild) = $dbfetch($result245);
sql_cls($result245);

if(empty($partner)){
$partner = ""._NOPARTNER."";
}

if($partner_id=="0"){
$partner_id2 = ""._SINGLE."";
}else{
$partner_id2 = ""._MARRIED."";
}

$result245 = $db("SELECT userid FROM ".$dbname.".`login` WHERE account_id='$account_id'");
list($account) = $dbfetch($result245);
sql_cls($result245);


echo "
<table border='0' width='100%' cellspacing='1' bgcolor='#000000'>
  <tr>
    <td class='row2' width='25%' align='center'>
<b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b>
<br>
".jobs2($class,$account)."
</td>
    <td class='row2' width='75%' align='center'>
<b>"._YOURCHARINFO."</b>
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>


  <tr>
    <td class='row2' colspan='2' width='50%'><b>"._CLASS."</b>:".jobs($class)."</td>
    <td class='row2' width='50%'><b>".$partner_id2."</b></td>
  </tr>

  <tr>
    <td class='row2' width='35%'><b>"._MAXHP."</b>:".$max_hp."</td>
    <td class='row2' width='35%'><b>"._MAXSP."</b>:".$max_sp."</td>
    <td class='row2' width='30%'><b>"._LVL."</b>: ".$base_level."/".$job_level."</td>
  </tr>
  <tr>
    <td class='row2' colspan='2' width='50%'><b>"._SAVEDMAP."</b>:".$save_map." (".$save_x.",".$save_y.")</td>
    <td class='row2' width='50%'><b>"._ZENY."</b>:".$zeny."</td>
  </tr>
";

if($partner_id!="0"){
echo "
  <tr>
    <td class='row2' colspan='2' width='50%'><b>"._PARTNER."</b>: <a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$partner_id'>".$partner."</a></td>
    <td class='row2' width='50%' align='center'>[ <a href='index.php?sec=CP&op=Divorce&who=$char_num'><b>"._DIVORCE."</b></a> ]</td>
  </tr>
";
}

if($guild_id!="0"){
echo "
  <tr>
    <td class='row2' colspan='3' width='100%' align='center'>
<table border='0' width='100%' cellspacing='1'>
  <tr>
    <td width='1%'>".$themblem."</td>
    <td width='99%'><b>"._GUILD.":</b> <a href='index.php?sec=GuildRank&op=GuildInfo&g=$guild_id'>".$guild."</a></td>
  </tr>
</table>
</td>
  </tr>
";
}

echo "
</table>

</td>
  </tr>
</table>

";
}
sql_cls($result2);

TableEnd();
ROfoot();
}else{
header("Location: index.php?sec=CP");
}
}

function Desconectar(){
global $nickname;
if(sys_security($nickname)){
session_start();
session_destroy();
header("Location: index.php");
}else{
header("location: index.php?sec=CP");
}
}

function NeedLogOFF(){
global $nickname;

if(sys_security($nickname)){

if(VerifyStatus($nickname)){
header("location: index.php?sec=CP");
}

$ST = $_GET['ST'];
if($ST=="1"){
ROhead();
TableStart();
menu();
TableEnd();
TableStart();
echo "<center><b>"._PLEASELOGOFF."</b></center>";
TableEnd();
ROfoot();
}elseif(empty($ST)){
header("location: index.php?sec=CP");
}

}else{
header("location: index.php?sec=CP");
}

}

function ChangePassword(){
global $db, $dbfetch, $dbnum, $nickname;
if(sys_security($nickname)){
$submited = $_POST['submited'];
$Actual_Password = $_POST['Actual_Password'];
$New_Password = $_POST['New_Password'];
$Confirm_Password = $_POST['Confirm_Password'];
$Verif_Email = $_POST['Verif_Email'];
$error = $_GET['error'];
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{

if(empty($submited)){
ROhead();
TableStart();
menu();
TableEnd();
TableStart();
echo "<center><b>"._CHPASSYS."</b></center>";

if(!empty($error)){
echo "<center><b>"._ERRORPASS."</b></center>";
}

echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='index.php?sec=CP'>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._ACTUALPASS."</b>:</td>
    <td class='row2' width='50%'><input type='password' name='Actual_Password' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._NEWPASS."</b>:</td>
    <td class='row2' width='50%'><input type='password' name='New_Password' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._CONFIRMPASS."</b>:</td>
    <td class='row2' width='50%'><input type='password' name='Confirm_Password' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._VERIFEMAIL."</b>:</td>
    <td class='row2' width='50%'><input type='text' name='Verif_Email' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='100%' colspan='2' align='center'>
    <input type='hidden' name='submited' value='1'>
    <input type='hidden' name='op' value='ChangePassword'>
    <input type='submit' value='"._SUBMIT."'>
    </td>
  </tr>
</form>
</table>
";
TableEnd();
ROfoot();
}else{

$result2 = $db("SELECT userid, user_pass, email FROM login WHERE userid='$nickname'");
list($userid, $user_pass, $email) = $dbfetch($result2);
sql_cls($result2);

if($Actual_Password!=$user_pass){
header("Location: index.php?sec=CP&op=ChangePassword&error=1");
}elseif($New_Password!=$Confirm_Password){
header("Location: index.php?sec=CP&op=ChangePassword&error=1");
}elseif($email!=$Verif_Email){
header("Location: index.php?sec=CP&op=ChangePassword&error=1");
}else{
$result = $db("UPDATE login SET user_pass='$New_Password' WHERE userid='$userid'");
header("Location: index.php?sec=CP&op=Info&com=1");
}
}
}
}else{
header("Location: index.php?sec=CP");
}
}

function ChangeEmail(){
global $db, $dbfetch, $dbnum, $nickname;
if(sys_security($nickname)){
$submited = $_POST['submited'];
$Actual_Mail = $_POST['Actual_Mail'];
$New_Mail = $_POST['New_Mail'];
$Confirm_Mail = $_POST['Confirm_Mail'];
$Verif_Pass = $_POST['Verif_Pass'];
$error = $_GET['error'];
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{


if(empty($submited)){
ROhead();
TableStart();
menu();
TableEnd();
TableStart();
echo "<center><b>"._CHANGEMAILSYS."</b></center>";

if(!empty($error)){
echo "<center><b>"._ERRORMAIL."</b></center>";
}

echo "
<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='index.php?sec=CP'>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._ACTUALMAIL."</b>:</td>
    <td class='row2' width='50%'><input type='text' name='Actual_Mail' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._NEWMAIL."</b>:</td>
    <td class='row2' width='50%'><input type='text' name='New_Mail' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._CONFIRMAIL."</b>:</td>
    <td class='row2' width='50%'><input type='text' name='Confirm_Mail' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='50%' align='right'><b>"._VERIFPASS."</b>:</td>
    <td class='row2' width='50%'><input type='password' name='Verif_Pass' size='20'></td>
  </tr>
  <tr>
    <td class='row2' width='100%' colspan='2' align='center'>
    <input type='hidden' name='submited' value='1'>
    <input type='hidden' name='op' value='ChangeEmail'>
    <input type='submit' value='"._SUBMIT."'>
    </td>
  </tr>
</form>
</table>
";
TableEnd();
ROfoot();
}else{

$result2 = $db("SELECT userid, user_pass, email FROM login WHERE userid='$nickname'");
list($userid, $user_pass, $email) = $dbfetch($result2);
sql_cls($result2);

if($Actual_Mail!=$email){
header("Location: index.php?sec=CP&op=ChangeEmail&error=1");
}elseif($New_Mail!=$Confirm_Mail){
header("Location: index.php?sec=CP&op=ChangeEmail&error=1");
}elseif($user_pass!=$Verif_Pass){
header("Location: index.php?sec=CP&op=ChangeEmail&error=1");
}else{
$result = $db("UPDATE login SET email='$New_Mail' WHERE userid='$userid'");
header("Location: index.php?sec=CP&op=Info&com=2");
}

}
}

}else{
header("Location: index.php?sec=CP");
}
}

function Divorce(){
global $db, $dbfetch, $dbnum, $nickname;
if(sys_security($nickname)){
$who = $_GET['who'];

if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{


if(empty($who)){
	header("Location: index.php?sec=CP&op=Info");
}
$result2 = $db("SELECT account_id FROM `login` WHERE userid='$nickname'");
	list($account) = $dbfetch($result2);
sql_cls($result2);

$result2 = $db("SELECT char_id FROM `char` WHERE char_num='$who' AND account_id='$account'");
	list($you) = $dbfetch($result2);
sql_cls($result2);

$result2 = $db("SELECT char_id FROM `char` WHERE partner_id='$you'");
	$ismarried = $dbnum($result2);
	list($partner) = $dbfetch($result2);
sql_cls($result2);

if($ismarried=="0"){
	header("Location: index.php?sec=CP");
}
	$result = $db("UPDATE `char` SET partner_id='0' WHERE char_id='$you'");
	$result = $db("UPDATE `char` SET partner_id='0' WHERE char_id='$partner'");

	$result = $db("UPDATE `char` SET child='0' WHERE char_id='$you'");
	$result = $db("UPDATE `char` SET child='0' WHERE char_id='$partner'");

	$result = $db("UPDATE `char` SET father='0' WHERE father='$you' OR father='$partner'");
	$result = $db("UPDATE `char` SET mother='0' WHERE mother='$you' OR mother='$partner'");

	$ban_until = time() + (2 * 60);
	$result = $db("UPDATE `login` SET ban_until='$ban_until' WHERE account_id='$account' AND ban_until='0'");
	$result = $db("UPDATE `login` SET ban_until='$ban_until' WHERE account_id='$partner' AND ban_until='0'");
header("Location: index.php?sec=CP");
}

}else{
header("Location: index.php?sec=CP");
}
}

function ResetPosition(){
global $nickname, $db, $dbfetch;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{

$cnn = $_GET['cnn'];
$pj = $_GET['pj'];
if(!empty($cnn)){

$result2 = $db("SELECT account_id FROM `login` WHERE userid='$nickname'");
list($account) = $dbfetch($result2);
sql_cls($result2);


$result2 = $db("SELECT char_id, save_map, save_x, save_y FROM `char` WHERE account_id='$account' AND char_num='$pj'");
list($pj, $save_map, $save_x, $save_y) = $dbfetch($result2);
sql_cls($result2);

$result = $db("UPDATE `char` SET last_map='$save_map' WHERE char_id='$pj'");
$result = $db("UPDATE `char` SET last_x='$save_x' WHERE char_id='$pj'");
$result = $db("UPDATE `char` SET last_y='$save_y' WHERE char_id='$pj'");

	$ban_until = time() + (2 * 60);
	$result = $db("UPDATE `login` SET ban_until='$ban_until' WHERE account_id='$account' AND ban_until='0'");

header("Location: index.php?sec=CP&op=ResetPosition");
}

ROhead();
TableStart();
menu();
TableEnd();
TableStart();





$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account_id) = $dbfetch($result23);
sql_cls($result23);

$result2 = $db("SELECT char_id, char_num, name, last_map, last_x, last_y FROM `char` WHERE account_id='$account_id' ORDER BY `char_num` ASC");
echo "<center><table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><b>"._RESETPOSIT."</b></td>
  </tr>
  <tr>
    <td width='40%' colspan='2' class='row2' align='center'><b>"._NICKNAME."</b></td>
    <td width='60%' class='row2' align='center'><b>"._POSITION."</b></td>
<td width='1%' class='row2' align='center'><b>"._OPTIONS."</b></td>
  </tr>
";
while(list($char_id, $char_num, $name, $last_map, $last_x, $last_y) = $dbfetch($result2)){

echo "
  <tr>
	<td width='1%' class='row2'><img src='images/arrow2.gif' border='0'></td>
    <td width='40%' class='row2' align='center'><b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b></td>
    <td width='60%' class='row2' align='center'><b>".$last_map."(".$last_x.",".$last_y.")</b></td>
<td width='1%' class='row2' align='center'><a href='index.php?sec=CP&op=ResetPosition&cnn=ok&pj=$char_num'>"._RESETPOS."</a></td>
  </tr>
";

}
echo "</table></center>";
sql_cls($result2);




TableEnd();
ROfoot();
}

}else{
header("Location: index.php?sec=CP");
}
}

function ChangeSlot(){
global $nickname, $db, $dbfetch, $dbnum;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{
$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account_id) = $dbfetch($result23);
sql_cls($result23);

ROhead();
TableStart();
menu();
TableEnd();
TableStart();

$cnn = $_GET['cnn'];
$slot = $_GET['slot'];


if(!empty($cnn)){




$result23 = $db("SELECT * FROM `char` WHERE account_id='$account_id'");
$sumresult = $dbnum($result23);
sql_cls($result23);

$result2 = $db("SELECT char_id, char_num, name FROM `char` WHERE account_id='$account_id' AND char_num='$slot'");


echo "<center><table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "
<form method='POST' action='index.php?sec=CP'>
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><b>"._CHANGESLOTSYS."</b></td>
  </tr>
  <tr>
    <td width='99%' colspan='2' class='row2' align='center'><b>"._NICKNAME."</b></td>
<td width='1%' class='row2' align='center'><b>"._SLOT."</b></td>
  </tr>
";
list($char_id, $char_num, $name) = $dbfetch($result2);

echo "
  <tr>
	<td width='1%' class='row2'><img src='images/arrow2.gif' border='0'></td>
    <td width='99%' class='row2' align='center'><b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b></td>




<td width='1%' class='row2' align='center'>
<input type='hidden' name='sec' value='CP'>
<input type='hidden' name='op' value='ChangeSlotOK'>
<input type='hidden' name='cnn' value='ok'>
<input type='hidden' name='slot' value='$slot'>
<input type='hidden' name='char_id' value='$char_id'>
";

echo "<select size='1' name='newslot'>";
for ($i = 0; $i < 9; $i++) {

if($slot==$i){
$sel = "selected";
}else{
$sel = "";
}

echo "<option value='$i' $sel>$i</option>";
}

echo "</select>
</td>

  </tr>
";


echo "
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><input type='submit' value='"._SUBMIT."'></td>
  </tr>
";
echo "</form></table></center>";
sql_cls($result2);




}else{


$result23 = $db("SELECT * FROM `char` WHERE account_id='$account_id'");
$sumresult = $dbnum($result23);
sql_cls($result23);

$result2 = $db("SELECT char_id, char_num, name FROM `char` WHERE account_id='$account_id' ORDER BY `char_num` ASC");


echo "<center><table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><b>"._CHANGESLOTSYS."</b></td>
  </tr>
  <tr>
    <td width='99%' colspan='3' class='row2' align='center'><b>"._NICKNAME."</b></td>
<td width='1%' class='row2' align='center'><b>"._SLOT."</b></td>
  </tr>
";
while(list($char_id, $char_num, $name) = $dbfetch($result2)){

echo "
  <tr>
	<td width='1%' class='row2'><img src='images/arrow2.gif' border='0'></td>
    <td width='99%' class='row2' align='center'><b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b></td>




<td width='1%' class='row2' align='center'>
";
echo "$char_num";
echo "
</td>
<td width='1%' class='row2' align='center'>
";
echo "<a href='index.php?sec=CP&op=ChangeSlot&cnn=ok&slot=$char_num'>"._CHANGE."</a>";
echo "
</td>
  </tr>
";

}
echo "</table></center>";
sql_cls($result2);

}



TableEnd();
ROfoot();
}
}else{
header("Location: index.php?sec=CP");
}
}

function ChangeSlotOK(){
global $nickname, $db, $dbfetch;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{

$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account) = $dbfetch($result23);
sql_cls($result23);


$slot = $_POST['slot'];
$newslot = $_POST['newslot'];
$cnn = $_POST['cnn'];
$char_id = $_POST['char_id'];

if(!empty($cnn)){

$result = $db("UPDATE `char` SET char_num='$slot' WHERE account_id='$account' AND char_num='$newslot'");
$result = $db("UPDATE `char` SET char_num='$newslot' WHERE account_id='$account' AND char_id='$char_id'");

header("Location: index.php?sec=CP&op=ChangeSlot");

}else{
header("Location: index.php?sec=CP&op=ChangeSlot");
}

}
}else{
header("Location: index.php?sec=CP");
}
}

function TransferZeny(){
global $nickname, $db, $dbfetch;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{


ROhead();
TableStart();
menu();
TableEnd();
TableStart();





$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account_id) = $dbfetch($result23);
sql_cls($result23);

$result2 = $db("SELECT char_id, char_num, name, zeny FROM `char` WHERE account_id='$account_id' ORDER BY `char_num` ASC");
echo "<center><table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "
<form method='POST' action='index.php?sec=CP'>
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><b>"._TRANSZENY."</b></td>
  </tr>
  <tr>
    <td width='40%' colspan='2' class='row2' align='center'><b>"._NICKNAME."</b></td>
    <td width='60%' class='row2' align='center'><b>"._ZENYNUM."</b></td>
<td width='1%' class='row2' align='center'><b>"._FROM."</b></td>
  </tr>
";
while(list($char_id, $char_num, $name, $zeny) = $dbfetch($result2)){

echo "
  <tr>
	<td width='1%' class='row2'><img src='images/arrow2.gif' border='0'></td>
    <td width='40%' class='row2' align='center'><b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b></td>
    <td width='60%' class='row2' align='center'><b>".$zeny."</b></td>




<td width='1%' class='row2' align='center'>
<input type='hidden' name='sec' value='CP'>
<input type='hidden' name='op' value='TransferTo'>
<input type='hidden' name='cnn' value='ok'>
<input type='radio' value='".$char_num."' name='pj'></td>




  </tr>
";

}
echo "
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><input type='submit' value='"._SUBMIT."'></td>
  </tr>
";
echo "</form></table></center>";
sql_cls($result2);




TableEnd();
ROfoot();















}
}else{
header("Location: index.php?sec=CP");
}
}

function TransferTo(){
global $nickname, $db, $dbfetch;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{

$result2 = $db("SELECT account_id FROM `login` WHERE userid='$nickname'");
list($account) = $dbfetch($result2);
sql_cls($result2);


$cnn = $_POST['cnn'];
$pj = $_POST['pj'];
$to = $_POST['to'];
$pj2 = $pj;

if(!empty($to)){

if($to=="cero"){
$to = 0;
}
$result2 = $db("SELECT char_id, name, zeny FROM `char` WHERE account_id='$account' AND char_num='$pj'");
list($char1, $name1, $zeny1) = $dbfetch($result2);
sql_cls($result2);
$result2 = $db("SELECT char_id, name, zeny FROM `char` WHERE account_id='$account' AND char_num='$to'");
list($char2, $name2, $zeny2) = $dbfetch($result2);
sql_cls($result2);


ROhead();
TableStart();
menu();
TableEnd();
TableStart();

echo "



<table border='0' width='100%' bgcolor='#000000' cellspacing='1'>
<form method='POST' action='index.php?sec=CP'>
 <tr>
    <td width='100%' colspan='2' class='row2' align='center'><b>"._TRANSZENY."</b></td>
  </tr>

  <tr>
    <td width='100%' colspan='2' class='row2' align='center'><b>Cuanto Quieres Transferir?</b></td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._ZENYONCHAR."</b>: </td>
    <td width='50%' class='row2'>".$zeny1."</td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._CHARNAME."</b>: </td>
    <td width='50%' class='row2'>".$name1."</td>
  </tr>
  <tr>
    <td width='50%' class='row2' align='right'><b>"._CHARTO."</b>: </td>
    <td width='50%' class='row2'>".$name2."</td>
  </tr>
  <tr>
    <td width='100%' colspan='2' class='row2' align='center'><input type='text' name='zenys2' size='40'></td>
  </tr>
  <tr>
    <td width='100%' colspan='2' class='row2' align='center'>
<input type='hidden' name='zenys1' value='$zeny1'>
<input type='hidden' name='zenys3' value='$zeny2'>
<input type='hidden' name='chars1' value='$char1'>
<input type='hidden' name='chars2' value='$char2'>

<input type='hidden' name='sec' value='CP'>
<input type='hidden' name='op' value='TransferComplete'>

  <input type='submit' value='"._SUBMIT."'>
</td>
  </tr>
</form>
</table>

";

TableEnd();
ROfoot();

}else{

if(!empty($cnn)){



$result2 = $db("SELECT char_id FROM `char` WHERE account_id='$account' AND char_num='$pj'");
list($pj) = $dbfetch($result2);
sql_cls($result2);







ROhead();
TableStart();
menu();
TableEnd();
TableStart();



$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account_id) = $dbfetch($result23);
sql_cls($result23);

$result2 = $db("SELECT char_num, name, zeny FROM `char` WHERE account_id='$account_id' ORDER BY `char_num` ASC");
echo "<center><table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "
 <form method='POST' action='index.php?sec=CP'>
 <tr>
    <td width='100%' colspan='4' class='row2' align='center'><b>"._TRANSZENY."</b></td>
  </tr>
  <tr>
    <td width='40%' colspan='2' class='row2' align='center'><b>"._NICKNAME."</b></td>
    <td width='60%' class='row2' align='center'><b>"._ZENYNUM."</b></td>
<td width='1%' class='row2' align='center'><b>"._TO."</b></td>
  </tr>
";
while(list($char_num, $name, $zeny) = $dbfetch($result2)){
if($pj2=="0"){
$pj2="cero";
}

if($char_num=="0"){
$char_num="cero";
}

if($pj2!=$char_num){
echo "
  <tr>
	<td width='1%' class='row2'><img src='images/arrow2.gif' border='0'></td>
    <td width='40%' class='row2' align='center'><b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b></td>
    <td width='60%' class='row2' align='center'><b>".$zeny."</b></td>
<td width='1%' class='row2' align='center'>
<input type='hidden' name='sec' value='CP'>
<input type='hidden' name='op' value='TransferTo'>
<input type='hidden' name='cnn' value='ok'>
<input type='hidden' name='pj' value='$pj2'>
<input type='radio' value='".$char_num."' name='to'>
</td>
  </tr>
";
}
}
echo "
  <tr>
    <td width='100%' colspan='4' class='row2' align='center'><input type='submit' value='"._SUBMIT."'></td>
  </tr>
";

echo "</form></table></center>";
sql_cls($result2);




TableEnd();
ROfoot();
}else{
header("Location: index.php?sec=CP&op=TransferZeny");
}


} // if empty $to


}
}else{
header("Location: index.php?sec=CP");
}
}

function TransferComplete(){
global $nickname, $db, $dbfetch;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{



$result2 = $db("SELECT account_id FROM `login` WHERE userid='$nickname'");
list($account) = $dbfetch($result2);
sql_cls($result2);


$zenys1 = $_POST['zenys1']; // Numero Zeny 1er Cuenta
$zenys2 = $_POST['zenys2']; // Numero de Zeny a Transferir
$zenys3 = $_POST['zenys3']; // Numero de Zeny 2nda cuenta
$chars1 = $_POST['chars1'];
$chars2 = $_POST['chars2'];

$transfertotal = $zenys2 + $zenys3;

if($zenys1!="0"){
$changevalues = $zenys1 - $zenys2;
}else{
$changevalues = "0";
}

if($zenys2<=$zenys1){
$result = $db("UPDATE `char` SET zeny='$transfertotal' WHERE char_id='$chars2'");
$result = $db("UPDATE `char` SET zeny='$changevalues' WHERE char_id='$chars1'");

	$ban_until = time() + (2 * 60);
	$result = $db("UPDATE `login` SET ban_until='$ban_until' WHERE account_id='$account' AND ban_until='0'");

}
header("Location: index.php?sec=CP&op=TransferZeny");

}
}else{
header("Location: index.php?sec=CP");
}
}

function ResetLook(){
global $nickname, $db, $dbfetch;
if(sys_security($nickname)){
if(!VerifyStatus($nickname)){
header("Location: index.php?sec=CP&op=NeedLogOFF&ST=1");
}else{















$cnn = $_GET['cnn'];
$pj = $_GET['pj'];
if(!empty($cnn)){

$result2 = $db("SELECT account_id FROM `login` WHERE userid='$nickname'");
list($account) = $dbfetch($result2);
sql_cls($result2);


$result2 = $db("SELECT char_id FROM `char` WHERE account_id='$account' AND char_num='$pj'");
list($pj) = $dbfetch($result2);
sql_cls($result2);

$result = $db("UPDATE `char` SET weapon='0' WHERE char_id='$pj'");
$result = $db("UPDATE `char` SET shield='0' WHERE char_id='$pj'");
$result = $db("UPDATE `char` SET head_top='0' WHERE char_id='$pj'");
$result = $db("UPDATE `char` SET head_mid='0' WHERE char_id='$pj'");
$result = $db("UPDATE `char` SET head_bottom='0' WHERE char_id='$pj'");

$result = $db("UPDATE `inventory` SET equip='0' WHERE char_id='$pj'");

	$ban_until = time() + (2 * 60);
	$result = $db("UPDATE `login` SET ban_until='$ban_until' WHERE account_id='$account' AND ban_until='0'");

header("Location: index.php?sec=CP&op=ResetLook");
}

ROhead();
TableStart();
menu();
TableEnd();
TableStart();





$result23 = $db("SELECT account_id FROM login WHERE userid='$nickname'");
list($account_id) = $dbfetch($result23);
sql_cls($result23);

$red = "<b>[<font color='red'>|||</font>]</b>";
$green = "<b>[<font color='green'>|||</font>]</b>";

$result2 = $db("SELECT char_id, char_num, name, weapon, shield, head_top, head_mid, head_bottom FROM `char` WHERE account_id='$account_id' ORDER BY `char_num` ASC");
echo "<center><table border='0' width='100%' bgcolor='#000000' cellspacing='1'>";
echo "
  <tr>
<td width='100%' colspan='4'class='row2' align='center'><b>"._RESETEKIP."</b></td>
  </tr>
";
echo "
  <tr>
<td width='100%' colspan='4'class='row2' align='center'><b>"._COLORS."</b>: "._UNEQUIPED.": $red  "._EQUIPED.": $green</td>
  </tr>
";
echo "
  <tr>
    <td width='40%' colspan='2' class='row2' align='center'><b>"._NICKNAME."</b></td>
    <td width='60%' class='row2' align='center'><b>"._EQUIP."</b></td>
<td width='1%' class='row2' align='center'><b>"._OPTIONS."</b></td>
  </tr>
";
while(list($char_id, $char_num, $name, $weapon, $shield, $head_top, $head_mid, $head_bottom) = $dbfetch($result2)){

if($weapon=="0"){
$weapon = "$red";
}else{
$weapon = "$green";
}

if($shield=="0"){
$shield = "$red";
}else{
$shield = "$green";
}

if($head_top=="0"){
$head_top = "$red";
}else{
$head_top = "$green";
}

if($head_mid=="0"){
$head_mid = "$red";
}else{
$head_mid = "$green";
}

if($head_bottom=="0"){
$head_bottom = "$red";
}else{
$head_bottom = "$green";
}

echo "
  <tr>
	<td width='1%' class='row2'><img src='images/arrow2.gif' border='0'></td>
    <td width='40%' class='row2' align='center'><b><a href='index.php?sec=PlayerRank&op=PlayerInfo&player=$char_id'>".$name."</a></b></td>
    <td width='60%' class='row2' align='center'><b>".$weapon."".$shield."".$head_top."".$head_mid."".$head_bottom."</b></td>
<td width='1%' class='row2' align='center'><a href='index.php?sec=CP&op=ResetLook&cnn=ok&pj=$char_num'>"._RESETPOS."</a></td>
  </tr>
";

}
echo "</table></center>";
sql_cls($result2);




TableEnd();
ROfoot();













}
}else{
header("Location: index.php?sec=CP");
}
}

switch($op){
case "ChangeSlotOK":ChangeSlotOK();break;
case "TransferComplete":TransferComplete();break;
case "TransferTo":TransferTo();break;
case "ResetLook":ResetLook();break;
case "TransferZeny":TransferZeny();break;
case "ChangeSlot":ChangeSlot();break;
case "ResetPosition":ResetPosition();break;
case "Divorce":Divorce();break;
case "ChangeEmail":ChangeEmail();break;
case "NeedLogOFF":NeedLogOFF();break;
case "ChangePassword":ChangePassword();break;
case "Desconectar":Desconectar();break;
case "Login":Login();break;
case "Info":Info();break;
case "Register":Register();break;
case "SaveReg":SaveReg();break;
default:index();break;
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>