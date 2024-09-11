<?php
include("config.php");
include("server_status.php");
include("user_online.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title><? echo"title"; ?></title>
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
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
.style9 {font-size: 12px; font-weight: bold; color: #0066FF; }
.style11 {font-size: 12px; color: #0000FF; }
.style12 {color: #000000}
-->
</style>
</head>

<body>
<table width="853" height="191" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="880"><div align="center"><img src="<? echo "$logo"; ?>" width="853" height="250" /></div></td>
  </tr>
  <tr>
    <td><img src="demons_image/free.gif" width="850" height="5" /></td>
  </tr>
  <tr>
    <td><table width="850" border="0" cellspacing="0" cellpadding="0">
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
                        <td width="96"><span class="style9">Login Server </span></td>
                        <td width="61"><span class="style11"><?php echo $acc_status; ?></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td width="61">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="style9">Char Server </span></td>
                        <td><span class="style11"><?php echo $char_status; ?></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="style9">Map Server </span></td>
                        <td><span class="style11"><?php echo $map_status; ?></span></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><span class="style9">จำนวนผู้ Online </span></td>
                        <td><span class="style11"><?php echo $usersonline; ?></span></td>
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
            <td><table id="Table_01" width="650" height="827" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="11"><img src="images/Untitled-1_01.gif" width="650" height="31" alt="" /></td>
              </tr>
              <tr>
                <td colspan="3" rowspan="2"><img src="images/Untitled-1_02.gif" width="208" height="236" alt="" /></td>
                <td colspan="7" bgcolor="#FFFFFF"><iframe marginwidth=0 marginheight=0 
            src="update.php" frameborder=0 width=423 
            scrolling=no height=185></iframe></td>
                <td rowspan="8"><img src="images/Untitled-1_04.gif" width="19" height="795" alt="" /></td>
              </tr>
              <tr>
                <td colspan="7"><img src="images/Untitled-1_05.gif" width="423" height="47" alt="" /></td>
              </tr>
              <tr>
                <td rowspan="6"><img src="images/Untitled-1_06.gif" width="13" height="559" alt="" /></td>
                <td bgcolor="#FFFFFF"><iframe marginwidth=0 marginheight=0 
            src="expdrop.php" frameborder=0 width=160 
            scrolling=no height=135></iframe></td>
                <td colspan="4" rowspan="4"><img src="images/Untitled-1_08.gif" width="73" height="387" alt="" /></td>
                <td bgcolor="#FFFFFF"><iframe marginwidth=0 marginheight=0 
            src="sell.php" frameborder=0 width=148 
            scrolling=no height=132></iframe></td>
                <td colspan="2" rowspan="2"><img src="images/Untitled-1_10.gif" width="69" height="183" alt="" /></td>
                <td bgcolor="#FFFFFF"><iframe marginwidth=0 marginheight=0 
            src="freecommand.php" frameborder=0 width=155 
            scrolling=no height=132></iframe></td>
              </tr>
              <tr>
                <td><img src="images/Untitled-1_12.gif" width="162" height="46" alt="" /></td>
                <td><img src="images/Untitled-1_13.gif" width="154" height="46" alt="" /></td>
                <td><img src="images/Untitled-1_14.gif" width="160" height="46" alt="" /></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF"><span class="style2">&nbsp;. </span>
                  <iframe marginwidth=0 marginheight=0 
            src="class3.php" frameborder=0 width=162 
            scrolling=no height=135></iframe></td>
                <td colspan="2" bgcolor="#FFFFFF"><span class="style2">&nbsp;. </span>
                  <iframe marginwidth=0 marginheight=0 
            src="newhat.php" frameborder=0 width=161 
            scrolling=no height=135></iframe></td>
                <td rowspan="2"><img src="images/Untitled-1_17.gif" width="62" height="204" alt="" /></td>
                <td bgcolor="#FFFFFF"><iframe marginwidth=0 marginheight=0 
            src="allitemban.php" frameborder=0 width=160 
            scrolling=no height=135></iframe></td>
              </tr>
              <tr>
                <td><img src="images/Untitled-1_19.gif" width="162" height="67" alt="" /></td>
                <td colspan="2"><img src="images/Untitled-1_20.gif" width="161" height="67" alt="" /></td>
                <td><img src="images/Untitled-1_21.gif" width="160" height="67" alt="" /></td>
              </tr>
              <tr>
                <td colspan="3" bgcolor="#FFFFFF"><iframe marginwidth=0 marginheight=0 
            src="guild.php" frameborder=0 width=200 
            scrolling=no height=153></iframe></td>
                <td rowspan="2"><img src="images/Untitled-1_23.gif" width="15" height="172" alt="" /></td>
                <td colspan="5" bgcolor="#FFFFFF"><iframe src="guild/guild.php" frameborder="0" scrolling="auto" width="400" height="155">></iframe></td>
              </tr>
              <tr>
                <td colspan="3"><img src="images/Untitled-1_25.gif" width="203" height="16" alt="" /></td>
                <td colspan="5"><img src="images/Untitled-1_26.gif" width="400" height="16" alt="" /></td>
              </tr>
              <tr>
                <td><img src="images/spacer.gif" width="13" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="162" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="33" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="8" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="15" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="17" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="154" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="7" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="62" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="160" height="1" alt="" /></td>
                <td><img src="images/spacer.gif" width="19" height="1" alt="" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p align="center"><span class="style12">Copyright ? 2008-2009 <a href="http://www.demons-design.com/" target="_blank">DemonsCp</a> All Rights Reserved Powered by<a href="http://www.demons-design.com/" target="_blank">Demons-Design.com</a></span></p>
<p align="center">&nbsp;</p>
</body>
</html>
