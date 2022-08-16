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

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clubs</title>

    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

</style>
</HEAD>

<BODY>
<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">SAISON</h1>
                        
								<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
<a href="saison.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a>
<?php
//}else{ 
?>
<?php
} 
?>     
                        </div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered text-center" id="dataTable">
<thead>
                                        <tr>
                                            <th>Saison</th>
                                            <th>Date Début</th>                                            
                                            <th>Date Fin</th>											
											<th>Code Actif</th>
											<th>Actif</th>
											<th>Actions</th>
                                        
                                           
                                            
                                        </tr>
                                        </thead>

<?php
	   	include('connect.php');
$query ="SELECT * FROM saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {?>
	<tr>
	  <td><?php echo $row['saison'];?></td>
	  <td><div align="center"><?php echo $row['datedebut'];?></div></td>
	  <td><div align="center"><?php echo $row['datefin'];?></div></td>
	  <td><div align="center"><?php echo $row['actif'];?></div></td>
      <td><div align="center"><a href ='saiactif.php?code<?php echo "=$row[code]";?>'><b>Actif</b></a></td>
      <td><div align="center"><a href ='updsaison.php?code<?php echo "=$row[code]";?>'><b>Modifier</b></a>
      <div align="center"><a href ='delsaison.php?code<?php echo "=$row[code]";?>'><b>Supprimer</b></a></td>
   </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
</div>
</div>
<p>&nbsp;</p>



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
</body>

</html>
