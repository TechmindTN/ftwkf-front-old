<?php
session_start();
////$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];

////$_SESSION['club'] = $club2;

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
<TITLE>Liste age</TITLE>
</HEAD>
<BODY>
<div id="wrapper">
<div class="navbar-nav  sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>


 <div id="content" class="col-10" >
<div class="container-fluid">
<div class="card shadow mb-4">

<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<div  class="h3 mb-2 text-gray-800"> Age</div>
<a href="age.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajout</a></div>


 <?PHP 
	   	include('connect.php');
// $sport1 = "";
//if (isset($_POST['sport'])) {
//  $sport1 = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
//}

//$query01 ="SELECT sport FROM age group by sport order by sport";
//$result01 = mysql_query($query01,$connexion);
//$row01 = mysql_fetch_row($result01);


	

	  ?>
     
 

 
 
      <?PHP // } 

$query ="SELECT * FROM age order by sexe, min";
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>
</div>
<div class="card-body">

<div class="table-responsive">
<table class="table table-bordered" width="100%" id="dataTable" >
	<thead><tr>
	  	<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
		<td> <div align = "center"> <strong> Age </strong> </div> </td>
		<td> <div align = "center"> <strong> Min </strong> </div> </td>
		<td> <div align = "center"> <strong> Max </strong> </div> </td>
		<td> <div align = "center"> <strong> Prix </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td ><div align = "center">  <strong>Actions</strong></div></td>
	</tr>
	</thead>
	<tbody>
<?php
do {?>
	<tr>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['cat'];?></div></td>
	  <td><div align="center"><?php echo $row['min'];?></div></td>
	  <td><div align="center"><?php echo $row['sup'];?></div></td>
	  <td><div align="center"><?php echo $row['prix'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
      <td><div align="center"><a href ='updage.php?code<?php echo "=$row[code]";?>'><b>Modifier</b></a></div>
      <div align="center"><a  onclick="return confirm('Vous etes sure de supprimer ce Age??')" href ='delage.php?code<?php echo "=$row[code]";?>'><b>Supprimer</b></a> </div></td>
	</tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
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