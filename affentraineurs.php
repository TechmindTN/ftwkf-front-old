<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];include('connect.php');
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
<TITLE>Entraineurs</TITLE>
<style>
  .ml-1{
    margin-left:15% !important;
  }
  </style>
</HEAD>
<BODY>


<!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
   <div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>

<!-- <div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 "> -->

<div id="content-wrapper" class="d-flex flex-column ">
 <div id="content " class="ml-1">

<div class="container-fluid  ">
<!-- DataTales Example -->
                   <div class="card shadow mb-4">
                   <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                   <div align="center" class="h3 mb-2 text-gray-800">Entraineurs</div>

<?php 
	   	include('connect.php');
$query01 ="SELECT saison FROM entraineurs group by saison order by saison";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_assoc($result01);


 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}
$query001 ="SELECT club FROM entraineurs where saison like '%$saison1%' group by club order by club";
$result001 = mysql_query($query001,$connexion);
$row001 = mysql_fetch_assoc($result001);
?>

<form name="stat" method="post" action="">

              Club <select class="custom-select col-sm-4"  name="club" size="1" id="club" tabindex="9">
     <option><?php echo $club1;?> </option>
     <?php
					   do { 
                                     $res=$row001['club'];
                                      echo "<option >$res</option>";
                       } while ($row001 = mysql_fetch_assoc($result001));
?>
   </select>
<input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" value = "Rechercher">
                 

          </form>
      
 <?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <div align="center"></div>
        <div align="center"></div>
      <?PHP  } ?>       

 </div>
 <div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered"  width="100%" id="dataTable">
 <thead><tr>
	    <td ><div align="center"><strong>Saison </strong> </div> </td>
		<td> <div align = "center"> <strong> N° Lic </strong> </div> </td>
		<td> <div align = "center"> <strong> CIN </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td> <div align = "center"> <strong> Prénom </strong> </div> </td>
		<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
	    <td ><div align="center"><strong>Date Naissance</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
		<td> <div align = "center"> <strong> Ligue </strong> </div> </td>
		<td ><div align="center"><strong>Grade</strong></div></td>
		<td ><div align="center"><strong>Degre</strong></div></td>
		<td ><div align="center"><strong>Function</strong></div></td>
		<td> <div align = "center"> <strong> Discipline</strong> </div> </td>
		<td ><div align="center"><strong>Photo</strong></div></td>
		<td ><div align="center"><strong>Diplome</strong></div></td>
		<td align="center"><strong>Actions</strong></td>
		
	</tr>
 </thead>
 <tbody>
<?php


$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];

$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

if ($saison1 == "") {$saison1 = $saison;}



if (($club == "ADMIN")or($club == "admin")or($club == "Admin")){
$query ="SELECT * FROM entraineurs where saison = '$saison1' and club like '%$club1%' ";
}else{
$query ="SELECT * FROM entraineurs where club = '$club' and saison = '$saison1'";
}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {
$lic = $row['n_lic'];
$type = $row['type'];
$etat = $row['etat'];
$query00 ="SELECT * FROM entraineurs where saison = '$saison' and n_lic = '$lic' and type = '$type'";
$result00 = mysql_query($query00,$connexion);
$totalRows = mysql_num_rows($result00);
$obs = $row['obs'];
if ($obs == 0){
if ($type == "ممرن"){ $uploaddir ='entrt/' ; }
if ($type == "مسير"){ $uploaddir ='dirt/' ; }
if ($type == "حكم"){ $uploaddir ='arbt/' ; }
if ($type == "منشط"){ $uploaddir ='animt/' ; }
if ($type == "مرافق"){ $uploaddir ='acct/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='entrft/' ; }
}
else{
if ($type == "ممرن"){ $uploaddir ='entr/' ; }
if ($type == "مسير"){ $uploaddir ='dir/' ; }
if ($type == "حكم"){ $uploaddir ='arb/' ; }
if ($type == "منشط"){ $uploaddir ='anim/' ; }
if ($type == "مرافق"){ $uploaddir ='acc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='entrf/' ; }
}

if ($etat == "1") {
?>
<tr>
<?php }?>

    <td><div align="center"><?php echo $row['saison'];?></div></td>
    <td><div align="center"><?php echo $lic;?></div></td>
    <td><div align="center"><?php echo $row['cin'];?></div></td>
    <td><div align="center"><?php echo $row['nom'];?></div></td>
    <td><div align="center"><?php echo $row['prenom'];?></div></td>
    <td><div align="center"><?php echo $row['sexe'];?></div></td>
    <td><div align="center"><?php echo $row['naiss'];?></div></td>
    <td><div align="center"><?php echo $row['club'];?></div></td>
    <td><div align="center"><?php echo $row['ligue'];?></div></td>
    <td><div align="center"><?php echo $row['grade'];?></div></td>
    <td><div align="center"><?php echo $row['degre'];?></div></td>
    <td><div align="center"><?php echo $row['type'];?></div></td>
    <td><div align="center"><?php echo $row['sport'];?></div></td>
    <td><div align="center"><img src="./photo<?php echo $uploaddir.$row['photo'];?>?<?php echo time(); ?>" width="33" height="50"></div></td>
    <td><div align="center"><img src="./diplome<?php echo $uploaddir.$row['photo'];?>?<?php echo time(); ?>" width="33" height="50"></div></td>
      
    <td><?PHP 
  //    if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
      <div align="center"><a href ='updentraineurs.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><b>Modifier</b></a>
      </div>
      <?PHP // } ?>       
        
     
   <?PHP   if (($club == "ADMIN")) { ?>
     
        <div align="center"><a href ='entraineurvalid.php?sais<?php echo "=$row[saison]";?>&type<?php echo "=$row[type]";?>&code<?php echo "=$row[n_lic]";?>'><b>Valider</b></a>
        </div>
    <?PHP  } 
?>	  
	  
        
     <?PHP 
      //if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <a  class="center" href ='delentraineurs.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><img src="sup.png" width="16" height="16"></a>
        <a   onclick="return confirm('Vous etes sure de supprimer ce Entraineur??')" href ='delentraineurs.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP //  } ?>       
        
      </td>
  
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</tbody>
</table>


<p align="center"><a href="entraineur.php">Ajout</a></p>
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