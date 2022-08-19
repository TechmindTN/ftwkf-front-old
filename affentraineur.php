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
<TITLE>Liste des entraineurs</TITLE>
<style>
.ml-1 {
  margin-left: 10% !important;
}</style>
</HEAD>
<BODY>

<!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
<div id='side'></div>




<div id="content" class="ml-1">

 <div  class="container-fluid ">

<!-- <div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-1 ">
 </div>

<div id="content" >

 <div align="center" style="margin-left:11%" class="container-fluid ">

 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <div align="center" class="h3 mb-2 text-gray-800">Entraineurs</div>

<p ><a href="entraineur.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Ajout</a></p>

<?php 
	   	include('connect.php');
$query01 ="SELECT saison FROM entraineur group by saison order by saison";
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
$query001 ="SELECT club FROM entraineur where saison like '%$saison1%' group by club order by club";
$result001 = mysql_query($query001,$connexion);
$row001 = mysql_fetch_assoc($result001);
?>


      
         <form name="stat" method="post" action="">


                   Saison <select name="sais" size="1" class="custom-select col-sm-4" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $saison1;?> </option>
                      <?php
					   do { 
                                     $res=$row01['saison'];
                                      echo "<option >$res</option>";
                       } while ($row01 = mysql_fetch_assoc($result01));
?>
      </select>
                    Club 

 <select name="club" class="custom-select col-sm-4" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res=$row001['club'];
                                      echo "<option >$res</option>";
                       } while ($row001 = mysql_fetch_assoc($result001));
?>
      </select>
<input name="ok" type="submit"  class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  value = "Rechercher">
                

          </form>
</div>
 <?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
     <!--   <div align="center"><a href ='listee.php'><b>Exporter</b></a>     </div>    
        <div align="center"><a href ='stat.php'><b>Statistique</b></a></div>-->
      <?PHP  } ?>       

      <div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered" id="dataTable" cellspacing="0" width="20%"  >
  
<thead>	
<tr>
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
		<td >Actions</td>
	
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
$query ="SELECT * FROM entraineur where saison = '$saison1' and club like '%$club1%' ";
}else{
$query ="SELECT * FROM entraineur where club = '$club' and saison = '$saison1'";
}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {
$lic = $row['n_lic'];
$type = $row['type'];
$etat = $row['etat'];
$query00 ="SELECT * FROM entraineur where saison = '$saison' and n_lic = '$lic' and type = '$type'";
$result00 = mysql_query($query00,$connexion);
$totalRows = mysql_num_rows($result00);

if ($type == "ممرن"){ $uploaddir ='entr/' ; }
if ($type == "مسير"){ $uploaddir ='dir/' ; }
if ($type == "حكم"){ $uploaddir ='arb/' ; }
if ($type == "منشط"){ $uploaddir ='anim/' ; }
if ($type == "مرافق"){ $uploaddir ='acc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='entrf/' ; }


if ($etat == "1") {
?>
<?php }else {?>
	<tr style="overflow: auto;">
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
      
            <td> 
 <?php         if ($totalRows==0) { ?>
 
        <div align="center"><a href ='renouventraineur.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&type<?php echo "=$row[type]";?>'><b>Renouvellementl</b></a>
        </div>
        <?PHP  } ?>       
     

      
   <?PHP 
  //    if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <div align="center"><a href ='updentraineur.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><b>Modifier</b></a>
        </div>
        <?PHP // } ?>       
        
       
   <?PHP   if (($club == "ADMIN")) { ?>
     
        <div align="center"><a href ='entverif.php?sais<?php echo "=$row[saison]";?>&type<?php echo "=$row[type]";?>&code<?php echo "=$row[n_lic]";?>'><b>Valider</b></a>
        </div>
      <?PHP  } 
?>	  
	  
        
        <?PHP 
      //if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
       <div align="center"> <a   href ='delentraineur.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><b>Supprimer</b></a></div>
      <?PHP //  } ?>       
        
        </td>
  
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