<?php
session_start();
////$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];

//$_SESSION['club'] = $club2;

 if ($club == null) {$club = $club2;}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Liste des athletes</TITLE>
<style>
.ml-1 {
  margin-left:10.5% !important;
}</style>
</HEAD>

<BODY>
<div id="wrapper">
<div id='side'></div>


<!--<div align="center" class="style2"> Liste des Athletes</div>-->
  

<div id="content " class="ml-1">

 <div  class="container-fluid">
 <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="h3 mb-2 text-gray-800">Athletes</div>
                        <a href="athletes1.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Ajout</a>
   <?PHP 
	   	include('connect.php');
 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];
if ($saison1 == "") {$saison1 = $saison;}
$query01 ="SELECT saison FROM athletes group by saison order by saison";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);


    if (($club=="admin")or($club=="ADMIN")or($club=="Admin") or ($club == "CENTRE")or($club == "Centre")or($club == "centre") or ($club == "NORD")or($club == "Nord")or($club == "nord") or ($club == "SUD")or($club == "Sud")or($club == "sud")) {
	?>
   <!--<a href ='liste.php'><b>Exporter</b></a>-->
   
   <?php
	
	}
if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
if (($club=="dtn")or($club=="DTN")or($club=="Dtn")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
	 

$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

	  ?>
   
   
 <form name="stat" method="post" action="">

              

                 Saison 
   <select name="sais" size="1" id="sais" tabindex="9" class="custom-select col-sm-4" onChange="document.stat.submit();">
        <option><?php echo $saison1;?> </option>
                      <?php
					   do { 
                                     $res=$row01['saison'];
                                      echo "<option >$res</option>";
                       } while ($row01 = mysql_fetch_assoc($result01));
?>
      </select>Club <select class="custom-select col-sm-4" name="club" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select>
<input name="ok" type="submit"  class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" value = "Rechercher">
                 



          </form>
     

 </div>
 
      <?PHP // } 
	  $query ="SELECT * FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$actif=$row['actif'];


$query ="SELECT * FROM athletes where club = '$club' and saison = '$saison1'";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin")or($club == "dtn")or($club == "DTN")or($club == "Dtn")){
if ($club1 <> "") {$query ="SELECT * FROM athletes where club = '$club1' and saison = '$saison1'";}
if ($club1 == "") {$query ="SELECT * FROM athletes where saison = '$saison1'";}
}
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>
<?PHP
if (($club == "ADMIN")) {?>

<?PHP
}

if (($actif == "1") and ($club <> "ADMIN")) {?>
<p align="center"><a href="athletes.php?club<?php echo "=$club";?>">Ajout</a>-----------<a href="rechathlete.php?club<?php echo "=$club";?>">Renouvellement</a></p>
<?PHP
}?>
<div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered" id="dataTable"   width="100%" >
	<thead>
  <tr>
	    <td ><div align="center"><strong>Saison </strong> </div> </td>
		<td> <div align = "center"> <strong> N° Lic </strong> </div> </td>
		<td> <div align = "center"> <strong> N° CIN </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td> <div align = "center"> <strong> Prénom </strong> </div> </td>

		<td> <div align = "center"> <strong> Nationalité </strong> </div> </td>
		<td> <div align = "center"> <strong> Date Naissance </strong> </div> </td>
		<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
		<td> <div align = "center"> <strong> Age </strong> </div> </td>
		<td> <div align = "center"> <strong> Club </strong> </div> </td>
		<td> <div align = "center"> <strong> Ligue </strong> </div> </td>
		<td> <div align = "center"> <strong> Discipline</strong> </div> </td>
		<td> <div align = "center"> <strong> Photo </strong></div></td>
		<td ><?php echo $totalRows; ?></td>
		<td ></td>
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


do {

?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['cin'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>

	  <td><div align="center"><?php echo $row['nationalite'];?></div></td>

	  <td><div align="center"><?php echo $row['date_naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center">
      
 
       <?php 
	   $extension = strrchr($row['photo'], ".") ;
	   $nphot = strstr($row['photo'], ".",true) ;
$filename = './photo/'.$nphot.'.jpg';
if (file_exists($filename)) {
 ?>
      <img src="./photo/<?php echo $nphot.".jpg";?>?<?php echo time(); ?>" width="66" height="100"></div>
<?php } 
 else {
$filename = './photo/'.$nphot.'.JPG';

if (file_exists($filename)) {
 ?>
      <img src="./photo/<?php echo $nphot.".JPG";?>?<?php echo time(); ?>" width="66" height="100">
<?php } }
  
 ?>

 
 
 
    </td>
      <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <div align="center"><a href ='updathletes.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&club<?php echo "=$club";?>'><b>Modifier</b></a>
     </div>
        <?PHP  } ?>       
        
        </td>
        <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <a href ='delathlete.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP  } ?>       
        
        </td>
  
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</tbody>
</table>
</div>
</div>
<p>&nbsp;</p>
<?php
//if ((($pers == null)and ($federation != "المركز الوطني لإعداد النخبة") and ($federation != "المراكز الإقليمية")) or ($tache =="ممرن وطني")){ 
?>
<?PHP
if (($actif == "1")) {?>
<p align="center"><a href="athletes.php">Ajout</a>-----------<a href="rechathlete.php">Renouvellementl</a></p>
<?PHP
}?>
<?php
//}else{ 
?>
<?php
//} 
?>
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