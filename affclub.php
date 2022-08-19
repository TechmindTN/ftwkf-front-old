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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Clubs</TITLE>
</HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Clubs par saison</TITLE>
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
  margin-left: 14% !important;
}</style>

</style>
<BODY id="page-top"> 
    <div></div>
<div id="wrapper">
<div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
<div id="content-wrapper" class="d-flex flex-column ">

<div id="content" class="ml-1">
<div class="container-fluid">
<div class="card shadow mb-4">


<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<table >
<h1 class="h3 mb-2 text-gray-800">Clubs </h1>
                        <a href="club.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a>
                                 
                        </div>

<?php
include('connect.php');


 $club1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);}

if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {
$query1 ="SELECT club from club order by club";	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);}


?>

 <table >

        <tr>
          <td><form name="stat" method="post" action="">

              <table>
                <tr>

                   <td> Club </td>

   <td ><select name="club" size="1" id="club" tabindex="9"  class="custom-select ">
        <option><?php echo $club1;?> </option>
        <option> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>
                   <td>
<input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value = "Rechercher">
                  </td>


                </tr>


              </table>

          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>
                    </div>

<div class="card-body">


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >
<thead>
                                        <tr>
                                            <th>Club</th>
                                            <th>Ligue</th>                                            
                                            <th>Login</th>
                                            <th>Pw</th>
                                            <th>Actif</th>
                                            
                                            <th>Actions</th>
                                        
                                           
                                            
                                        </tr>
                                        </thead>

<?php
if ($club1 <> "") {$query ="SELECT * FROM club where club like '%$club1%'";}
if ($club1 == "") {$query ="SELECT * FROM club order by actif Desc,club";}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

do {?>
	<tr>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['pw'];?></div></td>
	  <td><div align="center"><?php echo $row['actif'];?></div></td>
    
    
      <td><div align="center"><?php if ($row['club'] <> "ADMIN") {?><a href ='delclub.php?code<?php echo "=$row[id]";?>'><b>Supprimer</b></a><?php }?>
      <div align="center"><a href ='updclub.php?code<?php echo "=$row[id]";?>'><b>Modifier</b></a></td>
   </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table></div></div></div></div></div></div>

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
