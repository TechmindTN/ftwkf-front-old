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
<div align="center" class="style2"> AGE</div>

 <?PHP 
	   	include('connect.php');
// $sport1 = "";
//if (isset($_POST['sport'])) {
//  $sport1 = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
//}

//$query01 ="SELECT sport FROM age group by sport order by sport";
//$result01 = mysql_query($query01,$connexion);
//$row01 = mysql_fetch_row($result01);


	

	  ?>
     
 

 
 
      <?PHP // } 

$query ="SELECT * FROM age order by sexe, min";
$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>

<table border="1" width="100%" id="table1">
	<tr>
	  	<td> <div align = "center"> <strong> Sexe </strong> </div> </td>
		<td> <div align = "center"> <strong> Age </strong> </div> </td>
		<td> <div align = "center"> <strong> Min </strong> </div> </td>
		<td> <div align = "center"> <strong> Max </strong> </div> </td>
		<td> <div align = "center"> <strong> Prix </strong> </div> </td>
		<td> <div align = "center"> <strong> Nom </strong> </div> </td>
		<td ><?php echo $totalRows; ?></td>
	</tr>
<?php


do {?>

	<tr>
	  <td><div align="center"><?php echo $row['sexe'];?></div></td>
	  <td><div align="center"><?php echo $row['cat'];?></div></td>
	  <td><div align="center"><?php echo $row['min'];?></div></td>
	  <td><div align="center"><?php echo $row['sup'];?></div></td>
	  <td><div align="center"><?php echo $row['prix'];?></div></td>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
      <td><div align="center"><a href ='updage.php?code<?php echo "=$row[code]";?>'><b>Modifier</b></a></td>
      <td><div align="center"><a href ='delage.php?code<?php echo "=$row[code]";?>'><b>Supprimer</b></a></td>
	</tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<div align="center"><a href="age.php">Ajout</a></div>


</body>

</html>