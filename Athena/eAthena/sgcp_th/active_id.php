<?php
if(!$SERVER['system_safe']) exit();
if ($GET_a && $GET_act_key) {
$query = "SELECT memory_value2 FROM $CONFIG_sql_cpdbname.memory WHERE memory_object=\"activate_id\" AND memory_value1=\"".mysql_res($GET_a)."\" AND memory_value3=\"".mysql_res($GET_act_key)."\"";
$sql->result = $sql->execute_query($query,'active_id.php');$sql->total_query++;
if($sql->count_rows()) {
	$row = $sql->fetch_row();
	$userid = get_username($row[memory_value2]);
	$sql->execute_query("UPDATE $CONFIG_sql_dbname.login SET state=\"0\" WHERE account_id=\"$row[memory_value2]\"",'active_id.php');
	$sql->execute_query("DELETE FROM $CONFIG_sql_cpdbname.memory WHERE memory_object=\"activate_id\" AND memory_value1=\"".mysql_res($GET_a)."\" AND memory_value2=\"$row[memory_value2]\" AND memory_value3=\"".mysql_res($GET_act_key)."\"",'active_id.php');
	$display = sprintf($lang[EMA_active_success],$userid);
	redir("index.php?act=idx","$display",3);
} else {
	redir("index.php?act=idx",$lang[EMA_active_fail],3);
}
}
?>