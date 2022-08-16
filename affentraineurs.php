<?php
session_start();
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
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
<div align="center" class="style2">Lidte des Entaineurs à Valider</div>
<p align="center">&nbsp;</p>

<?php 
	   	include('connect.php');
$query01 ="SELECT saison FROM entraineurs group by saison order by saison";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_assoc($result01);


 $club1 = "";
 $saison1 = "";
if (isset($_POST['club'])) {
  $club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);
}
if (isset($_POST['sais'])) {
  $saison1 = (get_magic_quotes_gpc()) ? $_POST['sais'] : addslashes($_POST['sais']);
}
$query001 ="SELECT club FROM entraineurs where saison like '%$saison1%' group by club order by club";
$result001 = mysql_query($query001,$connexion);
$row001 = mysql_fetch_assoc($result001);
?>

<table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">

              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>

                   <td align="right"> Club </td>
   <td align="left" width="25%"><select name="club" size="1" id="club" tabindex="9">
     <option><?php echo $club1;?> </option>
     <?php
					   do { 
                                     $res=$row001['club'];
                                      echo "<option >$res</option>";
                       } while ($row001 = mysql_fetch_assoc($result001));
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
 <?PHP     if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <div align="center">
        <div align="center">
      <?PHP  } ?>       


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
		<td ></td>
	</tr>
<?php


$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];

$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

if ($saison1 == "") {$saison1 = $saison;}



if (($club == "ADMIN")or($club == "admin")or($club == "Admin")){
$query ="SELECT * FROM entraineurs where saison = '$saison1' and club like '%$club1%' ";
}else{
$query ="SELECT * FROM entraineurs where club = '$club' and saison = '$saison1'";
}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {
$lic = $row['n_lic'];
$type = $row['type'];
$etat = $row['etat'];
$query00 ="SELECT * FROM entraineurs where saison = '$saison' and n_lic = '$lic' and type = '$type'";
$result00 = mysql_query($query00,$connexion);
$totalRows = mysql_num_rows($result00);
$obs = $row['obs'];
if ($obs == 0){
if ($type == "ممرن"){ $uploaddir ='entrt/' ; }
if ($type == "مسير"){ $uploaddir ='dirt/' ; }
if ($type == "حكم"){ $uploaddir ='arbt/' ; }
if ($type == "منشط"){ $uploaddir ='animt/' ; }
if ($type == "مرافق"){ $uploaddir ='acct/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='entrft/' ; }
}
else{
if ($type == "ممرن"){ $uploaddir ='entr/' ; }
if ($type == "مسير"){ $uploaddir ='dir/' ; }
if ($type == "حكم"){ $uploaddir ='arb/' ; }
if ($type == "منشط"){ $uploaddir ='anim/' ; }
if ($type == "مرافق"){ $uploaddir ='acc/' ; }
if ($type == "مدرب فدرالي"){ $uploaddir ='entrf/' ; }
}

if ($etat == "1") {
?>
<tr>
<?php }?>

    <td><div align="center"><?php echo $row['saison'];?></div></td>
    <td><div align="center"><?php echo $lic;?></div></td>
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
      
    <td><?PHP 
  //    if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
      <div align="center"><a href ='updentraineurs.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><b>Modifier</b></a>
      <?PHP // } ?>       
        
      </td>



<td>
   <?PHP   if (($club == "ADMIN")) { ?>
     
        <div align="center"><a href ='entraineurvalid.php?sais<?php echo "=$row[saison]";?>&type<?php echo "=$row[type]";?>&code<?php echo "=$row[n_lic]";?>'><b>Valider</b></a>
      <?PHP  } 
?>	  
	  
        
      </td>



      <td><?PHP 
      //if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) { ?>
     
        <a href ='delentraineurs.php?code<?php echo "=$row[n_lic]";?>&saison<?php echo "=$row[saison]";?>&fonct<?php echo "=$row[type]";?>'><img src="sup.png" width="16" height="16"></a>
      <?PHP //  } ?>       
        
      </td>
  
  </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

<?php
//if ((($pers == null)and ($federation != "المركز الوطني لإعداد النخبة") and ($federation != "المراكز الإقليمية")) or ($tache =="ممرن وطني")){ 
?>
<p align="center"><a href="entraineur.php">Ajout</a></p>
<?php
//}else{ 
?>
<?php
//} 
?>

</body>

</html>