<?php
session_start();
////$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];

////$_SESSION['club'] = $club2;

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
<div id="wrapper">
<div id='side'></div>
<div id="content" class="col-10" style="margin-left:11%">
<div class="container-fluid">
<div class="card shadow mb-4" >


<div class="mb-4 ">
<div class="card-header  py-3 d-sm-flex align-items-center justify-content-between mb-4">
<div align="center"  class="h3 mb-2 text-gray-800">Poids</div>
<div align="center"><a href="param.php"class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Ajout</a></div>

 <?PHP 
	   	include('connect.php');
// $sport1 = "";
 $cat1 = "";
 $type1 = "";
//if (isset($_POST['sport'])) {
//  $sport1 = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
//}
if (isset($_POST['cat'])) {
  $cat1 = (get_magic_quotes_gpc()) ? $_POST['cat'] : addslashes($_POST['cat']);
}
//if (isset($_POST['typ'])) {
//  $type1 = (get_magic_quotes_gpc()) ? $_POST['typ'] : addslashes($_POST['typ']);
//}

//$query01 ="SELECT sport FROM param group by sport order by sport";
//$result01 = mysql_query($query01,$connexion);
//$row01 = mysql_fetch_row($result01);


	
$query1 ="SELECT cat from param group by cat order by cat";	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

//$query2 ="SELECT type from param where sport = '$sport1' group by type order by type";	 
//$result2 = mysql_query($query2,$connexion);
//$row2 = mysql_fetch_assoc($result2);

	  ?>
     
 
<form name="stat" method="post" action="">

              Age<select class="custom-select " name="cat" size="1" id="club" tabindex="9">
        <option><?php echo $cat1;?> </option>
                      <?php
					   do { 
                                     $res=$row1['cat'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select>
<input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value = "Rechercher">
                 

          </form>

                      <!-- </div> -->
 
 
      <?PHP // } 

$query ="SELECT * FROM param where cat = '$cat1' order by sexe, ordre";
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>
</div>
<div class="card-body">

<div class="table-responsive">
<table class="table table-bordered" width="100%" id="dataTable" >
	<thead><tr>
		<td> <div align = "center"> <strong> Age </strong> </div> </td>
	  	<td> <div align = "center"> <strong> Type </strong> </div> </td>
	  	<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
		<td> <div align = "center"> <strong> Ordre </strong> </div> </td>
		<td> <div align = "center"> <strong> Poids </strong> </div> </td>
		<td ><?php echo $totalRows; ?></td>
		<td ></td>
	</tr>
                      </thead>
                      <tbody>
<?php


do {?>

	<tr>
	  <td><div align="center"><?php echo $row['cat'];?></div></td>
	  <td><div align="center"><?php echo $row['type'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['ordre'];?></div></td>
	  <td><div align="center"><?php echo $row['poids'];?></div></td>
      <td><div align="center"><a href ='updparam.php?code<?php echo "=$row[id]";?>'><b>Modifier</b></a> </div></td>
      <td><div align="center"><a  onclick="return confirm('Vous etes sure de supprimer ce Poids??')" href ='delparam.php?code<?php echo "=$row[id]";?>'><b>Supprimer</b></a> </div></td>
	</tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</tbody>
</table>

</div></div></div></div></div>
</div></div>

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