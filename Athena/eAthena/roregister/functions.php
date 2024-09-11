<?php
/**
 * RORegister - A Ragnarok Online Control Panel
 * for both text-based and SQL-based eAthena Servers.
 *
 * Copyright (C) 2005-2007 The RORegister Development Team
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the license; or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330,
 * Boston, MA 02111-1307, USA.
 *
 * Registration processing script.
 * Main script that processes the incoming form data.
 *
 * @package    RORegister
 * @version    1.3
 * @link       http://roregister.net/
 * @irc        irc.freenode.net#roregister
 */

/**
 * Make sure this script is included.
 */
if(!defined("__included")){
    // Generate proper status code.
    header("HTTP/1.1 403 Forbidden");
    die("Direct access to this location is not allowed. ");
}

/**
 * Checks the server status.
 *
 * @param   string  server_name
 * @param   string  status_hostname
 * @param   int     status_port
 *
 * @return  void
 */
function check_server_status($server_name, $status_hostname, $status_port){
	ini_set("error_reporting", "0");
	$null_error = "";
	if(!fsockopen($status_hostname, $status_port, $null_error, $null_error, 0)){
		echo "<a>$server_name:</a><div class=\"offline\">Offline</div>";
	} else {
		echo "<a>$server_name:</a><div class=\"online\">Online</div>";
	}
	ini_restore();
}

?>
