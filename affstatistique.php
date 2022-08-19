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
<HTML lang="fr" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Statisques</TITLE>
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</HEAD>
<style>

</style>
<BODY id="page-top">
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
<h1 class="h3 mb-2 text-gray-800">Statistiques </h1>
                        <a href="club.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Ajouter</a>
                                 
                        </div>
<?php
	   	include('connect.php');

$query ="SELECT saison from athletes group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$queryc ="SELECT club from athletes group by club order by club";
$resultc = mysql_query($queryc,$connexion);
$rowc = mysql_fetch_assoc($resultc);
$queryl ="SELECT ligue from athletes group by ligue order by ligue";
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);

$saison = "";
if (isset($_POST['saison'])) {
  $saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);
}
$club11 = "";
if (isset($_POST['club11'])) {
  $club11 = (get_magic_quotes_gpc()) ? $_POST['club11'] : addslashes($_POST['club11']);
}
$sport = "";
if (isset($_POST['sport'])) {
  $sport = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
}
$ligue = "";
if (isset($_POST['ligue'])) {
  $ligue = (get_magic_quotes_gpc()) ? $_POST['ligue'] : addslashes($_POST['ligue']);
}

?> <table >

<tr>
<td><form name="stat" method="post" action="">
<table >
      <tr><td> sport </td>
        <td><select name="sport" size="1" id="Discipline" tabindex="9"  class="custom-select ">
          <option><?php echo $sport;?></option>
          <option></option>
        <option>وشوكونغ فو</option>
        <option>كمبو</option>
        <option>ديكايتو ريو</option>
        <option>الدفاع عن النفس بودو</option>
        <option>فوفينام فيات فوداو</option>
        <option>فوت وات فان فوداوو و الأنشطة التابعة</option>
        <option>هابكيدو</option>
        <option>الكيسندو</option></select></td>
         <td >Discipline</td>
        <td align="center"><select name="ligue" size="1" id="club" tabindex="9" class="custom-select ">
          <option><?php echo $ligue;?></option>
          <?php
					   do { 
                                     $res=$rowl['ligue'];
                                      echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
        </select></td>
       <td >Ligue</td>
        <td ><select name="club11" size="1" id="club11" tabindex="9" class="custom-select ">
          <option></option>
          <option><?php echo $club11;?></option>
          <?php
					   do { 
                                     $res=$rowc['club'];
                                      echo "<option >$res</option>";
                       } while ($rowc = mysql_fetch_assoc($resultc));
?>
        </select></td>
        <td>Club</td>
        <td ><select name="saison" size="1" id="saison" tabindex="9" class="custom-select ">
          <option><?php echo $saison;?></option>
          <?php
					   do { 
                                     $res=$row['saison'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
?>
        </select></td>
        <td >Saison</td>
        <td><p align="center"> <input name="ok" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value = "Rechercher">
        <input type=button value="Imprimer" onClick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></p>
 </td>
        
      </tr>
   

</table>
    </form></td></tr></table>
<?php 
$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into athletest select * from athletes where saison = '$saison' and club = '$club' and sport = '$sport'";

if ($club == "ADMIN"){

if ($sport <> ""){$query0 ="insert into athletest select * from athletes where saison = '$saison' and club like '%$club11%' and ligue like '%$ligue%' and sport = '$sport'";}
if ($sport == ""){$query0 ="insert into athletest select * from athletes where saison = '$saison' and club like '%$club11%' and ligue like '%$ligue%'";}

}


$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

$query ="SELECT * FROM age where sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result)+1;
$query ="SELECT * FROM age where sexe = 'أنثى'";
$result = mysql_query($query,$connexion);
$female = mysql_num_rows($result)+1;



$queryagem ="SELECT * FROM age where sexe = 'ذكر' order by min";
$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$queryagef ="SELECT * FROM age where sexe = 'أنثى' order by min";
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);


?>
<div class="card-body">

<p style="page-break-before:always">
<table align="center"   >
  <tr>
    <td align="right" valign="middle" width="40%">الجامعة التونسية للوشو كونغ فو</td>
    <td align="center" width="20%"><img src="image/fond.png" alt="" width="60" height="60"></td>
    <td align="left" valign="middle" width="40%">FEDERATION TUNISIENNE DE WUSHU KUNG FU</td>
  </tr>
</table>
    
  
<div align="center" class="style2">الإحصائيات</div><br>
<div align="center" class="style2"><?php echo $sport;?></div><br>
<div align="center"><?php echo $saison;?></div></p>
<div class="table-responsive">

<table class="table table-bordered" id="dataTable">
	<thead><tr>
	    <td rowspan="2" ><strong>الموسم</strong></td>
	    <td rowspan="2" ><strong>النادي</strong></td>
	    <td rowspan="2" ><strong>الرابطة</strong></td>
	    <td colspan="<?php echo $male;?>" align="center" ><strong>ذكور</strong></td>
	    <td colspan="<?php echo $female;?>" align="center" ><strong>إناث</strong></td>
	    <td rowspan="2" ><strong>المجموع العام</strong></td>
	</tr></thead>
	<tr>
                      <?php
					   do { 
                                     $res=$rowagem['cat'];?>
	  <td align="center"><strong><?php echo $res;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));
?>
	  <td align="center"><strong>م ذكور</strong></td>

                      <?php
					   do { 
                                     $res=$rowagef['cat'];?>
	  <td align="center"><strong><?php echo $res;?></strong></td>

                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
?>
	  <td align="center"><strong>م إناث</strong></td>
  </tr>
<?php 

if ($sport == ""){
$query0 ="select club, ligue from athletest where saison = '$saison' group by club, ligue order by ligue, club";}
else {
$query0 ="select club, ligue from athletest where saison = '$saison' group by club, ligue order by ligue, club";}
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {
$club0 = $row0['club'];
$ligue0 = $row0['ligue'];

$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);

?>
	<tr>
	  <td><div align="center"><?php echo $saison;?></div></td>
	  <td><div align="center"><?php echo $row0['club'];?></div></td>
	  <td><div align="center"><?php echo $row0['ligue'];?></div></td>



                      <?php
					   do { 
                                     $res=$rowagem['cat'];
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and age = '$res' and club = '$club0' and ligue = '$ligue0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));

$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                      <?php
					   do { 
                                     $res=$rowagef['cat'];
									 
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and age = '$res' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

<?php 
$query ="SELECT * FROM athletest where sport like '%$sport%' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>




  </tr>
<?php					}while	 ($row0=mysql_fetch_assoc($result0)); 
?>
<tr>	  <td colspan="3"><div align="center">المجموع</div></td>

                      <?php
$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);
					   do { 
                                     $res=$rowagem['cat'];
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and age = '$res'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));

$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                      <?php
					   do { 
                                     $res=$rowagef['cat'];
									 
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and age = '$res'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>


<?php 
$query ="SELECT * FROM athletest where sport like '%$sport%'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

  </tr>




</table></div></div></div>
<?php 
?>
<p style="page-break-before:always">
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>
<p align="center">&nbsp;</p></div></div></div></div></div>
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