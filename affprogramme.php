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
</style>
<BODY>
<?php

function diff_date($day , $month , $year , $day2 , $month2 , $year2){
  $timestamp = mktime(0, 0, 0, $month, $day, $year);
  $timestamp2 = mktime(0, 0, 0, $month2, $day2, $year2);
  $diff_date = floor(($timestamp - $timestamp2) / (3600 * 24));
  return $diff_date; 
}

?>
<div align="center" class="style2">Programme  des Competitions</div>

<table border="1" width="100%" id="table1">
	<tr>
		<td><div align="center"><strong>Competition</strong></div></td>
		<td><div align="center"><strong>Discipline</strong></div></td>
		<td><div align="center"><strong>Age</strong></div></td>
		<td><div align="center"><strong>Type</strong></div></td>
		<td><div align="center"><strong>Lieu</strong></div></td>
		<td><div align="center"><strong>Date</strong></div></td>
		<td><div align="center"><strong>Deadline</strong></div></td>
		<td><div align="center"><strong></strong></div></td>
	</tr>
<?php
//$federation = $_SESSION['federation'];
//$pers = $_SESSION['pers'];
//$tache = $_SESSION['tache'];
//$sexe = $_SESSION['sexe'];
//$age = $_SESSION['age'];
//$saison = $_SESSION['saison'];

	   	include('connect.php');
//if ($club != "ADMIN"){
$query ="SELECT * FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$actif=$row['actif'];
//}

$query ="SELECT * FROM programme order by date_debut";
//else{
//$query ="SELECT * FROM athletes where federation = '$federation' and equipe = 'منتخب وطني' and age = '$age' and sexe = '$sexe' order BY federation";
//}

$result = mysql_query($query,$connexion);
//query('SET NAMES UTF8');
$row = mysql_fetch_assoc($result);
do {
$id = $row['id'];
$date_debut = $row['date_debut'];
$date_debut1=substr("$date_debut", 8, 2). "/".substr("$date_debut", 5, 2)."/".substr("$date_debut", 0, 4);
$delais = $row['delais'];
$delais1=substr("$delais", 8, 2). "/".substr("$delais", 5, 2)."/".substr("$delais", 0, 4);

$dat1 = date("d/m/Y") ;



$dat2 = $dat1;
$ddt2 = $delais1;
$jours1=diff_date(substr("$ddt2", 0, 2) , substr("$ddt2", 3, 2) , substr("$ddt2", 6, 4) , substr("$dat2", 0, 2) , substr("$dat2", 3, 2) , substr("$dat2", 6, 4));

if (($jours1 >= 0)or(($club == "ADMIN")or($club == "Admin")or($club == "admin")or($club == "Dtn")or($club == "DTN")or($club == "dtn"))){ 

?>

	<tr>
	  <td><div align="center"><?php echo $row['action'];?></div></td>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center"><?php echo $row['age'];?></div></td>
	  <td><div align="center"><?php echo $row['type'];?></div></td>
	  <td><div align="center"><?php echo $row['lieu'];?></div></td>
	  <td><div align="center"><?php echo $date_debut1;?></div></td>
	  <td><div align="center"><?php echo $delais1;?></div></td>
      <td>
      <?php
if (($jours1 >= 0) and ($actif ==1)){ 
?>
      <div align="center"><a href ='del.php?code<?php echo "=$row[id]";?>&cat<?php echo "=$row[age]";?>&comp<?php echo "=$row[action]";?>&dat<?php echo "=$date_debut1";?>&lieu<?php echo "=$row[lieu]";?>&type<?php echo "=$row[type]";?>&max<?php echo "=$row[max]";?>&min<?php echo "=$row[min]";?>&qualif<?php echo "=$row[qualif]";?>&sais<?php echo "=$row[saison]";?>&sport<?php echo "=$row[sport]";?>' ><b>Enregistrement</b></a>
<?php }      

if (($jours1 < 0)and(($club == "ADMIN")or($club == "DTN"))){ 
?>
      <div align="center"><a href ='del.php?code<?php echo "=$row[id]";?>&cat<?php echo "=$row[age]";?>&comp<?php echo "=$row[action]";?>&dat<?php echo "=$date_debut1";?>&lieu<?php echo "=$row[lieu]";?>&type<?php echo "=$row[type]";?>&max<?php echo "=$row[max]";?>&min<?php echo "=$row[min]";?>&qualif<?php echo "=$row[qualif]";?>&sais<?php echo "=$row[saison]";?>' ><b>Consul</b></a>
<?php }?>      

      </td>
      <?php if (($club == "ADMIN")){ ?>

      <td><div align="center"><a href ='updprogramme.php?code<?php echo "=$row[id]";?>' ><b>Modification</b></a></td>
<?php	} ?> 
      
  </tr>
<?php	}				}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

<?php
if (($club == "ADMIN")){ 
?>
<p align="center"><a href="programme.php">Ajout</a></p>
<?php
} 
?>

</body>

</html>
