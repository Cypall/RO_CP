-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 25, 2007 at 05:13 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `eyexcp`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_admins`
-- 

CREATE TABLE `eyex_admins` (
  `aid` int(11) NOT NULL auto_increment,
  `aname` varchar(255) NOT NULL,
  `apass` varchar(255) NOT NULL,
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `eyex_admins`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_blocks`
-- 

CREATE TABLE `eyex_blocks` (
  `bid` int(11) NOT NULL auto_increment,
  `btitle` varchar(255) NOT NULL,
  `bfile` varchar(255) NOT NULL,
  `bcontent` text NOT NULL,
  `bposit` int(11) NOT NULL,
  `bactive` varchar(11) NOT NULL,
  `blockimg` varchar(255) NOT NULL default '0',
  PRIMARY KEY  (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- 
-- Dumping data for table `eyex_blocks`
-- 

INSERT INTO `eyex_blocks` VALUES (1, 'LOGIN | CONECTATE', 'block-login.php', '', 1, 'yes', 'AssassinCrossF');
INSERT INTO `eyex_blocks` VALUES (2, 'MENU PRINCIPAL', 'block-menu.php', '', 2, 'yes', '0');
INSERT INTO `eyex_blocks` VALUES (3, 'SERVER STATUS', 'block-server_status.php', '', 3, 'yes', '0');
INSERT INTO `eyex_blocks` VALUES (4, 'USUARIOS EN LINEA', 'block-users_online.php', '', 4, 'yes', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_castle`
-- 

CREATE TABLE `eyex_castle` (
  `castle_id` int(11) unsigned NOT NULL default '0',
  `c_active` varchar(255) NOT NULL default 'yes',
  PRIMARY KEY  (`castle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `eyex_castle`
-- 

INSERT INTO `eyex_castle` VALUES (15, 'yes');
INSERT INTO `eyex_castle` VALUES (17, 'yes');
INSERT INTO `eyex_castle` VALUES (16, 'yes');
INSERT INTO `eyex_castle` VALUES (18, 'yes');
INSERT INTO `eyex_castle` VALUES (19, 'yes');
INSERT INTO `eyex_castle` VALUES (0, 'yes');
INSERT INTO `eyex_castle` VALUES (1, 'yes');
INSERT INTO `eyex_castle` VALUES (2, 'yes');
INSERT INTO `eyex_castle` VALUES (3, 'yes');
INSERT INTO `eyex_castle` VALUES (4, 'yes');
INSERT INTO `eyex_castle` VALUES (5, 'yes');
INSERT INTO `eyex_castle` VALUES (6, 'yes');
INSERT INTO `eyex_castle` VALUES (7, 'yes');
INSERT INTO `eyex_castle` VALUES (8, 'yes');
INSERT INTO `eyex_castle` VALUES (9, 'yes');
INSERT INTO `eyex_castle` VALUES (10, 'yes');
INSERT INTO `eyex_castle` VALUES (11, 'yes');
INSERT INTO `eyex_castle` VALUES (12, 'yes');
INSERT INTO `eyex_castle` VALUES (13, 'yes');
INSERT INTO `eyex_castle` VALUES (14, 'yes');
INSERT INTO `eyex_castle` VALUES (20, 'no');
INSERT INTO `eyex_castle` VALUES (21, 'no');
INSERT INTO `eyex_castle` VALUES (22, 'no');
INSERT INTO `eyex_castle` VALUES (23, 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_config`
-- 

CREATE TABLE `eyex_config` (
  `sitename` varchar(255) NOT NULL,
  `siteslogan` varchar(255) NOT NULL,
  `wmsg` text NOT NULL,
  `CPlang` varchar(255) NOT NULL,
  `siteskin` varchar(255) NOT NULL,
  `cnewshome` int(11) NOT NULL,
  `newsblock` int(11) NOT NULL,
  `showbanners` int(1) NOT NULL,
  `banner1` varchar(255) NOT NULL,
  `banurl1` varchar(255) NOT NULL,
  `banmsg1` varchar(255) NOT NULL,
  `banner2` varchar(255) NOT NULL,
  `banurl2` varchar(255) NOT NULL,
  `banmsg2` varchar(255) NOT NULL,
  `banner3` varchar(255) NOT NULL,
  `banurl3` varchar(255) NOT NULL,
  `banmsg3` varchar(255) NOT NULL,
  `banner4` varchar(255) NOT NULL,
  `banurl4` varchar(255) NOT NULL,
  `banmsg4` varchar(255) NOT NULL,
  `linktarget` varchar(255) NOT NULL,
  `showstatus` varchar(255) NOT NULL,
  `serverip` varchar(255) NOT NULL,
  `acc_port` varchar(255) NOT NULL,
  `char_port` varchar(255) NOT NULL,
  `map_port` varchar(255) NOT NULL,
  `grlimit` varchar(11) NOT NULL,
  `playerlimit` int(11) NOT NULL,
  `homunlimit` int(11) NOT NULL,
  `rates` varchar(255) NOT NULL,
  `serverinfo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `eyex_config`
-- 

INSERT INTO `eyex_config` VALUES ('EyeX ROCP', 'The Best Free Ragnarok Control Panel', '<center><b>Bienvenid@ a tu EyeX ROCP!</b><br>Tu Nuevo Panel de Control ROCP Gratis!.<br> Puedes Cambiar Este Mensaje Facilmente en el <a  href="panel.php?adm=AdminConfig"><b>Panel de Administracion</b></a> Puedes cambiar tambien, Muchas cosas Mas desde El Panel.<br>Solo entra Cambia y Click a Enviar! <br>Si Acabas de Instalar este Sistema, Te Recomiendo Crear tu Cuenta Administrador <a href=''panel.php''><b>Aquí</a></b>.', 'english', 'default', 1, 5, 1, 'images/banners/banner01.png', '#Your URL Here', 'Your Banner Here', 'images/banners/banner02.png', '#Your URL Here', 'Your Banner Here', 'images/banners/banner03.png', '#Your URL Here', 'Your Banner Here', 'images/banners/banner04.png', '#Your URL Here', 'Your Banner Here', '_blank', 'no', 'yourserver.noip.com', '6900', '6121', '5121', '20', 5, 5, '1/1/1', 'Woe Time:<br>\r\n  Sunday: 12:00 - 2:00<br> \r\n  Monday: 12:00 - 2:00 ');

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_guildmasters`
-- 

CREATE TABLE `eyex_guildmasters` (
  `gld_id` int(11) NOT NULL,
  `gld_master` varchar(255) NOT NULL,
  `gld_emblem` varchar(255) NOT NULL,
  `gld_msg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `eyex_guildmasters`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_homun`
-- 

CREATE TABLE `eyex_homun` (
  `homun_id` int(11) NOT NULL,
  `homun_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `eyex_homun`
-- 

INSERT INTO `eyex_homun` VALUES (6001, 'Lif');
INSERT INTO `eyex_homun` VALUES (6002, 'Amistr');
INSERT INTO `eyex_homun` VALUES (6003, 'Filir');
INSERT INTO `eyex_homun` VALUES (6004, 'Vanilmirth');
INSERT INTO `eyex_homun` VALUES (6005, 'Lif');
INSERT INTO `eyex_homun` VALUES (6006, 'Amistr');
INSERT INTO `eyex_homun` VALUES (6007, 'Filir');
INSERT INTO `eyex_homun` VALUES (6008, 'Vanilmirth');
INSERT INTO `eyex_homun` VALUES (6009, 'Lif_H');
INSERT INTO `eyex_homun` VALUES (6010, 'Amistr_H');
INSERT INTO `eyex_homun` VALUES (6011, 'Filir_H');
INSERT INTO `eyex_homun` VALUES (6012, 'Vanilmirth_H');
INSERT INTO `eyex_homun` VALUES (6013, 'Lif_H');
INSERT INTO `eyex_homun` VALUES (6014, 'Amistr_H');
INSERT INTO `eyex_homun` VALUES (6015, 'Filir_H');
INSERT INTO `eyex_homun` VALUES (6016, 'Vanilmirth_H');

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_jobs`
-- 

CREATE TABLE `eyex_jobs` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `eyex_jobs`
-- 

INSERT INTO `eyex_jobs` VALUES (0, 'Novice');
INSERT INTO `eyex_jobs` VALUES (1, 'Swordman');
INSERT INTO `eyex_jobs` VALUES (2, 'Mage');
INSERT INTO `eyex_jobs` VALUES (3, 'Archer');
INSERT INTO `eyex_jobs` VALUES (4, 'Acolyte');
INSERT INTO `eyex_jobs` VALUES (5, 'Merchant');
INSERT INTO `eyex_jobs` VALUES (6, 'Thief');
INSERT INTO `eyex_jobs` VALUES (7, 'Knight');
INSERT INTO `eyex_jobs` VALUES (8, 'Priest');
INSERT INTO `eyex_jobs` VALUES (9, 'Wizard');
INSERT INTO `eyex_jobs` VALUES (10, 'Blacksmith');
INSERT INTO `eyex_jobs` VALUES (11, 'Hunter');
INSERT INTO `eyex_jobs` VALUES (12, 'Assassin');
INSERT INTO `eyex_jobs` VALUES (13, 'Knight');
INSERT INTO `eyex_jobs` VALUES (14, 'Crusader');
INSERT INTO `eyex_jobs` VALUES (15, 'Monk');
INSERT INTO `eyex_jobs` VALUES (16, 'Sage');
INSERT INTO `eyex_jobs` VALUES (17, 'Rogue');
INSERT INTO `eyex_jobs` VALUES (18, 'Alchemist');
INSERT INTO `eyex_jobs` VALUES (19, 'Bard');
INSERT INTO `eyex_jobs` VALUES (20, 'Dancer');
INSERT INTO `eyex_jobs` VALUES (21, 'Crusader');
INSERT INTO `eyex_jobs` VALUES (22, 'Wedding');
INSERT INTO `eyex_jobs` VALUES (23, 'SuperNovice');
INSERT INTO `eyex_jobs` VALUES (24, 'Gunslinger');
INSERT INTO `eyex_jobs` VALUES (25, 'Ninja');
INSERT INTO `eyex_jobs` VALUES (26, 'Xmas');
INSERT INTO `eyex_jobs` VALUES (4001, 'High Novice');
INSERT INTO `eyex_jobs` VALUES (4002, 'High Swordman');
INSERT INTO `eyex_jobs` VALUES (4003, 'High Mage');
INSERT INTO `eyex_jobs` VALUES (4004, 'High Archer');
INSERT INTO `eyex_jobs` VALUES (4005, 'High Acolyte');
INSERT INTO `eyex_jobs` VALUES (4006, 'High Merchant');
INSERT INTO `eyex_jobs` VALUES (4007, 'High Thief');
INSERT INTO `eyex_jobs` VALUES (4008, 'Lord Knight');
INSERT INTO `eyex_jobs` VALUES (4009, 'High Priest');
INSERT INTO `eyex_jobs` VALUES (4010, 'High Wizard');
INSERT INTO `eyex_jobs` VALUES (4011, 'Whitesmith');
INSERT INTO `eyex_jobs` VALUES (4012, 'Sniper');
INSERT INTO `eyex_jobs` VALUES (4013, 'Assassin Cross');
INSERT INTO `eyex_jobs` VALUES (4014, 'Lord Knight');
INSERT INTO `eyex_jobs` VALUES (4015, 'Paladin');
INSERT INTO `eyex_jobs` VALUES (4016, 'Champion');
INSERT INTO `eyex_jobs` VALUES (4017, 'Professor');
INSERT INTO `eyex_jobs` VALUES (4018, 'Stalker');
INSERT INTO `eyex_jobs` VALUES (4019, 'Creator');
INSERT INTO `eyex_jobs` VALUES (4020, 'Clown');
INSERT INTO `eyex_jobs` VALUES (4021, 'Gypsy');
INSERT INTO `eyex_jobs` VALUES (4022, 'Paladin');
INSERT INTO `eyex_jobs` VALUES (4023, 'Baby');
INSERT INTO `eyex_jobs` VALUES (4024, 'Baby Swordman');
INSERT INTO `eyex_jobs` VALUES (4025, 'Baby Mage');
INSERT INTO `eyex_jobs` VALUES (4026, 'Baby Archer');
INSERT INTO `eyex_jobs` VALUES (4027, 'Baby Acolyte');
INSERT INTO `eyex_jobs` VALUES (4028, 'Baby Merchant');
INSERT INTO `eyex_jobs` VALUES (4029, 'Baby Thief');
INSERT INTO `eyex_jobs` VALUES (4030, 'Baby Knight');
INSERT INTO `eyex_jobs` VALUES (4031, 'Baby Priest');
INSERT INTO `eyex_jobs` VALUES (4032, 'Baby Wizard');
INSERT INTO `eyex_jobs` VALUES (4033, 'Baby Blacksmith');
INSERT INTO `eyex_jobs` VALUES (4034, 'Baby Hunter');
INSERT INTO `eyex_jobs` VALUES (4035, 'Baby Assassin');
INSERT INTO `eyex_jobs` VALUES (4036, 'Baby Knight');
INSERT INTO `eyex_jobs` VALUES (4037, 'Baby Crusader');
INSERT INTO `eyex_jobs` VALUES (4038, 'Baby Monk');
INSERT INTO `eyex_jobs` VALUES (4039, 'Baby Sage');
INSERT INTO `eyex_jobs` VALUES (4040, 'Baby Rogue');
INSERT INTO `eyex_jobs` VALUES (4041, 'Baby Alchemist');
INSERT INTO `eyex_jobs` VALUES (4042, 'Baby Bard');
INSERT INTO `eyex_jobs` VALUES (4043, 'Baby Dancer');
INSERT INTO `eyex_jobs` VALUES (4044, 'Baby Crusader');
INSERT INTO `eyex_jobs` VALUES (4045, 'Super Baby');
INSERT INTO `eyex_jobs` VALUES (4046, 'Taekwon');
INSERT INTO `eyex_jobs` VALUES (4047, 'Star Gladiator');
INSERT INTO `eyex_jobs` VALUES (4048, 'Star Gladiator');
INSERT INTO `eyex_jobs` VALUES (4049, 'Soul Linker');

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_mods`
-- 

CREATE TABLE `eyex_mods` (
  `mod_id` int(11) NOT NULL auto_increment,
  `mod_name` varchar(255) NOT NULL,
  `mod_status` int(1) NOT NULL,
  `mod_home` int(1) NOT NULL,
  `mod_folder` varchar(255) NOT NULL,
  PRIMARY KEY  (`mod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `eyex_mods`
-- 

INSERT INTO `eyex_mods` VALUES (6, 'Control Panel', 1, 0, 'CP');
INSERT INTO `eyex_mods` VALUES (16, 'Guild Rank', 1, 0, 'GuildRank');
INSERT INTO `eyex_mods` VALUES (3, 'Homunculus Rank', 1, 0, 'HomunculusRank');
INSERT INTO `eyex_mods` VALUES (4, 'Player Rank', 1, 0, 'PlayerRank');
INSERT INTO `eyex_mods` VALUES (5, 'News', 1, 1, 'news');
INSERT INTO `eyex_mods` VALUES (7, 'Online Players', 1, 0, 'Players_Online');
INSERT INTO `eyex_mods` VALUES (19, 'Server Details', 1, 0, 'Server_Info');
INSERT INTO `eyex_mods` VALUES (20, 'Test_Mod', 0, 0, 'Test_Mod');

-- --------------------------------------------------------

-- 
-- Table structure for table `eyex_news`
-- 

CREATE TABLE `eyex_news` (
  `nid` int(11) NOT NULL auto_increment,
  `ntitle` varchar(255) NOT NULL,
  `ntext` text NOT NULL,
  `ndate` date NOT NULL,
  `nautor` varchar(255) NOT NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `eyex_news`
-- 

INSERT INTO `eyex_news` VALUES (12, 'Test Story 2', 'Test Story Text 2', '2007-08-15', 'Kiryu');
INSERT INTO `eyex_news` VALUES (13, 'Test Story 3', 'Test Story Text', '2007-08-15', 'Kiryu');
INSERT INTO `eyex_news` VALUES (14, 'Test Story 4', 'Test Story', '2007-08-15', 'Kiryu');
INSERT INTO `eyex_news` VALUES (15, 'Test Story 5', 'Test', '2007-08-15', 'Kiryu');
INSERT INTO `eyex_news` VALUES (16, 'Bienvenidos a EyeX ROCP', '<img src="images/Class/Sniper.gif" border="0" align="right">Panel de Control EyeX ROCP V1.0.<br>\r\nFunciones Principales:<br>\r\n<li>Guild Rank</li>\r\n<li>Player Rank</li>\r\n<li>Homunculus Rank</li>\r\n<li>Registro de Usuarios RO</li>\r\n<li>Sistema de Noticias</li>\r\n<li>Cambio de Nick</li>\r\n<li>Cambio de Password</li>\r\n<li>Estado del Servidor</li>\r\n<li>Usuarios Online en RO</li>\r\n<li>Sistema de Afiliados</li>\r\n<li>Sistema de Themes/Skins</li>\r\n<li>Sistema de Addons-Blocks / Añade / Elimina Facilmente</li>\r\n<hr>Sistema Basado en PHP / MYSQL / HTML / CSS<br>\r\n<b>Creado por</b>: <a href="http://www.flow-impact.net" target="_blank">Kiryu</a><br>\r\n<b>Support Board</b>: <a href="http://www.sathena.net" target="_blank">SAthena</a>', '2007-08-15', 'Kiryu');
