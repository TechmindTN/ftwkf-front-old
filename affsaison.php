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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Saisons</title>

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
.ml-1 {
  margin-left: 15% !important;
}</style>
</head>

<body id="page-top ">

    <!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
   <div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="ml-1">

            <form name="stat" method="post" action="">




                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Saisons</h1>
                        
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
                    <!-- DataTales Example -->
                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                
                             <form name="stat" method="post" action="">
                             <thead>
                                        <tr>
                                            <th>Saison</th>
                                            <th>Date début</th>                                            
                                            <th>date fin</th>
                                            <th>code</th>                                            
                                            <th>Actif</th>
                                            <th>Actions</th>                                       
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
	   	include('connect.php');
$query ="SELECT * FROM saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {?>
	<tr>
	  <td><?php echo $row['saison'];?></td>
	  <td><?php echo $row['datedebut'];?></td>
	  <td><?php echo $row['datefin'];?></td>
	  <td><?php echo $row['actif'];?></td>
      <td><a href ='saiactif.php?code<?php echo "=$row[code]";?>'><b>Actif</b></a></td>
      <td><div align="center"><a href ='updsaison.php?code<?php echo "=$row[code]";?>'><b>Modifier</b></a></div>
      <div align="center"><a onclick="return confirm('Vous etes sure de supprimer cette saison??')" href ='delsaison.php?code<?php echo "=$row[code]";?>'><b>Supprimer</b></a></div></td>
   </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
                                    <tbody>
						
                                </table>
                            </div>
                                           </from>
                        </div>
                    </div>

                  </div>
                       <!-- /.container-fluid -->

                        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer></div>
            <!-- End of Footer -->

        <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    </div>

    <!-- Logout Modal-->
 

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
                                      
    