<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
 if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="index.html";
</script>

<?php	 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
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
	include('connect.php');
$id = $_GET['code'];


$query = "update `saison` set `actif`='0'";
$result = mysql_query($query,$connexion);
$query = "update `saison` set `actif`='1' WHERE code = '$id'";
$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affsaison.php";
</script>


</body>
</html>