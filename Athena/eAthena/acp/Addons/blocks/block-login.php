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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "login.php")){
	Header("Location: ../../index.php");
	die();
}

global $nickname;
if(!empty($nickname)){
$content = "<center>";
$content .="<b>"._WELCOME.": <font color='red'>$nickname</font></center>";
$content .="<li><a href='index.php?sec=CP&op=Desconectar'>"._LOGOUT."</a></li>";
$content .="<li><a href='index.php?sec=CP'>"._MYINFO."</a></li>";
$content .="<li><a href='index.php?sec=CP&op=ChangePassword'>"._CHANGEPASS."</a></li>";
$content .="<li><a href='index.php?sec=CP&op=ChangeEmail'>"._CHANGEMAIL."</a></li>";
$content .="<li><a href='index.php?sec=CP&op=ResetLook'>"._RESETLOOK."</a></li>";
$content .="<li><a href='index.php?sec=CP&op=ResetPosition'>"._RESETPOSIT."</a></li>";
$content .="<li><a href='index.php?sec=CP&op=ChangeSlot'>"._CHANGESLOT."</a></li>";
$content .="<li><a href='index.php?sec=CP&op=TransferZeny'>"._TRANSFERZENY."</a></li>";
}else{
$content = "<center><form method='POST' action='index.php?sec=CP'>
      <table width='100%'>
        <tr>
          <td  align='center' width='100%'><b>"._NICKNAME.":</b></td>
</tr><tr>
          <td  align='center' width='100%'>
          <input maxLength=\"23\" size=\"23\" name=\"username\">
          </td>
        </tr>
        <tr>
          <td  align='center' width='100%'><b>"._PASSWORD.":</b></td>
</tr><tr>
          <td  align='center' width='100%'>
          <input type=\"password\" maxLength=\"23\" size=\"23\" name=\"password\">
          <input type=\"hidden\" name=\"formulario\" value='ok'>
          <input type=\"hidden\" name=\"op\" value='Login'>
          </td>
        </tr>
        <tr>
          <td align='center'><input type=\"submit\" value=\""._CONNECT."\"></td>
        </tr>
      </table>
    </form></center>
";
}
/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>