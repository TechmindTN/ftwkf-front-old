<?php
//define("SERVEUR","kungfuwuyvdb.mysql.db");
define("USER",'kungfuwuyvdb');
define("PASS",'Riadh2018');
define("DB","kungfuwuyvdb");
define("SERVEUR","127.0.0.1");
//define("USER",'root');
//define("PASS",'');
//define("DB","basekungfu");


$connexion=mysql_connect(SERVEUR, USER, PASS) or die("erreur de connexion au serveur mysql,verifiez vos paramètres club et password");
mysql_select_db(DB,$connexion) or die("erreur de la connexion a la BD");
mysql_query("SET NAMES 'UTF8' ")
?>
