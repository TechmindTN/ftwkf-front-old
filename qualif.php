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


$query ="insert into qualif select * FROM `delegation` where `code` = '$code'";
$result = mysql_query($query,$connexion)or die( mysql_error() );
$query ="UPDATE qualif set qualif = 1 where `code` = '$code'";
$result = mysql_query($query,$connexion)or die( mysql_error() );

$query ="DELETE FROM `delegation` where `code` = '$code'";
$result = mysql_query($query,$connexion)or die( mysql_error() );
?>
<script type="text/javascript">
window.location.href="del.php";
</script>

</body>
</html>