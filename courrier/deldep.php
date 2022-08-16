<?php
session_start();
include('connect.php');
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
	 

$code=$_GET['code'];


$query ="DELETE FROM `utilisateurc` where `id` = '$code'";
$result = mysql_query($query,$connexion)or die( mysql_error() );
?>
<script type="text/javascript">
window.location.href="affdep.php";
</script>

</body>
</html>