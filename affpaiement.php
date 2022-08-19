<?php
session_start();
include('connect.php');
//$ip = $_SERVER["REMOTE_ADDR"];
//$query ="SELECT nom,date FROM archive where ip = '$ip' order by date desc";
//$result = mysql_query($query,$connexion);
//$row = mysql_fetch_assoc($result);
$club = $_SESSION['club'];
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
<TITLE>Un document bilingue</TITLE>
</HEAD>
<?php
	   	 

$query1 ="SELECT saison from paiement group by saison order by saison";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$query2 ="SELECT club from athletes group by club order by club";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$saison = "";
$club1 = "";
$test = "";
if (isset($_POST['saison'])) {
  $saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);
}
if (isset($_POST['club1'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club1'] : addslashes($_POST['club1']);
}
if (isset($_POST['test'])) {
  $test = (get_magic_quotes_gpc()) ? $_POST['test'] : addslashes($_POST['test']);
}

?>
<BODY id="">
<!-- Page Wrapper -->
    <div id="wrapper">


   <!-- Sidebar -->
   <div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>



    <form name="stat" method="post" action="">
<table width="100%" border="0" align="center"  class="text">
      <tr><input name="test" type="hidden" id="montant" tabindex="10" size="25" value="1">
        <td width="50%"><div align="right">Saison</div></td>
        <td width="50%"><select name="saison" size="1" id="saison" tabindex="9">
        <option><?php echo $saison;?> </option>
                      <?php
					   do { 
                                     $res=$row1['saison'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>

 <?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>

        <td width="50%"><div align="right">Club</div></td>
        <td width="50%"><select name="club1" size="1" id="saison" tabindex="9">
        <option><?php echo $club1;?> </option>
                      <?php
					   do { 
                                     $res1=$row2['club'];
                                      echo "<option >$res1</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>
      </select></td>
<?php } ?>


      </tr>
 
 
      <tr>
        <td colspan="2" align="center"><input name="ok" type="submit" class="Style4" value="Rechercher"></td>
      </tr>
</table>
    </form>

<div align="center" class="style2">Paiement des Licences</div>
<?php 
?>
<p align="center"><a href="paiement.php">Ajout</a></p>
<?php 

if ($test == "1"){
if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){
$query ="SELECT * FROM paiement where club = '$club' and saison = '$saison' and etat = 1";
$query2 ="SELECT SUM(montant) from paiement where club = '$club' and saison = '$saison' and etat = 1";
//$query3 ="SELECT SUM(prix) from athletes where club = '$club' and saison = '$saison'";
}else{
$query ="SELECT * FROM paiement where saison = '$saison' and etat = 1";
if ($saison == "") {$query ="SELECT * FROM paiement where etat = 1";}
if ($club1 <> "") {$query ="SELECT * FROM paiement where saison like '%$saison%' and club = '$club1' and etat = 1";}

$query2 ="SELECT SUM(montant) from paiement where saison = '$saison' and etat = 1";
if ($saison == "") {$query2 ="SELECT SUM(montant) from paiement where etat = 1";}
if ($club1 <> "") {$query2 ="SELECT SUM(montant)  FROM paiement where saison like '%$saison%' and club = '$club1' and etat = 1";}
//$query3 ="SELECT SUM(prix) from athletes where saison = '$saitson'";
}

$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_row($result2);
$montantpaye = $row2[0];

//$result3 = mysql_query($query3,$connexion);
//$row3 = mysql_fetch_row($result3);
//$montanttotal = $row3[0];

//$reste = $montanttotal - $montantpaye;
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);

$query0 ="insert into athletest select * from athletes where saison like '%$saison%' and club = '$club'";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin")){

$query0 ="insert into athletest select * from athletes where saison = '$saison'";

if ($saison == "") {$query0 ="insert into athletest select * from athletes";}
if ($club1 <> "") {$query0 ="insert into athletest select * from athletes where saison like '%$saison%' and club = '$club1'";}

}
$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

$query000 ="select * from age where prix > 0 order by sexe,min";
$result000 = mysql_query($query000,$connexion);
$row000 = mysql_fetch_assoc($result000);
$totalRows = mysql_num_rows($result000) + 1 ;




?>

<table border="1" width="100%" id="table1">
	<tr>
	    <td rowspan="2" ><div align="center"><strong>Club</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Ligue</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Saison</strong></div></td>
	    <td colspan="<?php echo $totalRows ; ?>" align="center" ><strong> </strong></td>
	    <td rowspan="2" ><div align="center"><strong>Montant</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Montant Payé</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>Reste a Payer</strong></div></td>
	</tr>

	<tr>
<?php do { ?>
	  <td align="center"><strong><?php echo $row000['nom'];?></strong></td>

<?php					}while	 ($row000=mysql_fetch_assoc($result000)); 

?>
	  <td align="center"><strong>Total</strong></td>
</tr>
<?php 
$query0 ="select club, ligue from athletest group by club, ligue order by ligue, club";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);

$ttprix = 0;

do {
$club0 = $row0['club'];
$ligue0 = $row0['ligue'];
$tprix = 0;
$total = 0;
$query00 ="select saison from athletest where club = '$club0' group by saison order by saison";
$result00 = mysql_query($query00,$connexion);
$row00 = mysql_fetch_assoc($result00);
$totalsais = mysql_num_rows($result00) ;
?>
	<tr>
	  <td rowspan="<?php echo $totalsais;?>"><div align="center"><?php echo $row0['club'];?></div></td>
	  <td rowspan="<?php echo $totalsais;?>"><div align="center"><?php echo $row0['ligue'];?></div></td>
<?php
do {
$saison0 = $row00['saison'];
?>	  <td><div align="center"><?php echo $saison0;?></div></td>
<?php
$result000 = mysql_query($query000,$connexion);
$row000 = mysql_fetch_assoc($result000);
$total =0;
do {
$age1 = $row000['cat'];
$sexe1 = $row000['sexe'];
$prix = $row000['prix'];
$query1 ="SELECT sum(n) from athletest where club = '$club0' and saison = '$saison0' and age = '$age1' and sexe = '$sexe1'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
?>
	  <td><div align="center"><?php echo $row1[0];?></div></td>

<?php	

$tprix = $tprix + $row1[0] * $prix;
$total = $total + $row1[0] ;

				}while	 ($row000=mysql_fetch_assoc($result000)); 

//$query7 ="SELECT sum(n)  from athletest where club = '$club0' and saison = '$saison' and sexe = 'ذكر'";
//$query8 ="SELECT sum(prix)from athletest where club = '$club0' and saison = '$saison' and sexe = 'ذكر'";
$query9 ="SELECT SUM(montant) from paiement where club = '$club0' and saison = '$saison0' and etat = 1";




//$result7 = mysql_query($query7,$connexion);
//$row7 = mysql_fetch_row($result7);
//$total= $row7[0];
//$result8 = mysql_query($query8,$connexion);
//$row8 = mysql_fetch_row($result8);
$result9 = mysql_query($query9,$connexion);
$row9 = mysql_fetch_row($result9);

?>
	  <td><div align="center"><?php echo $total;?></div></td>
	  <td><div align="center"><?php echo $tprix;?></div></td>
	  <td><div align="center"><?php echo $row9[0];?></div></td>
	  <td><div align="center"><?php echo $tprix-$row9[0];?></div></td>
  </tr>
<?php	
$ttprix = $ttprix+$tprix;
					}while	 ($row00=mysql_fetch_assoc($result00)); 
				}while	 ($row0=mysql_fetch_assoc($result0)); 

?>
</table>
<table border="1" width="100%">
	<tr>
	    <td ><div align="center"><strong>Montant Total </strong></div></td>
	    <td ><div align="center"><strong><?php echo $ttprix ;?> </strong></div></td>
	    <td ><div align="center"><strong>Montant Payé</strong></div></td>
	    <td ><div align="center"><strong><?php echo $montantpaye ;?>  </strong></div></td>
	    <td ><div align="center"><strong>Reste a Payer</strong></div></td>
	    <td ><div align="center"><strong><?php echo $ttprix - $montantpaye ;?> </strong></div></td>
	</tr>

</table>
<div align="center">::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: </div>
<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Saison</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
	    <td ><div align="center"><strong>Montant</strong></div></td>
	    <td ><div align="center"><strong>Date</strong></div></td>
        <td ><div align="center"><strong>Recu</strong></div></td>
	    <td ><div align="center"><strong></strong></div></td>
	</tr>
<?php






do {

?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['montant'];?></div></td>
	  <td><div align="center"><?php echo $row['date'];?></div></td>
	  <td><div align="center"><?php echo $row['recu'];?></div></td>
      <td><a href ='delpai.php?code<?php echo "=$row[id]";?>'><img src="sup.png" width="16" height="16"></a>
        
        </td>

  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<?php 
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){
?>
<p align="center"><a href="paiement.php">Ajout</a></p>
<?php }} ?>
<p style="page-break-before:always">
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>
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