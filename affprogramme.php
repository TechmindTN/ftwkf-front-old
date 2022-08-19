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
<TITLE>Competitions</TITLE>
</HEAD>


<BODY id="page-top"> 
<div id="wrapper">

<!-- Page Wrapper -->
<div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>

   <!-- Sidebar -->
   <div id="content-wrapper" class="d-flex flex-column ">


<div id="content"  style="margin-left:1%">
<div class="container-fluid">
<div class="card shadow mb-4">


<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">

<?php

function diff_date($day , $month , $year , $day2 , $month2 , $year2){
  $timestamp = mktime(0, 0, 0, $month, $day, $year);
  $timestamp2 = mktime(0, 0, 0, $month2, $day2, $year2);
  $diff_date = floor(($timestamp - $timestamp2) / (3600 * 24));
  return $diff_date; 
}

?>
<div align="center" class="h3 mb-2 text-gray-800">Programme  des Competitions</div>
<?php
if (($club == "ADMIN")){ 
?>
<p align="center"><a href="programme.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Ajout</a></p>
<?php
} 
?>
</div>

<div class="card-body">

<div class="table-responsive">
<table class="table table-bordered"  id="dataTable" >
	<thead>
	<tr>
		<th><strong>Competition</strong></th>
		<th><strong>Discipline</strong></th>
		<th><strong>Age</strong></th>
		<th><strong>Type</strong></th>
		<th><strong>Lieu</strong></th>
		<th><strong>Date</strong></th>
		<th><strong>Deadline</strong></th>
		<th><strong>Actions</strong></th>
	</tr>
</thead>
<tbody>
<?php
//$federation = $_SESSION['federation'];
//$pers = $_SESSION['pers'];
//$tache = $_SESSION['tache'];
//$sexe = $_SESSION['sexe'];
//$age = $_SESSION['age'];
//$saison = $_SESSION['saison'];

	   	include('connect.php');
//if ($club != "ADMIN"){
$query ="SELECT * FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$actif=$row['actif'];
//}

$query ="SELECT * FROM programme order by date_debut";
//else{
//$query ="SELECT * FROM athletes where federation = '$federation' and equipe = 'منتخب وطني' and age = '$age' and sexe = '$sexe' order BY federation";
//}

$result = mysql_query($query,$connexion);
//query('SET NAMES UTF8');
$row = mysql_fetch_assoc($result);
do {
$id = $row['id'];
$date_debut = $row['date_debut'];
$date_debut1=substr("$date_debut", 8, 2). "/".substr("$date_debut", 5, 2)."/".substr("$date_debut", 0, 4);
$delais = $row['delais'];
$delais1=substr("$delais", 8, 2). "/".substr("$delais", 5, 2)."/".substr("$delais", 0, 4);

$dat1 = date("d/m/Y") ;



$dat2 = $dat1;
$ddt2 = $delais1;
$jours1=diff_date(substr("$ddt2", 0, 2) , substr("$ddt2", 3, 2) , substr("$ddt2", 6, 4) , substr("$dat2", 0, 2) , substr("$dat2", 3, 2) , substr("$dat2", 6, 4));

if (($jours1 >= 0)or(($club == "ADMIN")or($club == "Admin")or($club == "admin")or($club == "Dtn")or($club == "DTN")or($club == "dtn"))){ 

?>

	<tr>
	  <td><div align="center"><?php echo $row['action'];?></div></td>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div align="center"><?php echo $row['type'];?></div></td>
	  <td><div align="center"><?php echo $row['lieu'];?></div></td>
	  <td><div align="center"><?php echo $date_debut1;?></div></td>
	  <td><div align="center"><?php echo $delais1;?></div></td>
      <td>
      <?php
if (($jours1 >= 0) and ($actif ==1)){ 
?>
      <div align="center"><a href ='del.php?code<?php echo "=$row[id]";?>&cat<?php echo "=$row[age]";?>&comp<?php echo "=$row[action]";?>&dat<?php echo "=$date_debut1";?>&lieu<?php echo "=$row[lieu]";?>&type<?php echo "=$row[type]";?>&max<?php echo "=$row[max]";?>&min<?php echo "=$row[min]";?>&qualif<?php echo "=$row[qualif]";?>&sais<?php echo "=$row[saison]";?>&sport<?php echo "=$row[sport]";?>' ><b>Enregistrement</b></a>
      </div>
<?php }      

if (($jours1 < 0)and(($club == "ADMIN")or($club == "DTN"))){ 
?>
      <div align="center"><a href ='del.php?code<?php echo "=$row[id]";?>&cat<?php echo "=$row[age]";?>&comp<?php echo "=$row[action]";?>&dat<?php echo "=$date_debut1";?>&lieu<?php echo "=$row[lieu]";?>&type<?php echo "=$row[type]";?>&max<?php echo "=$row[max]";?>&min<?php echo "=$row[min]";?>&qualif<?php echo "=$row[qualif]";?>&sais<?php echo "=$row[saison]";?>' ><b>Consultation</b></a></div>
<?php }?>      

      
      <?php if (($club == "ADMIN")){ ?>

     <div align="center"><a href ='updprogramme.php?code<?php echo "=$row[id]";?>' ><b>Modification</b></a></div></td>
<?php	} ?> 
      
  </tr>
<?php	}				}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</tbody>
</table>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>

</div></div></div>

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
