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

if(stristr(htmlentities($_SERVER['PHP_SELF']), "spanish.php")){
	Header("Location: ../index.php");
	die();
}

define("_DB_ERROR","Error de Conexion SQL");
define("_DB_ECA00","Posibles Causas");
define("_DB_ECA01","Mal Configuracion del Archivo Settings/Basic_Config.php");
define("_DB_ECA02","El Servidor SQL Esta OffLine");
define("_DB_ECA03","Mantenimiento Del Sistema.");
define("_LOGINBLOK","LOGIN | CONECTATE");
define("_SERVERBLOCK","ESTADO DEL SERVIDOR");
define("_USERSONLINE","USUARIOS ONLINE");
define("_BMENU","MENU PRINCIPAL");
define("_ADMINFORM","Formulario Registro de Admin.");
define("_RESET","Borrar Datos");
define("_SUBMIT","Enviar");
define("_USERNAME","Nombre de Usuario");
define("_PASSWORD","Contraseña");
define("_REPASSWORD","Confirmar Contraseña");
define("_ADMINLOGIN","Administracion :: Sistema de Autentificacion");
define("_NEEDUSERNAME","El Nombre de Usuario que Has Ingresado No Existe o Es Incorrecto");
define("_NEEDPASSWORD","La Contraseña Ingresada es Incorrecta");
define("_ADMINCP","Admin Panel de Control");
define("_LOGOUT","Desconectar");
define("_BLOCKSADM","Blocks");
define("_BLOCKSADM2","Administracion de Blocks");
define("_BLOCKSFIX","Fix Posicion Blocks");
define("_TITLE","Titulo");
define("_FILE","Archivo");
define("_EDIT","Editar");
define("_ACTIVE","Activo");
define("_DEACTIVATE","Desactivar");
define("_INACTIVE","Inactivo");
define("_ACTIVATE","Activar");
define("_DELETE","Borrar");
define("_DOWN","Abajo");
define("_UP","Arriba");
define("_MAKEBLOCK","Crea un Nuevo Block HTML");
define("_BLOCKTITLE","Titulo del Block");
define("_HTMLCONTENT","Contenido HTML");
define("_ACTIVATEBLOCK","Activar Block");
define("_YES","Si");
define("_NO","No");
define("_NICKNAME","Nickname");
define("_CONNECT","Conectar");
define("_MAPSERV","Map Server");
define("_CHARSERV","Char Server");
define("_LOGINSERV","Login Server");
define("_USERSON","Usuarios en Linea");
define("_GUILDNAME","Nombre del Guild");
define("_GUILDMASTER","Lider del Guild");
define("_GUILDLVL","Nivel");
define("_GUILDPROM","Promedio");
define("_GUILDEXP","Exp");
define("_GUILDRANK","Top Guilds - Los Mejores Guilds");
define("_OF","de");
define("_GUILD","Guild");
define("_GOBACK","Volver Atras");
define("_GUILDCASTLES","Castillos");
define("_CASTLE","Castillo");
define("_CONFIG","Preferencias");
define("_CONFIGSYS","Sistema de Configuracion");
define("_SITENAME","Nombre del Sitio");
define("_SITESLOGAN","Slogan del Sitio");
define("_WMESSAGE","Mensaje de Bienvenida");
define("_SITELANG","Idioma del Sitio");
define("_SITESKIN","Skin del Sitio");
define("_FULLNEWSHOME","Noticias Completas en Portada");
define("_NEWSBLOCK","Noticias en el Block");
define("_SHOWBANNERS","Mostrar Banners Laterales");
define("_BANERPREF","Configuracion de Banners Laterales");
define("_SITEPREF","Configuracion Basica del Sitio");
define("_BANNERIMG","Imagen del Banner");
define("_BANNERURL","Url del Banner");
define("_BANNERMSG","Mensaje del Banner");
define("_BANERTARGET","Destino del Link");
define("_SHOWSTATUS","Activar Estado del Servidor");
define("_SERVPREF","Configuracion del Servidor");
define("_CHARPORT","Puerto Char");
define("_ACCPORT","Puerto Login");
define("_MAPPORT","Puerto Map");
define("_SERVERIP","IP del Servidor");
define("_SETCASTLES","Activar / Desactivar Castillos");
define("_COLORS","Colores");
define("_STATUS","Estado");
define("_CASTLES","Castillos");
define("_GUILDINFO","Informacion del Guild");
define("_GUILDALIES","Aliados del Guild");
define("_MEMBER","Miembro");
define("_CLASSJOB","Clase / JOB");
define("_BASE","Base");
define("_JOB","Job");
define("_POSITION","Posicion");
define("_LVL","lvl");
define("_SELPAGE","Selecciona Pagina");
define("_GUILDPREF","Opciones del GuildRank");
define("_GRLIMIT","# Guilds Por Pagina");
define("_NEWS","Noticias");
define("_MODS","Mods");
define("_AUTOR","Autor");
define("_DATE","Fecha");
define("_LATEST","Ultimas");
define("_NEWSADMIN","Administracion de Noticias");
define("_ADDSTORY","Agregar Noticia");
define("_ADDSTORYFORM","Formulario Envio de Noticia");
define("_STORYTEXT","Texto de la Noticia");
define("_STORYTITLE","Titulo de la Noticia");
define("_HTMLOK","HTML Permitido");
define("_DEL","del");
define("_JANUARY","Enero");
define("_FEBRUARY","Febrero");
define("_MARCH","Marzo");
define("_APRIL","Abril");
define("_MAY","Mayo");
define("_JUNE","Junio");
define("_JULY","Julio");
define("_AUGUST","Agosto");
define("_SEPTEMBER","Septiembre");
define("_OCTOBER","Octubre");
define("_NOVEMBER","Noviembre");
define("_DECEMBER","Diciembre");
define("_HOME","Portada");
define("_NONE","Nada");
define("_BLOCKIMG","Imagen del Block");
define("_MEMBERSAREA","Zona de Miembros");
define("_LOGIN","Conectar");
define("_REGISTER","Registrate");
define("_USERLOGIN","Sistema de Autentificacion");
define("_NEWACCOUNT","Nueva Cuenta");
define("_SEX","Sexo");
define("_EMAIL","E-Mail");
define("_MAN","Hombre");
define("_WOMAN","Mujer");
define("_REGUSER","Registrar Nuevo Usuario");
define("_LOGGEDAS","Identificado Como");
define("_CHANGEPASS","Cambiar Password");
define("_CHPASSYS","Sistema de Cambio de Password");
define("_ACTUALPASS","Password Actual");
define("_NEWPASS","Nuevo Password");
define("_CONFIRMPASS","Confirmar Password");
define("_VERIFEMAIL","Escribe tu Email");
define("_ERRORPASS","ERROR: El Password no se ha Cambiado");
define("_PLEASELOGOFF","Por Favor Desconectate del Juego Antes de hacer Cambios en el CP");
define("_PASSCHANGED","El Password se ha Cambiado Correctamente");
define("_MYINFO","Mi Informacion");
define("_WELCOME","Bienvenido");
define("_CHANGEMAIL","Cambiar Email");
define("_CHANGEMAILSYS","Sistema Cambio de Email");
define("_ERRORMAIL","El Email no se ha Cambiado, Prueba de Nuevo");
define("_MAILCHANGED","El Email se ha Cambiado Correctamente");
define("_ACTUALMAIL","Email Actual");
define("_NEWMAIL","Nuevo Email");
define("_CONFIRMAIL","Confirmar Email");
define("_VERIFPASS","Tu Password");
define("_ZENY","Zeny");
define("_SAVEDMAP","Guardado");
define("_YOURCHARINFO","Informacion de tu Personaje");
define("_MAXHP","Max HP");
define("_MAXSP","Max SP");
define("_SINGLE","Soltero");
define("_MARRIED","Con Pareja");
define("_PARTNER","Pareja");
define("_CLASS","Clase");
define("_NOPARTNER","No Tiene Pareja");
define("_DIVORCE","Divorciar");
define("_SUBMITEDBY","Envio");
define("_PLAYERRANK","Rank de Players");
define("_ORDERBY","Ordenar Por");
define("_ALL","Ver Todos");
define("_TOTALMEMBERS","Miembros en Total");
define("_TOTALCHARS","Personajes en Total");
define("_ACTIVES","Activos");
define("_PLAYERLIMIT","Personajes por Pagina");
define("_PLAYERPREF","Preferencias Player Rank");
define("_CHARINFO","Informacion del Personaje");
define("_OWNER","Dueño");
define("_HOMUNRANK","Rank de Homunculus");
define("_HOMUNLIMIT","Homunculus por Pagina");
define("_HOMUNPREF","Preferencias Homunculus Rank");
define("_MASTEROPTIONS","Opciones Guild Master");
define("_CHARLENGHTW","Revisa el Tamaño del Usuario [ Mas de 4 y menos de 24 ]");
define("_PASSLENGHTW","Revisa el Tamaño del Password [ Mas de 4 y menos de 24 ]");
define("_SELEMBLEM","Elige el Emblema (Click en Examinar)");
define("_EMBLEMOPTIONS","Opciones del Emblema");
define("_EMBLEMNOTE","Nota: Si ya Habias subido el Emblema de esta Guild, El Emblema Anterior Sera Reemplazado por Este Nuevo.");
define("_GUILDNOTICE","Mensaje del Guild");
define("_CHANGEGNOTICE","Cambia el Mensaje del Guild");
define("_GNOTICE","Mensaje Guild");
define("_BACKTOGUILD","Volver al Guild");
define("_ERRORUPLOADING","Error, Hubo un Problema subiendo tu Archivo.");
define("_THEFILE","El Archivo");
define("_UPLOADEDOK","Se ha Subido Correctamente");
define("_ONLYBMP","Solo Puedes Subir Archivos BMP");
define("_FILELARGE","Tu Archivo Pesa mas de 5kb");
define("_NOUPLOADED","Error: Tu Archivo no se ha Subido");
define("_SHOWONLY","Mostrar Solamente");
define("_SEARCHBOX","Buscador de Chars");
define("_RESETPOSIT","Reset Posicion");
define("_OPTIONS","Opciones");
define("_RESETPOS","Reset");
define("_RESETLOOK","Reset Apariencia");
define("_EQUIP","Equipo");
define("_UNEQUIPED","No Equipado");
define("_EQUIPED","Equipado");
define("_RESETEKIP","Sistema Reset Items Equipados / Apariencia");
define("_TRANSFERZENY","Transferir Zenys");
define("_TRANSZENY","Sistema de Transferencia de Zenys");
define("_ZENYNUM","Zenys Disponibles");
define("_SELECT","Elegir");
define("_FROM"," De ");
define("_TO","Para");
define("_ZENYONCHAR","Zeny en este Char");
define("_CHARNAME","Nombre del Personaje");
define("_CHARTO","Transferir a");
define("_CHANGESLOT","Cambiar Slot");
define("_CHANGESLOTSYS","Sistema de Cambio de Slots");
define("_SLOT","Slot");
define("_SEL","Selecciona");
define("_CHANGE","Cambiar");
define("_NAME","Nombre");
define("_SEARCHBY","Buscar por");
define("_BASELVL","Nivel Base");
define("_JOBLVL","Nivel Job");
define("_EXP","Experiencia");
define("_INTIMACY","Intimidad");
define("_SEARCHBOX2","Buscador de Homunculus");
define("_SEARCHBOX3","Buscador de Guilds");
define("_MASTER","Master");
define("_INACTIVEMODS","Mods Inactivos");
define("_ADMIN","Admin");
define("_MODSADMIN","Administracion de Mods");
define("_COLOR","Color");
define("_MEANS","Significa");
define("_INHOME","En Portada");
define("_ONLINEPLAYERS","Jugadores En Linea");
define("_ONLINEMAP","Ultimo Mapa");
define("_WEHAVE","Tenemos");
define("_PLAYERS","Jugadores");
define("_PLAYING","Activos Jugando");
define("_ONLINE","OnLine");
define("_OFFLINE","OffLine");
define("_MODNAME","Nombre del Mod");
define("_MODFOLDER","Nombre de la Carpeta del Mod");
define("_RATES","Rates del Servidor");
define("_USETHISFORMAT","(Utiliza este Formato: XX/XX/XX)");
define("_ATHOME","En Portada?");
define("_SERVERINFO","Escribe Aqui Informacion Extra del Server");
define("_SERVERINFOR","Informacion del Servidor");
define("_SITERATES","Rates del Servidor");
define("_MOREINFO","Más Informacion");
define("_SERVERNAME","Nombre del Servidor");
define("_ONLINECASTLES","Castillos Activados");
define("_JOBSINSERVER","Listado de Jobs / Cantidad");
/**************************************************/
/*     EyeX Project - Active on RO CP 2007(c)     */
/**************************************************/
?>