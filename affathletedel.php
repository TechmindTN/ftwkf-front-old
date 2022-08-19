<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];//$_SESSION['club'] = $club1;
 if ($club == null) {$club = $club1;}
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
<TITLE>Un document bilingue</TITLE>
</HEAD>
<BODY>
<?php
	   	include('connect.php');
 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}

//$query ="SELECT club FROM club where club = '$club'";
//$result = mysql_query($query,$connexion);
//$row = mysql_fetch_assoc($result);
//$club=$row['club'];


$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];
if ($saison1 == "") {$saison1 = $saison;}
$query01 ="SELECT saison FROM saison";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);



if (($club=="ADMIN")or($club=="DTN")) {
	$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";	 
	$result1 = mysql_query($query1,$connexion);
	$row1 = mysql_fetch_assoc($result1);
	  ?>
	 <div id="wrapper"> 
<div id="side"></div>

<div id="content-wrapper" style="margin-left:12%"  class="d-flex flex-column ">
<div id='side'></div>





            <!-- Main Content -->
            <div id="content" >
            <div  class="container-fluid">
                            
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-2 text-gray-800">Athletes Non Valide</h1>

 <form name="stat" method="post" action="">
 <table>
<tr><td>
 Saison </td>
 <td><select class="custom-select " name="sais" size="1" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $saison1;?> </option>
                      <?php
					   do { 
                                     $res=$row01['saison'];
                                      echo "<option >$res</option>";
                       } while ($row01 = mysql_fetch_assoc($result01));
?>
      </select></td>
      <td><select class="custom-select " name="club" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td><td>
<input name="ok" type="submit" class="btn btn-primary" value = "Rechercher">
                      </td></tr></table>
          </form>

<?php } ?>
                      </div>
<div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered"  width="100%" id="dataTable">
	<thead><tr>
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
		<td> <div align = "center"> <strong> Actions </strong></div></td>
    <td></td>
	</tr>
                      </thead>
                      <tbody>

<?php





$query ="SELECT * FROM athletedel where club = '$club' and saison = '$saison'";

if (($club == "ADMIN")or($club=="DTN")){
if ($club1 <> "") {$query ="SELECT * FROM athletedel where club = '$club1' and saison = '$saison1'";}
if ($club1 == "") {$query ="SELECT * FROM athletedel where saison = '$saison1'";}
}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
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
      <td>
        <div align="center"><a href ='licenceverifdel.php?naiss<?php echo "=$row[date_naiss]";?>&club<?php echo "=$row[club]";?>&nom<?php echo "=$row[nom]";?>&prenom<?php echo "=$row[prenom]";?>&code<?php echo "=$row[n_lic]";?>'><b>Verifier</b></a></div>
        </td>
          <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <a  onclick="return confirm('Vous etes sure de supprimer ce Athlete??')" href ='delathletedel.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP  } ?>       
        
        </td>

  </tr>
  
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
?> 
</tbody>
</table>
</div> </div> </div> </div> </div> </div>

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