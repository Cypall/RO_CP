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

// Basic Skin Variables
$swfon = "yes"; // Activate Flash Menu - yes/no
function Skinhead(){
global $swfon;
echo "<LINK REL='StyleSheet' HREF='Skin/default/style/style.css' TYPE='text/css'>";
echo "<body background='Skin/default/images/bg_5.jpg' topmargin='0' leftmargin='0'>";
echo "<center><table border='0' height='100%' width='780' cellspacing='0' cellpadding='0'><tr>
<td width='1%' background='Skin/default/images/left.jpg' valign='top'><img border='0' src='Skin/default/images/left.jpg' width='12' height='5'></td>
<td width='780' height='127'><p align='center'>
<img src='Skin/default/images/logo.jpg' border='0' width='780'>";
if($swfon=="yes"){
echo "

	<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" WIDTH=780 HEIGHT=36>		 
		 <PARAM NAME=movie VALUE=\"Skin/default/images/menu.swf\">
		 <PARAM NAME=quality VALUE=high>
		 <PARAM NAME=bgcolor VALUE=#ffffff>
		 <EMBED src=\"Skin/default/images/menu.swf\" quality=high bgcolor=#ffffff  WIDTH=780 HEIGHT=36 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\">
		 </EMBED>
	</OBJECT>	

";
}
echo "</td><td width='1%' background='Skin/default/images/right.jpg' valign='top'><img border='0' src='Skin/default/images/right.jpg' width='14' height='5'></td></tr>
<tr><td width='1%' background='Skin/default/images/left.jpg'></td><td width='99%'>";
echo "<table border='0' height='100%' width='100%' cellspacing='0' cellpadding='0'><tr><td background='Skin/default/images/center.jpg' width='99%' valign='top'>";
echo "<table border='0' width='100%' cellspacing='0' cellpadding='0'><tr><td width='1%' valign='top'>";
echo "<table border='0' width='146' cellspacing='0' cellpadding='0'><tr><td width='146' valign='top'>";
sides();
echo "</td></tr></table>";
echo "</td><td width='98%' valign='top'>";
}

function Skinfoot(){
global $showbanners;
if($showbanners=="1"){
echo "</td><td width='1%' valign='top'>";
banners();
echo "</td>";
}
global $legacy;
echo "</td></tr></table>";

echo "<table bgcolor='#A0C0EF' border='0' width='100%' cellspacing='0' cellpadding='0'><tr><td width='100%'>";
echo "<center>".$legacy."<b><a href='index.php'>Home</a> | <a href='index.php?sec=CP'>Login</a> | <a href='index.php?sec=GuildRank'>Guild Rank</a> | <a href='index.php?sec=PlayerRank'>Player Rank</a> | <a href='index.php?sec=HomunculusRank'>Homunculus Rank</a> | LINK</b></center>";
echo "</td></tr></table>";
echo "</td></tr></table>";
echo "</td><td width='1%' background='Skin/default/images/right.jpg'></td></tr></table></center>";
}

function skinblock($title, $content, $blockimg){


echo "
<table border='0' width='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%'>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='1%'><img border='0' src='Skin/default/images/blok13.png' width='17' height='10'></td>
          <td width='99%' background='Skin/default/images/blok15.png'><img border='0' src='Skin/default/images/blok15.png' width='120' height='10'></td>
          <td width='1%'><img border='0' src='Skin/default/images/blok14.png' width='17' height='10'></td>
        </tr>
        <tr>
          <td width='1%'><img border='0' src='Skin/default/images/blok10.png' width='17' height='10'></td>
          <td width='99%' align='center' background='Skin/default/images/blok11.png'><font class='blockstyle'><B>$title</B></font></td>
          <td width='1%'><img border='0' src='Skin/default/images/blok12.png' width='17' height='10'></td>
        </tr>
        <tr>
          <td width='1%'><img border='0' src='Skin/default/images/blok07.png' width='17' height='4'></td>
          <td width='99%' background='Skin/default/images/blok09.png'><img border='0' src='Skin/default/images/blok09.png' width='1' height='4'></td>
          <td width='1%'><img border='0' src='Skin/default/images/blok08.png' width='17' height='4'></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width='100%'>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='1%' valign='top' background='Skin/default/images/blok02.png'><img border='0' src='Skin/default/images/blok02.png' width='6' height='1'></td>
          <td width='99%' background='Skin/default/images/blok06.png'>
$blockimg$content</td>
          <td width='1%' background='Skin/default/images/blok01.png' valign='top'><img border='0' src='Skin/default/images/blok01.png' width='6' height='1'></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width='100%'>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='1%'><img border='0' src='Skin/default/images/blok03.png' width='6' height='7'></td>
          <td width='99%' background='Skin/default/images/blok05.png'><img border='0' src='Skin/default/images/blok05.png' width='1' height='7'></td>
          <td width='1%' background='Skin/default/images/blok04.png'><img border='0' src='Skin/default/images/blok04.png' width='6' height='7'></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
";
}

function skinnews($nautor,$ntitle,$ntext, $ndate){
echo "
<table border='0' width='100%'cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%'><img border='0' src='Skin/default/images/sep01.png' width='1' height='1'></td>
  </tr>
</table>
<table border='0' width='100%' bgcolor='#000000' cellspacing='1' cellpadding='1'>
  <tr>
    <td width='100%' bgcolor='#ECF0FF'>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='100%'><center><b>"._SUBMITEDBY.": $nautor | $ntitle</b></center> </td>
        </tr>
        <tr>
          <td width='100%'>$ntext</td>
        </tr>
        <tr>
          <td width='100%'>
            <p align='center'><b>"._DATE."</b>: ".format_date($ndate)."</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
";
}

function TableStart(){
echo "
<table border='0' width='100%'cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%'><img border='0' src='Skin/default/images/sep01.png' width='1' height='1'></td>
  </tr>
</table><table border='0' width='100%' bgcolor='#000000' cellspacing='1' cellpadding='1'>
  <tr>
    <td width='100%' bgcolor='#ECF0FF'>
";
}

function TableEnd(){
echo "
</td>
  </tr>
</table>
";
}

function TableStart2(){
echo "
<table border='0' width='100%'cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100%'><img border='0' src='Skin/default/images/sep01.png' width='1' height='1'></td>
  </tr>
</table><table border='0' width='100%' bgcolor='#000000' cellspacing='1' cellpadding='1'>
  <tr>
    <td width='100%' bgcolor='#F5ECFF'>
";
}

function TableEnd2(){
echo "
</td>
  </tr>
</table>
";
}

/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>