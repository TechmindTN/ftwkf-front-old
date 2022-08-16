<html>
<!-- Date de création: 26/05/02 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<meta name="Description" content="">
<meta name="Keywords" content="">
<meta name="Author" content="Usager non enregistré">
<meta name="Generator" content="WebExpert 2000">
<style type="text/css">
<!--
body {
	margin-left: 0%;
	margin-top: 0%;
	margin-right: 0%;
	margin-bottom: 0%;
	background-image: url(image/mascotte.JPG);
}
-->
</style></head>
<body>


<?php 
session_start(); 

$login = $_POST ['id'];
$passe = $_POST ['password'];
$ip = $_SERVER["REMOTE_ADDR"];

include('connect.php');

$query="select pass_word, login, nom from utilisateurc where pass_word = '$passe' AND login ='$login'" ;
$result=mysql_query($query,$connexion);
$row=mysql_fetch_row($result);
 
if($row[0]!=null)
		{
$_SESSION['nom'] = $row[2];
$_SESSION['passe'] = $passe;
$_SESSION['login'] = $row[1];
$dat1 = date("Y/m/d H:i:s") ;

$query1 ="INSERT INTO `archivef` ( `nom`, `date`, `login`, `ip`)VALUES ('$row[2]','$dat1','$row[1]','$ip')";
$result1=mysql_query($query1,$connexion);

		?> 
 
<script type="text/javascript">
window.location.href="accueil2.html";
</script>
<?php 
}
else {require('ident.htm');}
?>
</body>