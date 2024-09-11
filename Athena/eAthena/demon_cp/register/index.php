<?
/* กำหนด Config การเข้าถึง Mysql Database */

include("config.php");

if (!mysql_connect("$sql_host","$sql_user","$sql_pass")) { echo "ERROR : sorry! Can not connect to Mysql Database."; exit(); }

if ($_POST["reg_confirm"]=="yes") {
$reg_userid=$_POST["reg_userid"];
$reg_user_pass=$_POST["reg_user_pass"];
$reg_user_pass2=$_POST["reg_user_pass2"];
$reg_email=$_POST["reg_email"];
$reg_sex=$_POST["reg_sex"];
$mail_pattern="[[:alnum:]._-]+@[[:alnum:]-]+\.)*[[:alnum:]]+";
	if ($reg_userid==NULL || $reg_user_pass==NULL || $reg_user_pass2==NULL || $reg_email==NULL || $reg_sex==NULL) {
	$error="<font color='red'>ข้อมูลของคุณไม่ครบถ้วน., โปรดกรอกข้อมูลให้ครบถ้วนทุกช่อง</font>";
	} else if (strlen($reg_user_pass)<4 || strlen($reg_user_pass2)<4) {
	$error="<font color='red'>PASS จะต้องมี 4 หลักขึ้นไป</font>";
	} else if (!eregi($mail_pattern, $reg_email)) {
	$error="<font color='red'>e-Mail Address ไม่ถูกต้อง., โปรดแก้ไข</font>";
	} else if ($reg_user_pass!=$reg_user_pass2) {
	$error="<font color='red'>PASS 2 ช่องไม่ตรงกัน., โปรดลองอีกครั้ง</font>";
	} else if (mysql_num_rows(mysql_db_query($sql_db,"SELECT * FROM $sql_db.login WHERE userid='$reg_userid'"))) {
	$error="<font color='red'>ID นี้มีผู้ใช้ก่อนนี้แล้ว., โปรดเลือก ID ใหม่ แล้วลองอีกครั้ง</font>";
	} else if (mysql_num_rows(mysql_db_query($sql_db,"SELECT * FROM $sql_db.login WHERE email='$reg_email'"))) {
	$error="<font color='red'>e-Mail Address นี้มีผู้ใช้ก่อนนี้แล้ว., โปรดเลือก e-Mail Address ใหม่ แล้วลองอีกครั้ง</font>";
	} else {
	$sql = mysql_query("INSERT INTO `login` (`account_id`, `userid`, `user_pass`, `sex`, `email`) VALUES ('', '$reg_userid', '$reg_user_pass', '$reg_sex','$reg_email');") or die (mysql_error());
		if ($sql == true) {
		$error="<font color='green'>การลงทะเบียนเสร็จสิ้น</font>";
		} else {
		$error="<font color='red'>การลงทะเบียนล้มเหลว</font>";
		} 
	}
}
mysql_close();
?>
<html>
<head>
<title><?php echo $servername; ?> :: Register</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-11">
<link rel="stylesheet" type="text/css" href="mario-ro.css">
<script type="text/javascript">
function checkeng() {
     var obj=frm_reg.reg_userid
     var str="_-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890" //กำหนดอักษรอังกฤษส่วนนี้ครับ
     var val=obj.value
     var valOK = true;
     
     for (i=0; i<val.length & valOK; i++){
           valOK = (str.indexOf(val.charAt(i))!= -1) 
     }
     
     if (!valOK) {
           alert("ขออภัย., ID จะต้องเป็น ภาษาอังกฤษ หรือตัวเลขเท่านั้น")
           obj.focus()
           return false
     } return true
} 
</script>
</head>
<body id="register2">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td><form name="frm_reg" method="post" action="" onSubmit="return checkeng()">
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td colspan="2" align="left" class="text_mid"><strong>แบบฟอร์มลงทะเบียนสมัครสมาชิกใหม่</strong></td>
            </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="lightyellow" class="text_mid"><?=$error?></td>
            </tr>
            <tr>
              <td width="35%" align="right" valign="top" class="text_mid">ID : </td>
              <td><label>
                <input name="reg_userid" type="text" class="text_mid" id="reg_userid" value="<?=$_POST["reg_userid"]?>" size="20" maxlength="23">
                *</label></td>
            </tr>
            <tr>
              <td align="right" valign="top" class="text_mid">PASS : </td>
              <td><input name="reg_user_pass" type="password" class="text_mid" id="reg_user_pass" size="20" maxlength="32">
                *</td>
            </tr>
            <tr>
              <td align="right" valign="top" class="text_mid">ยืนยัน PASS : </td>
              <td><input name="reg_user_pass2" type="password" class="text_mid" id="reg_user_pass2" size="20" maxlength="32">
                *</td>
            </tr>
            <tr>
              <td align="right" valign="top" class="text_mid">e-Mail Address  : </td>
              <td><label>
                <input name="reg_email" type="text" class="text_mid" id="reg_email" value="<?=$_POST["reg_email"]?>" size="35" maxlength="39">
                </label>
                *<br>
                <span class="text_small">โปรดกรอกอีเมลล์ที่ใช้งานได้จริง อาจได้ใช้งานเมื่อต้องการลบตัวละครหรือลืมรหัสผ่าน </span></td>
            </tr>
            <tr>
              <td align="right" valign="top" class="text_mid">เพศ : </td>
              <td><label>
                <select name="reg_sex" class="text_mid" id="reg_sex">
                  <option value="M">ชาย</option>
                  <option value="F">หญิง</option>
                </select>
                *</label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input name="Submit" type="submit" class="text_mid" value="สมัครสมาชิกเดี๋ยวนี้">
                <input name="reg_confirm" type="hidden" id="reg_confirm" value="yes">
              </label></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>