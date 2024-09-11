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
 * Main configuration file.
 * Customize RORegister!
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

require_once("config.php");
require_once("functions.php");

// Should we display the banner?
if($display_banner != '1'){
	echo "<table cellspacing=\"0\" cellpadding=\"0\" style=\"margin-left: auto; margin-right: auto; border: none;\">\n";
	echo "<tr>\n";
	echo "<td style=\"width: 0px;\">&nbsp;</td>\n";
} else {
    // Calculate total width.
    $banner_width   =   $display_banner_width + $display_status_width + 4;
	echo "<table cellspacing=\"0\" cellpadding=\"0\" style=\"margin-left: auto; margin-right: auto; border: solid 2px; width: {$banner_width}px\">\n";
	echo "<tr>\n";
	echo "<td style=\"background: url('{$display_banner_location}'); height: {$display_banner_height}px; width: {$display_banner_width}px;\">&nbsp;</td>\n";
}

// Should we display the server status?
if($display_status == '1'){
	if($display_banner == '1'){
	    echo "<td style=\"background: url('{$display_status_location}'); height: {$display_status_height}px; width: {$diplay_status_width}px\">\n";
	    echo "<div style=\"position:relative; left:{$display_status_position}px; top: 5px;\">\n";
	    check_server_status("Login Server", $status_hostname, $status_acc_port);
	    check_server_status("Char Server", $status_hostname, $status_char_port);
	    check_server_status("Map Server", $status_hostname, $status_map_port);
	} else {
	    echo "<td style=\"border: solid 2px; background: url('{$display_status_location}'); height: {$display_status_height}px; width: {$diplay_status_width}px\">\n";
	    echo "<div style=\"position:relative; left:{$display_status_position}px; top: 5px;\">\n";
	    check_server_status("Login Server", $status_hostname, $status_acc_port);
	    check_server_status("Char Server", $status_hostname, $status_char_port);
	    check_server_status("Map Server", $status_hostname, $status_map_port);
	}
	
} else {
	echo "<td style=\"width: 0px;\">\n";
	echo "<div style=\"position:relative; left:{$display_status_position}px; top: 5px;\">\n";
}

echo "</div>\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
?>
