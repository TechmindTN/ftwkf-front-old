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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-image:  url(../sigle1.gif);
}
-->
</style></head>

<body>
<?php
	include('connect.php');

$code=$_GET['code'];
$saison=$_GET['saison'];
$fonct=$_GET['fonct'];



$query ="DELETE FROM `entraineurs` where `n_lic` = '$code' and saison = '$saison'  and type = '$fonct'";

$result = mysql_query($query,$connexion)or die( mysql_error() );
?>
<script type="text/javascript">
window.location.href="affentraineur.php";
</script>

</body>
</html>