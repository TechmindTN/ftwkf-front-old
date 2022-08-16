<?php
session_start();
////$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];?>
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
<div align="center" class="style2">Liste à Valider</div>
<?php  
	   	include('connect.php');
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$club1 = "";
$age1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['age'])) {
  $age1 = (get_magic_quotes_gpc()) ? $_POST['age'] : addslashes($_POST['age']);
}
	 
	 
    if (($club=="admin")or($club=="ADMIN")or($club=="Admin") or ($club == "CENTRE")or($club == "Centre")or($club == "centre") or ($club == "NORD")or($club == "Nord")or($club == "nord") or ($club == "SUD")or($club == "Sud")or($club == "sud")or($club == "dtn")or($club == "DTN")or($club == "Dtn")) {

if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {$query1 ="SELECT club from athletess where saison = '$saison' group by club order by club";}	 
if (($club=="dtn")or($club=="DTN")or($club=="Dtn")) {$query1 ="SELECT club from athletess where saison = '$saison' group by club order by club";}	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$query2 ="SELECT age from athletess group by age order by age";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);

	  ?>
 <table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">
              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>
   <td align="right" width="25%">Club</td>
   <td align="right" width="25%"><select name="club" size="1" id="club" tabindex="9">
     <option><?php echo $club1;?></option>
     <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
   </select></td>
   <td align="right" width="50%">Age</td>
   <td align="right" width="50%"><select name="age" size="1" id="club2" tabindex="9">
     <option><?php echo $age1;?></option>
     <?php
					   do { 
                                     $res=$row2['age'];
                                      echo "<option >$res</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
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

<?php } 
$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];




$query ="SELECT * FROM athletess where club = '$club' and saison = '$saison' order by n_lic";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin") or($club=="dtn")or($club=="DTN")or($club=="Dtn")){
if ($club1 <> "") {$query ="SELECT * FROM athletess where club = '$club1' and saison = '$saison' and age like '%$age1' order by n_lic";}
if ($club1 == "") {$query ="SELECT * FROM athletess where saison = '$saison' and age like '%$age1' order by n_lic";}
}

$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
//query('SET NAMES UTF8');
$row = mysql_fetch_assoc($result);
?>



<table border="1" width="100%" id="table1">
	<tr>
	<tr>
	    <td ><div align = "center"> <strong> Saison </strong> </div> </td>
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
		<td ><div align = "center"> <strong> Identité</strong></div></td>
		<td ><div align = "center"> <strong> Fiche Medical</strong></div></td>
		<td ><div align = "center"> <strong> Eng Parental</strong></div></td>
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

//	  $file1 = "C:\Program Files\EasyPHP-5.3.3.1\www\tunisie judo/photo/". $row['photo'];
//clearstatcache($clear_realpath_cache = true, $file1);
	//  $file2 = "www\tunisie-judo.org/photoid/". $row['photoid'];

//clearstatcache($clear_realpath_cache = true, $file2);
$ren = $row['obs'];
if ($ren <> "") {$phott =$ren; }
else {$phott =$row['n_lic']; }

if ($ren <> "") {
?>
	<tr bgcolor="#00FF66">
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

<?php 

if ($ren <> "") {
 $phott = $row['photo'];
 ?>
	  <td><img src="./photo/<?php echo $phott;?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><img src="./photoid/<?php echo $phott;?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><img src="./photobor/<?php echo $saison;?>/<?php echo $phott;?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><img src="./photoeng/<?php echo $saison;?>/<?php echo $phott;?>?<?php echo time(); ?>" width="33" height="50"></div></td>
      <?PHP 
	  }
else {
 ?>
	  <td><img src="./photot/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><img src="./photoidt/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><img src="./photobor/<?php echo $saison;?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="33" height="50"></div></td>
	  <td><img src="./photoeng/<?php echo $saison;?>/<?php echo $phott.".jpg";?>?<?php echo time(); ?>" width="33" height="50"></div></td>
      <?PHP 
	  }
	?> 
<td>
   <?PHP   if (($club == "ADMIN")or($club == "Admin")or($club == "admin")) { ?>
     
        <div align="center"><a href ='licenceverif.php?naiss<?php echo "=$row[date_naiss]";?>&club<?php echo "=$row[club]";?>&club1<?php echo "=$club";?>&nom<?php echo "=$row[nom]";?>&prenom<?php echo "=$row[prenom]";?>&code<?php echo "=$row[n_lic]";?>&cin<?php echo "=$row[cin]";?>'><b>Verifier</b></a>
      <?PHP  } else {
if (($club <> "CENTRE")and($club <> "Centre")and($club <> "centre") and ($club <> "NORD")and($club <> "Nord")and($club <> "nord") and ($club <> "SUD")and($club <> "Sud")and($club <> "sud")and($club <> "dtn")and($club <> "DTN")and($club <> "Dtn")) {		  
		  
		  
		  ?>       
        <div align="center"><a href ='updathleteverif.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$club";?>'><b>Modifier</b></a>
	
      <?PHP  } }
?>	  
	  
        
        </td>
        <td><?PHP 
      if ($club==$row['club']) { ?>
     
        <a href ='delathletes.php?code<?php echo "=$row[n_lic]";?>&club<?php echo "=$club";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP  } ?>       
        
        </td>
  
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>


</body>

</html>