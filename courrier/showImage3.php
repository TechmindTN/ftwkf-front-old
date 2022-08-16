<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
<style type="text/css">
body {
	background-color: #FF9;
}
</style>
<style>
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<BODY>


</head>

<?php 
session_start(); 
	include('connect.php');
$login = $_SESSION['login'];
$ip = $_SERVER["REMOTE_ADDR"];

$query ="SELECT login,date FROM archive where ip = '$ip' order by date desc";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

//$login = $row['login'];


$query ="SELECT nom FROM utilisateur where login = '$login'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$nom=$row['nom'];  
?>

<TABLE cellPadding=0 width="100%" border=0 hspace="0" style="border-collapse: collapse" bordercolor="#111111" >
    <TBODY>
      <TR vAlign=center align=left>
<TD><div align="left" class="style2"><a href="affcredit.php" target="main">Credit</a></div></TD>
<TD><div align="left" class="style2"><a href="affdepenserecap.php" target="main">Depenses</a></div></TD>
<TD><div align="left" class="style2"><a href="affrecette.php" target="main">Recette</a></div></TD>


      </TR> 
</TABLE>


</html>
	