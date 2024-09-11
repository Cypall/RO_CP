<?php
include("config.php");
//include("server_status.php");
//include("user_online.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title><? echo"title"; ?></title>
<style type="text/css">
<!--
body,td,th {
	color: #000000;
}
body {
	background-color: #000000;
	background-image: url(demons_image/bg.gif);
	background-repeat: repeat;
}
#apDiv1 {
	position:absolute;
	left:313px;
	top:343px;
	width:45px;
	height:60px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:264px;
	top:270px;
	width:650px;
	height:826px;
	z-index:1;
	background-color: #FFDBDB;
}
.style2 {font-size: 1px}
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FF0000;
}
a:hover {
	text-decoration: none;
	color: #0000FF;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
#apDiv3 {
	position:absolute;
	left:268px;
	top:270px;
	width:651px;
	height:833px;
	z-index:1;
}
.style13 {font-weight: bold; font-size: 12px;}
.style14 {font-size: 12px}
.style15 {color: #FFD1D1}
#apDiv4 {
	position:absolute;
	left:28px;
	top:223px;
	width:44px;
	height:52px;
	z-index:2;
	background-color: #FFCFCF;
}
-->
</style></head>

<body>
<table width="853" height="191" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="880" class="style15"><div align="center"><img src="<? echo "$logo"; ?>" width="853" height="250" /></div></td>
  </tr>
  <tr>
    <td class="style15"><img src="demons_image/free.gif" width="850" height="5" /></td>
  </tr>
  <tr>
    <td class="style15"><table width="850" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="201" height="299" valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="3"><img src="demons_image/menu_01.jpg" width="200" height="62" /></td>
            </tr>
            <tr>
              <td><img src="demons_image/menu_02.jpg" width="19" height="122" /></td>
              <td background="demons_image/menu_03.jpg"><table width="162" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><span class="style2">&nbsp;. </span>
                    <iframe src="menu.php" frameborder="0" scrolling="auto" width="162" height="110"></iframe></td>
                </tr>
              </table></td>
              <td><img src="demons_image/menu_04.jpg" width="19" height="122" /></td>
            </tr>
            <tr>
              <td colspan="3"><img src="demons_image/menu_05.jpg" width="200" height="16" /></td>
            </tr>
          </table>
          <table width="200" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="demons_image/free.gif" width="200" height="5" />
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3"><img src="demons_image/status_01.jpg" width="200" height="50" /></td>
                  </tr>
                  <tr>
                    <td width="19"><img src="demons_image/status_02.jpg" width="19" height="145" /></td>
                    <td width="163" bgcolor="#FFFFFF"><table width="157" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="96"><span class="style13">Login Server </span></td>
                        <td width="61"><span class="style14"><?php echo $acc_status; ?></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td width="61">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="style13">Char Server </span></td>
                        <td><span class="style14"><?php echo $char_status; ?></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="style13">Map Server </span></td>
                        <td><span class="style14"><?php echo $map_status; ?></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="style13">จำนวนผู้ Online </span></td>
                        <td><span class="style14"><?php echo $usersonline; ?></span></td>
                      </tr>

                    </table></td>
                    <td width="18"><img src="demons_image/status_04.jpg" width="18" height="145" /></td>
                  </tr>
                  <tr>
                    <td colspan="3"><img src="demons_image/status_05.jpg" width="200" height="21" /></td>
                  </tr>
                </table>
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="demons_image/free.gif" width="200" height="5" /></td>
                  </tr>
                </table>
                <table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3"><img src="demons_image/link_01.jpg" width="200" height="52" /></td>
                  </tr>
                  <tr>
                    <td width="9"><img src="demons_image/link_02.jpg" width="9" height="328" /></td>
                    <td width="182" bgcolor="#FFFFFF"><span class="style2">&nbsp;.<iframe marginwidth=0 marginheight=0 
            src="link.php" frameborder=0 width=182 
            scrolling=no height=326></iframe> </span></td>
                    <td width="9"><img src="demons_image/link_04.jpg" width="9" height="328" /></td>
                  </tr>
                  <tr>
                    <td colspan="3"><img src="demons_image/link_05.jpg" width="200" height="20" /></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        <td width="679" valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td><table id="Table_01" width="651" height="830" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3"><img src="images/download_01.jpg" width="651" height="118" alt="" /></td>
              </tr>
              <tr>
                <td rowspan="2"><img src="images/register_02.jpg" width="44" height="712" alt="" /></td>
                <td><iframe marginwidth=0 marginheight=0 
            src="download2.php" frameborder=0 width=569 
            scrolling=no height=387></iframe></td>
                <td rowspan="2"><img src="images/register_04.jpg" width="38" height="712" alt="" /></td>
              </tr>
              <tr>
                <td><img src="images/register_05.jpg" width="569" height="325" alt="" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<div align="center">Copyright ? 2008-2009 <a href="http://www.demons-design.com/" target="_blank">DemonsCp</a> All Rights Reserved Powered by<a href="http://www.demons-design.com/" target="_blank">Demons-Design.com</a></div>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
