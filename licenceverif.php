<?php
session_start();
//$club = $_SESSION['club'];
$club = $_GET['club1'];
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
<div align="center" class="style2">Athletes Verification</div>
<?php


	   	include('connect.php');


$date_naiss=$_GET['naiss'];
$clubb=$_GET['club'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$n_lic=$_GET['code'];
$cin=$_GET['cin'];

$query000 ="select * from age where prix > 0 order by sexe,min";
$result000 = mysql_query($query000,$connexion);
$row000 = mysql_fetch_assoc($result000);
$tprix =0;
do {
$age1 = $row000['cat'];
$sexe1 = $row000['sexe'];
$prix = $row000['prix'];
$query1 ="SELECT sum(n) from athletest where club = '$club0' and saison = '$saison0' and age = '$age1' and sexe = '$sexe1'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);

$tprix = $tprix + $row1[0] * $prix;

				}while	 ($row000=mysql_fetch_assoc($result000)); 


$query9 ="SELECT SUM(montant) from paiement where club = '$club0' and saison = '$saison0' and etat = 1";
$result9 = mysql_query($query9,$connexion);
$row9 = mysql_fetch_row($result9);
$tpai = $row9[0];
$bilan = $tpai - $tprix ;

?>
<br>
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
	</tr>
<?php


$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$query ="SELECT * FROM athletes where date_naiss = '$date_naiss' order by saison desc";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {

similar_text(strtolower($nom), strtolower($row['nom']), $percentn); 
similar_text(strtolower($prenom), strtolower($row['prenom']), $percentpn); 
similar_text(strtolower($nom), strtolower($row['prenom']), $percentn1); 
similar_text(strtolower($prenom), strtolower($row['nom']), $percentpn1); 


if ((($percentn >50) or ($percentpn >50)or($percentn1 >50) or ($percentpn1 >50))and ($saison == $row['saison'])) {


?>
	<tr bgcolor="#FF0000">
<?php }else {?>
	<tr>
<?php }?>


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
	  <td><div align="center"></div></td>
  
  </tr>
<?php					}
while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

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
		<td><div align="center"><strong></strong></div></td>
		<td><div align="center"><strong></strong></div></td>
		<td><div align="center"><strong></strong></div></td>
	</tr>
<?php  
$query ="SELECT * FROM athletess where n_lic = '$n_lic'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$ident = $row['photoid'];
$ren = $row['obs'];
if ($bilan >0){
?>
	<tr>
<?php }else{
?>
	<tr bgcolor="#FF0000">
<?php }
?>

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
	  <td><div align="center"></div></td>
      <td><div align="center"><a href ='updathletess.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$row[club]";?>'><b>Modifier</b></a></td>
      <td><div align="center"><a href ='licencevalid.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$row[club]";?>'><b>Validate</b></a></td>
      <td><a href ='delathletess.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$row[club]";?>'><img src="sup.png" width="16" height="16"></a></td>
  
  </tr>
</table>

<table border="0">
  <tr>
<?php
$ren = $row['obs'];

if ($ren <> "") {$phott =$ren; }
else {$phott =$row['n_lic']; }
if ($ren <> "")  {
 ?>
	  <td valign="top"><img src="./photo/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="53" height="105"><td>
	  <td><img src="./photoid/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"><td>
  <td><img src="./photobor/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
  <td><img src="./photoeng/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
      <?PHP 
	  }
else {
 ?>
	  <td valign="top"><img src="./photot/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="53" height="105"></td>
	  <td><img src="./photoidt/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></td>
  <td><img src="./photobor/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
  <td><img src="./photoeng/<?php echo $row['saison'];?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="350" height="800"></div></td>
      <?PHP 
	  }?>
  
  
  </tr>
  
</table>

</body>

</html>