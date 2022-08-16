<?php
session_start();
include('connect.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
<BODY>
<style type="text/css">
<!--
body {
	background-image:  url(../sigle1.gif);
}
-->
</style></head>

<body>
<?php
$id = 0;
	 
$id = $_POST['cod'];
$nom = $_POST['nom'];
$pw = $_POST['pw'];
$login = $_POST['login'];

if ($id == 0) {
$query = "INSERT INTO `utilisateurc` (`nom`,`login`, `pass_word`) VALUES ('$nom', '$login','$pw')";}
else 
{
$query = "update `utilisateurc` set `nom`='$nom',`pass_word`='$pw', `login`='$login' WHERE id = '$id'";}


$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affdep.php";
</script>


</body>
</html>