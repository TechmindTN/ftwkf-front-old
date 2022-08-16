<?php
//define("SERVEUR","127.0.0.1");
//define("USER",'root');
//define("PASS",'');
//define("DB","hachicha");
define("SERVEUR","kungfuwuyvcour.mysql.db");
define("USER",'kungfuwuyvcour');
define("PASS",'Riadh2018');
define("DB","kungfuwuyvcour");

$connexion=mysql_connect(SERVEUR, USER, PASS) or die("erreur de connexion au serveur mysql,verifiez vos paramètres login et password");
mysql_select_db(DB,$connexion) or die("erreur de la connexion a la BD");
mysql_query("SET NAMES 'UTF8' ")
?>
