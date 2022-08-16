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

<?php
	   	 


?>

<div align="center" class="style2">Paiement des Licences</div>
<?php 
?>
<p align="center"><a href="paiement.php">Ajout</a></p>
<?php 

if (($club <> "ADMIN")AND($club <> "Admin")AND($club <> "admin")){
$query ="SELECT * FROM paiement where club = '$club' and saison = '$saison' and etat = 0";
}else{
$query ="SELECT * FROM paiement where saison = '$saison' and etat = 0";}
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>

<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>Saison</strong></div></td>
	    <td ><div align="center"><strong>Club</strong></div></td>
	    <td ><div align="center"><strong>Montant</strong></div></td>
	    <td ><div align="center"><strong>Date</strong></div></td>
        <td ><div align="center"><strong>Decharge</strong></div></td>
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
      <td><img src="./decharge<?php echo $row['id']. '.jpg';?>?<?php echo time(); ?>" width="33" height="50"></td>
      <td><a href ='delpai.php?code<?php echo "=$row[id]";?>'><img src="sup.png" width="16" height="16"></a>
      <td><a href ='valpai.php?code<?php echo "=$row[id]";?>'>Valider</a>
        
        </td>

  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>

</body>

</html>