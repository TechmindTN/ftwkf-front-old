
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
<style>
.ml-1 {
  margin-left: 11% !important;
}</style>
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
}?>
  
   
    <!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
<div id='side'></div>





            <!-- Main Content -->
            <div id="content" class="ml-1">

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
                                           </tbody>
						
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
    <script src="template.js"></script>

</body>

</html>
                                      
    