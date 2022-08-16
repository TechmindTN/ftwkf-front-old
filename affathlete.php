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

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
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
<a class="collapse-item" href="affclub.php">Déja affiliés</a>
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




<div align="center" class="style2"> Liste des Athletes</div>
  



 <div align="center">
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
   <div align="center">
   <a href ='liste.php'><b>Exporter</b></a>
   
   <?php
	
	}
if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
if (($club=="dtn")or($club=="DTN")or($club=="Dtn")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
	 

$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

	  ?>
   
   
 </div>
 <table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">

              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>

                   <td align="right" width="25%"> Saison </td>
   <td align="left" width="25%"><select name="sais" size="1" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $saison1;?> </option>
                      <?php
					   do { 
                                     $res=$row01['saison'];
                                      echo "<option >$res</option>";
                       } while ($row01 = mysql_fetch_assoc($result01));
?>
      </select></td>
                   <td align="right" width="25%"> Club </td>

   <td align="left" width="25%"><select name="club" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
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
<p align="center"><a href="athletes1.php">Ajout</a></p>
<?PHP
}

if (($actif == "1") and ($club <> "ADMIN")) {?>
<p align="center"><a href="athletes.php?club<?php echo "=$club";?>">Ajout</a>-----------<a href="rechathlete.php?club<?php echo "=$club";?>">Renouvellement</a></p>
<?PHP
}?>

<table border="1" width="100%" id="table1">
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
      <img src="./photo/<?php echo $nphot.".JPG";?>?<?php echo time(); ?>" width="66" height="100"></div>
<?php } }
  
 ?>

 
 
 
    </td>
      <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <div align="center"><a href ='updathletes.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&club<?php echo "=$club";?>'><b>Modifier</b></a>
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
</table>
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
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->

<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>
<script src="assets/js/sb-admin-2.js"></script>
</body>

</html>