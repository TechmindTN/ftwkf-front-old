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
<TITLE>Un document bilingue</TITLE>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

</style>
</HEAD>

<BODY>
<div id="wrapper">
<div id="side"></div>
<div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>
<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Club par saison</h1>
                        <a href="clubs.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a>
                                 
                        </div>
<?php
include('connect.php');

 $club1 = "";
 $ligue = "";
 $saison = "";
if (isset($_POST['club'])) {$club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);}

if (isset($_POST['ligue'])) {$ligue = (get_magic_quotes_gpc()) ? $_POST['ligue'] : addslashes($_POST['ligue']);}

if (isset($_POST['saison'])) {$saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);}



if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {
$query1 ="SELECT club from clubb group by club order by club";	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$queryl ="SELECT ligue from clubb group by ligue order by ligue";	 
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);
$querys ="SELECT saison from clubb group by saison order by saison";	 
$results = mysql_query($querys,$connexion);
$rows = mysql_fetch_assoc($results);

}


?>

<div class="card shadow mb-4">
<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
<table >

        <tr>
          <td><form name="stat" method="post" action="">

              <table class=" card-body">
                <tr >

                   <td > Saison </td>

   <td ><select name="saison" size="1" id="club" tabindex="9" class="custom-select " >
        <option>Choisir...</option>
                      <?php
					   do { 
                                     $res=$rows['saison'];
                                      echo "<option >$res</option>";
                       } while ($rows = mysql_fetch_assoc($results));
?>
      </select></td>
      

                   <td > Ligue </td>

   <td ><select name="ligue" size="1" id="club" tabindex="9"  class="custom-select "  >
        <option><?php echo $ligue;?> </option>
        <option> </option>
                      <?php
					   do { 
                                     $res=$rowl['ligue'];
                                      echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
      </select></td>


                   <td > Club </td>

   <td  ><select name="club" size="1" id="club" tabindex="9" class="custom-select "  >
        <option><?php echo $club1;?> </option>
        <option> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>

                   <td >
<input name="ok" type="submit" class="btn btn-sm btn-primary" value = "Rechercher">
                  </td>


                </tr>


              </table>

          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>
                      </div></div>
<div class="card-body">


<div class="table-responsive">
<table class="table table-bordered" id="dataTable" >
<thead>
                                        <tr>
                                            <th>Club</th>
                                            <th>Ligue</th>                                            
                                            <th>Saison</th>
                                        
                                           
                                            
                                        </tr>
                                        </thead>

<?php
if ($saison<>""){$query ="SELECT * FROM clubb where club like '%$club1%' and saison like '%$saison%' and ligue like '%$ligue%' ";}
if ($saison==""){$query ="SELECT * FROM clubb order club";}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

do {?>
	<tr>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['saison'];?></div></td>
    
    
   </tr>
<?php					}while	 (($row=mysql_fetch_assoc($result))); 


?> 
</table>
</div></div>
<p>&nbsp;</p>

<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
<p align="center"><a href="clubs.php">Ajout</a></p>
<?php
//}else{ 
?>
<?php
} 
?>
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
