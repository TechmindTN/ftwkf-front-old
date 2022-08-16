<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
$cin = $_SESSION['cin'];
//$club = $_GET['club'];include('connect.php');
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
<p align="center"><a href="arbitre.php">Ajout</a></p>

<?php 
	   	include('connect.php');
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];


?>



<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Saison </strong> </div> </td>
		<td> <div align = "center"> <strong> N° Lic </strong> </div> </td>
		<td> <div align = "center"> <strong> CIN </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td> <div align = "center"> <strong> Prénom </strong> </div> </td>
		<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
	    <td ><div align="center"><strong>Date Naissance</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
		<td> <div align = "center"> <strong> Ligue </strong> </div> </td>
		<td ><div align="center"><strong>Grade</strong></div></td>
		<td ><div align="center"><strong>Degre</strong></div></td>
		<td ><div align="center"><strong>Function</strong></div></td>
		<td> <div align = "center"> <strong> Discipline</strong> </div> </td>
		<td ><div align="center"><strong>Photo</strong></div></td>
		<td ><div align="center"><strong>Diplome</strong></div></td>
		<td ></td>
	</tr>
<?php


$query ="SELECT * FROM entraineur where cin = '$cin' and saison = '$saison' and type = 'حكم'";

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {

 $uploaddir ='arb/' 


?>

	<tr>

	  <td><div align="center"><?php echo $row['saison'];?></div></td>
	  <td><div align="center"><?php echo $row['n_lic'];?></div></td>
	  <td><div align="center"><?php echo $row['cin'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['prenom'];?></div></td>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['naiss'];?></div></td>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['grade'];?></div></td>
	  <td><div align="center"><?php echo $row['degre'];?></div></td>
	  <td><div align="center"><?php echo $row['type'];?></div></td>
	  <td><div align="center"><?php echo $row['sport'];?></div></td>
	  <td><div align="center"><img src="./photo<?php echo $uploaddir.$row['photo'];?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><div align="center"><img src="./diplome<?php echo $uploaddir.$row['photo'];?>?<?php echo time(); ?>" width="33" height="50"></div></td>
      

      
      <td>
        <div align="center"><a href ='updarbitre.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><b>Modifier</b></a>
        
        </td>
  
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>



</body>

</html>