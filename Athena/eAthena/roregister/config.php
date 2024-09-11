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

//==============================================================//
//MySQL Server Options
//==============================================================//

//MySQL Server Host
$sql_host = 'localhost';

//MySQL Server User
$sql_user = 'root';

//MySQL Server Password
$sql_pass = '';

//MySQL Server Ragnarok DB
$sql_db = 'ragnarok';

//==============================================================//
//Server status options
//==============================================================//

//eAthena Server Hostname
$status_hostname = 'localhost';

//eAthena Login Server Port
$status_acc_port = '6900';

//eAthena Character Server Port
$status_char_port = '6121';

//eAthena Map Server Port
$status_map_port = '5121';

//==============================================================//
//Registration Options
//==============================================================//

//Image verification images folder
$reg_image_folder = 'images';

//Username cannot be same as password (0=no, 1=yes)
$reg_userpass_same = '1';

//Two accounts cannot share one email (0=no, 1=yes)
$reg_email_same = '1';

//MD5 Encryption option (0=no, 1=yes)
$reg_md5 = '0';

//==============================================================//
//Appearance Options
//==============================================================//

//What should appear in the titlebar of the browser?
$server_name = "My eAthena Server";

//Display Banner (0=no, 1=yes)
$display_banner = '1';

//Display Server Status (0=no, 1=yes)
$display_status = '1';

//Status position (Counted from the left side of the server status background image, useful for custom banners) in pixels
$display_status_position = '30';

//Location of the banner file
$display_banner_location = 'images/header.jpg';

//Height of the banner file
$display_banner_height = '150';

//Width of the banner file
$display_banner_width = '433';

//Location of the status background file
$display_status_location = 'images/header_status.jpg';

//Width of the status background file
$display_status_height = '150';

//Height of the status background file
$display_status_width = '167';
?>
