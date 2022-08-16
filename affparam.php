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
<style>
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
-->
</style><BODY>
<div id="wrapper">
<div id='side'></div>

<div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>
<div align="center" class="style2">CATEGORIE D'AGE</div>

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
     
 
 <table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">

              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>

                   <td align="right" width="25%"> Age </td>

   <td align="left" width="25%"><select name="cat" size="1" id="club" tabindex="9">
        <option><?php echo $cat1;?> </option>
                      <?php
					   do { 
                                     $res=$row1['cat'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>
                  <td align="left" width="50%">
<input name="ok" type="submit" class="Style4" value = "Rechercher">
                  </td>


                </tr>


              </table>

          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>

 
 
      <?PHP // } 

$query ="SELECT * FROM param where cat = '$cat1' order by sexe, ordre";
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>

<table border="1" width="100%" id="table1">
	<tr>
		<td> <div align = "center"> <strong> Age </strong> </div> </td>
	  	<td> <div align = "center"> <strong> Type </strong> </div> </td>
	  	<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
		<td> <div align = "center"> <strong> Ordre </strong> </div> </td>
		<td> <div align = "center"> <strong> Poids </strong> </div> </td>
		<td ><?php echo $totalRows; ?></td>
		<td ></td>
	</tr>
<?php


do {?>

	<tr>
	  <td><div align="center"><?php echo $row['cat'];?></div></td>
	  <td><div align="center"><?php echo $row['type'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['ordre'];?></div></td>
	  <td><div align="center"><?php echo $row['poids'];?></div></td>
      <td><div align="center"><a href ='updparam.php?code<?php echo "=$row[id]";?>'><b>Modifier</b></a> </div></td>
      <td><div align="center"><a href ='delparam.php?code<?php echo "=$row[id]";?>'><b>Supprimer</b></a> </div></td>
	</tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<div align="center"><a href="param.php">Ajout</a></div>

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