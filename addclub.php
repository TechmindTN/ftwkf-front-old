<?php
session_start();
$club1 = $_SESSION['club'];
 if ($club1 <> 'ADMIN') {
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

$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$club = $_POST['club'];
$anclub = $_POST['anclub'];
$ligue = $_POST['ligue'];
$pw = $_POST['pw'];
$id = $_POST['cod'];
$actif = $_POST['actif'];

if ($id == 0) {
$query1 = "INSERT INTO `clubb` (`club`,`ligue`, `saison`) VALUES ('$club', '$ligue','$saison')";
$result1 = mysql_query($query1,$connexion);

$query = "INSERT INTO `club` (`club`,`ligue`, `pw`, `actif`) VALUES ('$club', '$ligue','$pw','1')";



}
else 
{
$query = "update `club` set `club`='$club',`ligue`='$ligue', `pw`='$pw',`actif`='$actif' WHERE id = '$id'";
if ($anclub <> $club)
{$query1 = "UPDATE `athletes` SET `club` ='$club' WHERE `club`='$anclub'";
$result1 = mysql_query($query1,$connexion);
}

}


$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affclub.php";
</script>


</body>
</html>