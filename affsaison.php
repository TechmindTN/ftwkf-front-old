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
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
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
	font-size: 36px;
}
-->
</style>
<BODY>
<div id="wrapper">
<div id='side'></div>

<div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>

<div align="center" class="style2">SAISON</div>
<p align="center"><a href="saison.php">Ajout</a></p>

<table border="1" width="100%" id="table1">
	<tr>
		<td><div align="center"><strong>Saison</strong></div></td>
		<td><div align="center"><strong>Date Début</strong></div></td>
		<td><div align="center"><strong>Date Fin</strong></div></td>
		<td><div align="center"><strong>Actif</strong></div></td>
		<td><div align="center"><strong></strong></div></td>
		<td><div align="center"><strong></strong></div></td>
		<td><div align="center"><strong></strong></div></td>
	</tr>
<?php
	   	include('connect.php');
$query ="SELECT * FROM saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {?>
	<tr>
	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['datedebut'];?></div></td>
	  <td><div align="center"><?php echo $row['datefin'];?></div></td>
	  <td><div align="center"><?php echo $row['actif'];?></div></td>
      <td><div align="center"><a href ='saiactif.php?code<?php echo "=$row[code]";?>'><b>Actif</b></a></td>
      <td><div align="center"><a href ='updsaison.php?code<?php echo "=$row[code]";?>'><b>Modifier</b></a></td>
      <td><div align="center"><a href ='delsaison.php?code<?php echo "=$row[code]";?>'><b>Supprimer</b></a></td>
   </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
<p align="center"><a href="saison.php">Ajout</a></p>
<?php
//}else{ 
?>
<?php
} 
?>
</div>
<!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="template.js"></script>
<script src="template.js">
</body>

</html>
