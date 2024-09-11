<?
function checkform($user,$pass,$gndr,$mail) {
  if(empty($user) || empty($pass) || empty($gndr) || empty($mail))
    return(FALSE);
  if(!eregi("^[a-z0-9\._-]+$",$user) || !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$mail))
    return(FALSE);
  if(strlen($user)<4 || strlen($pass)<6)
    return(FALSE);
  if($user == $pass)
    return(FALSE);
  return(TRUE);
}

function checkcode($vrfy,$key,$seed) {
  if(empty($vrfy))
    return(FALSE);
  else {
    $seed = str_split($seed,4);
    $vrfy = hash('sha256',$seed[0].$vrfy.$seed[1]);
    if($vrfy == $key)
      return(TRUE);
    else
      return(FALSE);
	} 
}

function ea_connect($host,$user,$pass,$data) {
  $mysqli = new mysqli($host,$user,$pass,$data);
  if(mysqli_connect_errno())
    return(FALSE);
  else
    return($mysqli);
}

function ea_close($mysqli) {
  $mysqli->close();
}

function ea_checkuser($mysqli,$username) {
  $username = $mysqli->real_escape_string($username);
  $sqlquery = "SELECT `userid` FROM `login` WHERE `userid`='$username'";
  if(mysqli_num_rows($mysqli->query($sqlquery)) > 0)
    return(FALSE);
  else
    return(TRUE);
}

function ea_checkmail($mysqli,$usermail) {
  $usermail = $mysqli->real_escape_string($usermail);
  $sqlquery = "SELECT `email` FROM `login` WHERE `email`='$usermail'";
  if(mysqli_num_rows($mysqli->query($sqlquery)) > 1)
    return(FALSE);
  else
    return(TRUE);
}

function ea_adduser($mysqli,$username,$userpass,$usergndr,$usermail) {
  $username = $mysqli->real_escape_string($username);
  $userpass = $mysqli->real_escape_string($userpass);
  $usermail = $mysqli->real_escape_string($usermail);
  $sqlquery = "INSERT INTO `login` (`userid`,`user_pass`,`sex`,`email`) VALUES ('$username','$userpass','$usergndr','$usermail')";
  $mysqli->query($sqlquery);

}

function ea_findusr($mysqli,$username,$userpass) {
 $username = $mysqli->real_escape_string($username);
 $userpass = $mysqli->real_escape_string($userpass);
  $sqlquery = "SELECT `account_id` FROM `login` WHERE `userid`='$username' and `user_pass`='$userpass'";
  if($result = $mysqli->query($sqlquery)){
  	$row=mysqli_fetch_object($result);
	mysqli_free_result($result);
	return($row->account_id);
  }else
    return(0);
}

function ea_findusrname($mysqli,$useracc) {
 $useracc = $mysqli->real_escape_string($useracc);
  $sqlquery = "SELECT `userid` FROM `login` WHERE `account_id`='$useracc'";
  if($result = $mysqli->query($sqlquery)){
  	$row=mysqli_fetch_object($result);
	mysqli_free_result($result);
	return($row->userid);
  }else
    return(0);
}


function ea_addtrue($mysqli,$userid,$card_id,$price) {
  $userid = $mysqli->real_escape_string($userid);
  $card_id = $mysqli->real_escape_string($card_id);
  $price = $mysqli->real_escape_string($price);
  $sqlquery = "INSERT INTO `true_pay` (`true_id`,`price`,`account_id`,`flag`) VALUES ('$card_id','$price','$userid','0')";
  $mysqli->query($sqlquery);

}
?>