<?php
session_start();
////$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];

//$_SESSION['club'] = $club2;

 if ($club == null) {$club = $club2;}
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
<div align="center" class="style2"> Liste des Athletes</div>

 <div align="center">
   <?PHP 
	   	include('connect.php');
 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];
if ($saison1 == "") {$saison1 = $saison;}
$query01 ="SELECT saison FROM athletes group by saison order by saison";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);


    if (($club=="admin")or($club=="ADMIN")or($club=="Admin") or ($club == "CENTRE")or($club == "Centre")or($club == "centre") or ($club == "NORD")or($club == "Nord")or($club == "nord") or ($club == "SUD")or($club == "Sud")or($club == "sud")) {
	?>
   <div align="center">
   <a href ='liste.php'><b>Exporter</b></a>
   
   <?php
	
	}
if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
if (($club=="dtn")or($club=="DTN")or($club=="Dtn")) {$query1 ="SELECT club from athletes where saison = '$saison1' group by club order by club";}	 
	 

$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

	  ?>
   
   
 </div>
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

 
 
      <?PHP // } 
	  $query ="SELECT * FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$actif=$row['actif'];


$query ="SELECT * FROM athletes where club = '$club' and saison = '$saison1'";

if (($club == "ADMIN")or($club == "admin")or($club == "Admin")or($club == "dtn")or($club == "DTN")or($club == "Dtn")){
if ($club1 <> "") {$query ="SELECT * FROM athletes where club = '$club1' and saison = '$saison1'";}
if ($club1 == "") {$query ="SELECT * FROM athletes where saison = '$saison1'";}
}




$result = mysql_query($query,$connexion);
$totalRows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
?>       
<br>
<?PHP
if (($club == "ADMIN")) {?>
<p align="center"><a href="athletes1.php">Ajout</a></p>
<?PHP
}

if (($actif == "1") and ($club <> "ADMIN")) {?>
<p align="center"><a href="athletes.php?club<?php echo "=$club";?>">Ajout</a>-----------<a href="rechathlete.php?club<?php echo "=$club";?>">Renouvellement</a></p>
<?PHP
}?>

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
		<td> <div align = "center"> <strong> Photo </strong></div></td>
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
	  <td><div align="center">
      
 
       <?php 
	   $extension = strrchr($row['photo'], ".") ;
	   $nphot = strstr($row['photo'], ".",true) ;
$filename = './photo/'.$nphot.'.jpg';
if (file_exists($filename)) {
 ?>
      <img src="./photo/<?php echo $nphot.".jpg";?>?<?php echo time(); ?>" width="66" height="100"></div>
<?php } 
 else {
$filename = './photo/'.$nphot.'.JPG';

if (file_exists($filename)) {
 ?>
      <img src="./photo/<?php echo $nphot.".JPG";?>?<?php echo time(); ?>" width="66" height="100"></div>
<?php } }
  
 ?>

 
 
 
    </td>
      <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <div align="center"><a href ='updathletes.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&club<?php echo "=$club";?>'><b>Modifier</b></a>
      <?PHP  } ?>       
        
        </td>
        <td><?PHP 
      if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <a href ='delathlete.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP  } ?>       
        
        </td>
  
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

<?php
//if ((($pers == null)and ($federation != "المركز الوطني لإعداد النخبة") and ($federation != "المراكز الإقليمية")) or ($tache =="ممرن وطني")){ 
?>
<?PHP
if (($actif == "1")) {?>
<p align="center"><a href="athletes.php">Ajout</a>-----------<a href="rechathlete.php">Renouvellementl</a></p>
<?PHP
}?>
<?php
//}else{ 
?>
<?php
//} 
?>

</body>

</html>