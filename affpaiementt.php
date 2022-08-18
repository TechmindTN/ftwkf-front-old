<?php
session_start();
include('connect.php');
//$ip = $_SERVER["REMOTE_ADDR"];
//$query ="SELECT nom,date FROM archive where ip = '$ip' order by date desc";
//$result = mysql_query($query,$connexion);
//$row = mysql_fetch_assoc($result);
$club = $_SESSION['club'];
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
	<!-- Custom fonts for this template -->
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
</style><BODY>

<!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
<div id='side'></div>

<div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>

<?php
	   	 


?>

<div align="center" class="style2">Paiement des Licences</div>
<?php 
?>
<p align="center"><a href="paiement.php">Ajout</a></p>
<?php 

if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){
$query ="SELECT * FROM paiement where club = '$club' and saison = '$saison' and etat = 0";
}else{
$query ="SELECT * FROM paiement where saison = '$saison' and etat = 0";}
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>

<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Saison</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
	    <td ><div align="center"><strong>Montant</strong></div></td>
	    <td ><div align="center"><strong>Date</strong></div></td>
        <td ><div align="center"><strong>Decharge</strong></div></td>
	    <td ><div align="center"><strong></strong></div></td>
	</tr>
<?php






do {

?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['montant'];?></div></td>
	  <td><div align="center"><?php echo $row['date'];?></div></td>
      <td><img src="./decharge<?php echo $row['id']. '.jpg';?>?<?php echo time(); ?>" width="33" height="50"></td>
      <td><a href ='delpai.php?code<?php echo "=$row[id]";?>'><img src="sup.png" width="16" height="16"></a>
      <td><a href ='valpai.php?code<?php echo "=$row[id]";?>'>Valider</a>
        
        </td>

  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
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
</body>

</html>