
<?php
session_start();
//$club = $_SESSION['club'];
$club1 = $_SESSION['club'];
//$club = $_GET['club'];

if ($club1 == null) {
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

</head>

<body id="page-top">
<?php
include('connect.php');
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

//  $club1 = "";
// if (isset($_POST['club'])) {
    
//   $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
//   console_log($club1);
// }

if (($club1=="admin")or($club1=="ADMIN")or($club1=="Admin")) {
$query1 ="SELECT distinct(club) from clubb order by club";	 
$result1 = mysql_query($query1,$connexion);
console_log($result1);
$row1 = mysql_fetch_assoc($result1);
console_log($row1);
}
?>
    <!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion "  id="accordionSidebar" style="position:fixed; z-index:1" >

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
<div class="sidebar-brand-icon rotate-n-15">
<i class="fas fa-user"></i>
</div>
<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
<a class="nav-link" href="index.html">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-user"></i>
<span>athletes</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="affclub.php">Déja affiliés</a>  
 <a class="collapse-item" href="buttons.html">Demandes</a>
<a class="collapse-item" href="cards.html">Refusées</a>
</div>
</div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->

<li class="nav-item">
<a class="nav-link collapsed" href="# " data-toggle="collapse" data-target="#collapseUtilities"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-wrench"></i>
<span>Clubs</span>
</a>
<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="utilities-color.html">Déja affiliés</a>
<a class="collapse-item" href="utilities-border.html">Demandes</a>
<a class="collapse-item" href="utilities-animation.html">Refusées</a>
</div>
</div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess"
aria-expanded="true" aria-controls="collapseUtilitiess">
<i class="fas fa-fw fa-wrench"></i>
<span>Arbitres</span>
</a>
<div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilitiess" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="utilities-color.html">Déja affiliés</a>
<a class="collapse-item" href="utilities-border.html">Demandes</a>
<a class="collapse-item" href="utilities-animation.html">Refusées</a>
</div>
</div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Arbitres
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
aria-expanded="true" aria-controls="collapsePages">
<i class="fas fa-fw fa-folder"></i>
<span>Entraineurs</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Login Screens:</h6>
<a class="collapse-item" href="login.html">Login</a>
<a class="collapse-item" href="register.html">Register</a>
<a class="collapse-item" href="forgot-password.html">Forgot Password</a>
<div class="collapse-divider"></div>
<h6 class="collapse-header">Other Pages:</h6>
<a class="collapse-item" href="404.html">404 Page</a>
<a class="collapse-item" href="blank.html">Blank Page</a>
</div>
</div>
</li>
<!-- Nav Item - Tables -->

<li class="nav-item">
<a class="nav-link" href="tables.html">
<i class="fas fa-fw fa-table"></i>
<span>Licences</span></a>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item">
<a class="nav-link" href="charts.html">
<i class="fas fa-fw fa-chart-area"></i>
<span>Statistiques</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<!-- <button class="rounded-circle border-0" id="sidebarToggle"></button> -->
</div>

<!-- Sidebar Message -->
<!-- <div class="sidebar-card d-none d-lg-flex">
<img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
<p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
<a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->

<!-- End of Content Wrapper -->

<!-- </div> -->
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div>

<div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <form name="stat" method="post" action="">




                <!-- Begin Page Content -->
                <div class="container-fluid">
                            
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Clubs</h1>
                        <a href="club.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a>
                                <select name="club" size="1" id="club" tabindex="9" class="custom-select col-sm-4">
                      <?php
                      echo"<option>Selectionner le club</option>";
					   do {         
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
                             ?>
                             </select> <input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" value = "Rechercher">    
                        </div>
  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                
                             <form name="stat" method="post" action="">
                             <thead>
                                        <tr>
                                            <th>Club</th>
                                            <th>Ligue</th>                                            
                                            <th>Login</th>
                                            <th>PW</th>                                            
                                            <th>Actif</th>
                                            <th><a href ='desactiver.php'>Desactiver Tous</a></th>                                            
                                            <th>Actions</th>
                                           
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $club1="";

                                           if ($club1 <> "") {$query ="SELECT * FROM club where club like '%$club1%'";}
                                           if ($club1 == "") {$query ="SELECT * FROM club order by actif Desc,club";}

                                           $result = mysql_query($query,$connexion);
                                           $row = mysql_fetch_assoc($result);

                                           do {?>
                                           	<tr>
                                           	  <td><?php echo $row['club'];?></div></td>
	                                             <td><?php echo $row['ligue'];?></td>
	                                             <td><?php echo $row['club'];?></td>
	                                             <td><?php echo $row['pw'];?></td>
	                                             <td><?php echo $row['actif'];?></td>
                                               
    
                                                 <td><?php if ($row['club'] <> "ADMIN") {?><a href ='delclub.php?code<?php echo "=$row[id]";?>'><b>Supprimer</b></a><?php }?></td>
                                                 <td><a href ='updclub.php?code<?php echo "=$row[id]";?>'><b>Modifier</b></a></td>
                                              </tr>
                                           <?php					}while	 ($row=mysql_fetch_assoc($result)); 


                                           ?>
                                    
                                     <tfoot>
                                        <tr>
                                        <th>Club</th>
                                            <th>Ligue</th>                                            
                                            <th>Login</th>
                                            <th>PW</th>                                            
                                            <th>Actif</th>
                                            <th><a href ='desactiver.php'>Desactiver Tous</a></th>                                            
                                            <th>Actions</th> 
                                         </tr>
                                    </tfoot>
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
            </footer>
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

</body>

</html>
                                      
    