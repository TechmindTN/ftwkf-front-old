<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];//$_SESSION['club'] = $club1;
 if ($club == null) {$club = $club1;}
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
	   	include('connect.php');
 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}

//$query ="SELECT club FROM club where club = '$club'";
//$result = mysql_query($query,$connexion);
//$row = mysql_fetch_assoc($result);
//$club=$row['club'];


$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];
if ($saison1 == "") {$saison1 = $saison;}
$query01 ="SELECT saison FROM saison";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);



if (($club=="ADMIN")or($club=="DTN")) {
	$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";	 
	$result1 = mysql_query($query1,$connexion);
	$row1 = mysql_fetch_assoc($result1);
	  ?>


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
<?php } ?>

<div align="center" class="style2">Licence Non Valide</div>

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
		<td> <div align = "center"> <strong>  </strong></div></td>
	</tr>
<?php





$query ="SELECT * FROM athletedel where club = '$club' and saison = '$saison'";

if (($club == "ADMIN")or($club=="DTN")){
if ($club1 <> "") {$query ="SELECT * FROM athletedel where club = '$club1' and saison = '$saison1'";}
if ($club1 == "") {$query ="SELECT * FROM athletedel where saison = '$saison1'";}
}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
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
      <td>
        <div align="center"><a href ='licenceverifdel.php?naiss<?php echo "=$row[date_naiss]";?>&club<?php echo "=$row[club]";?>&nom<?php echo "=$row[nom]";?>&prenom<?php echo "=$row[prenom]";?>&code<?php echo "=$row[n_lic]";?>'><b>Verifier</b></a>
        </td>
          <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <a href ='delathletedel.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP  } ?>       
        
        </td>

  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 
?> 
</table>
<p>&nbsp;</p>


</body>

</html>