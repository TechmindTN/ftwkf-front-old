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
<TITLE>Paiement à valider</TITLE>
</HEAD>
<style>
</style><BODY id="page-top">

<!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
   <div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
           <div id="content-wrapper" class="d-flex flex-column ">

<div id="content" class="ml-1">
<div class="container-fluid">
<div class="card shadow mb-4">
<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-2 text-gray-800">Paiement des Licences </h1>
                        <a href="paiement.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a>
                                 
                        </div>
<?php
	   	 


?>

<?php 
?>
<?php 

if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){
$query ="SELECT * FROM paiement where club = '$club' and saison = '$saison' and etat = 0";
}else{
$query ="SELECT * FROM paiement where saison = '$saison' and etat = 0";}
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >
	<thead><tr>
	    <td ><strong>Saison</strong></td>
	    <td >Club</strong></td>
	    <td >Montant</strong></td>
	    <td ><strong>Date</strong></td>
        <td ><strong>Decharge</strong></td>
	    <td ><strong>Actions</strong></td>
	</tr></thead>
<?php
do {

?>
<tbody>
	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['montant'];?></div></td>
	  <td><div align="center"><?php echo $row['date'];?></div></td>
      <td><img src="./decharge<?php echo $row['id']. '.jpg';?>?<?php echo time(); ?>" width="33" height="50"  ></td>
      <td><a href ='delpai.php?code<?php echo "=$row[id]";?>' onclick="return confirm('Vous etes sure de supprimer cet paiement??')"><img src="sup.png" width="16" height="16"></a>
      <a href ='valpai.php?code<?php echo "=$row[id]";?>'>Valider</a>
        
        </td>

  </tr></tbody>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table></div></div>
</div> </div>
</div>
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