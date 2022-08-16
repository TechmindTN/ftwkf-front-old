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
<style type="text/css">
.test {
	font-size: 24px;
	font-family: "Times New Roman", Times, serif;
	color: #F00;
	text-align: center;
}
.h {
	color: #0F6;
}
.j {
	color: #0F9;
}
</style>
</HEAD>
<script language="javascript" type="text/javascript">
// You can place JavaScript like this
</script>
<body>
<html>
<style>
.tit{
width:400px;
font-size:18px;
text-align:left;
font-weight:bold; 
}
table {
border: medium solid #000000;
width: 100%;
}
td, th {
border: thin solid #6495ed;
width: 10%;
}
td a {color:#ffffff;}
.cel {
background: #0FF;
color:#000;
font-weight:bold;}
td a:hover {color:#ffffff;}
</style>
<?php
	   	include('connect.php');
$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club=$row['club'];
$id = "";
if (isset($_GET['id'])) {
  $id = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);//
}
if (isset($_POST['id'])) {
  $id = (get_magic_quotes_gpc()) ? $_POST['id'] : addslashes($_POST['id']);
}
 ?>
<table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">
              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>
   <td align="right"><input name="id" type="text" id="id" size="15" value="<?php echo $id;?>"></td>
                   <td align="left">
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

<?php


 if (($id <> '')){
$query1 = "SELECT * FROM athletes WHERE n_lic = '$id' AND club = '$club' order by saison desc";
$result1 = mysql_query($query1,$connexion);
$totalRows = mysql_num_rows($result1);
$row1 = mysql_fetch_assoc($result1);

$dat1 = date("Y/m/d H:i:s") ;
$query ="SELECT saison FROM saison where actif = 1";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$saison = $row[0];


$cin = $row1['cin'];

$nom = $row1['nom'];
$prenom = $row1['prenom'];

$sexe = $row1['sexe'];
$date_naiss = $row1['date_naiss'];

$ligue=$row1['ligue'];
$club = $row1['club'];
$sport = $row1['sport'];
$photo = $row1['photo'];

$nationalite = $row1['nationalite'];

$photo = $row1['photo'];
$photoid = $row1['photoid'];
$date_saisie = $dat1;
$jour = substr("$date_naiss", 8, 2);
$mois = substr("$date_naiss", 5, 2);
$annee = substr("$date_naiss", 0, 4);

$query2 ="SELECT * FROM age";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);
$age = "_";

$jours1= substr("$saison", 5, 4) - $annee;



do {
	$dsup = $row2['sup'];
	$dinf = $row2['min'];

if (($jours1>=$dinf) and ($jours1<=$dsup)) {
	$age=$row2['cat'];
}
	
	}while	 ($row2=mysql_fetch_assoc($result2)); 

if (($totalRows > 0)){
?>
<form action="addrenouv.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="" rowspan="2" align="left">Nom</td>
      <td width="" rowspan="2" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
      <td width="" rowspan="2" align="left">Prénom </td>
      <td width="" rowspan="2" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
      <td width="12%" rowspan="2" align="left">Date de Naissance</td>
      <td width="4%" align="center">Jours</td>
      <td width="4%" align="center">Mois</td>
      <td width="6%" align="center">Années</td>
      <td width="8%" rowspan="2" align="left">Discipline</td>
      <td width="4%" rowspan="2" align="center"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $sport;?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
    </tr>

    <tr>
      <td align="center"><input name="jour" type="text" id="jour" tabindex="3" size="4" maxlength="2" value ="<?php echo $jour;?>"></td>
      <td align="center"><input name="mois" type="text" id="mois" tabindex="4" size="4" maxlength="2" value ="<?php echo $mois;?>"></td>
      <td align="left"><input name="annee" type="text" id="annee" tabindex="5" size="8" maxlength="4" value ="<?php echo $annee;?>"></td>
    </tr>
       </table>
<table width="100%" border="0">
    <tr>
      <td width="" align="left">N° CIN </td>
      <td width="" align="left"><input name="cin" type="text" id="cin" tabindex="7" size="25" value ="<?php echo $cin;?>"></td>
      <td width="" align="left">Sexe</td>
      <td width="" align="left"><select name="sexe" size="1" id="sexe" tabindex="9">
        <option><?php echo $sexe;?></option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select></td>
      <td width="" align="left">Nationalité</td>
      <td colspan="10" align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value ="<?php echo $nationalite;?>"></td>
      <td width="" colspan="3" align="center">&nbsp;</td>
    </tr>
        </table>
<table width="100%" border="0">

 
    <tr>
      <td align="left">Photo</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="10"></td>
      <td align="left">Identité</td>
      <td align="left"><input name="photoid" type="file" id="photoid" size="1" tabindex="11"></td>
	  <td>Bordereau</td>
      <td colspan="10" align="left"><input name="photobor" type="file" id="photobor" size="1" tabindex="11"></td>
	  <td>Eng Parentale</td>
      <td colspan="4" align="left"><input name="photoeng" type="file" id="photobor" size="1" tabindex="12"></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photo/<?php echo $photo;?>" width="33" height="50"></td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photoid/<?php echo $id. ".jpg";?>" width="33" height="50"></td>
       <td>&nbsp;</td>
      <td align="left"><img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
     <td>&nbsp;</td>
      <td align="left"><img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
    </tr>
  </table>
<input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $photo;?>">
      <input name="aphotoid" type="hidden" id="aphotoid" size="1" value ="<?php echo $photoid;?>">
       <input name="aphotobor" type="hidden" id="aphoto" size="1" value ="<?php echo $code. ".jpg";?>"></td>
      <input name="aphotoeng" type="hidden" id="aphoto" size="1" value ="<?php echo $code. ".jpg";?>"></td>
     <input name="ligue" type="hidden" id="ligue" size="1" value ="<?php echo $ligue;?>">
      <input name="date_saisie" type="hidden" id="date_saisie" size="1" value ="<?php echo $dat1;?>">
       <input name="age" type="hidden" id="age" size="1" value ="<?php echo $age;?>">
       <input name="saison" type="hidden" id="age" size="1" value ="<?php echo $saison;?>">
       <input name="lic" type="hidden" id="age" size="1" value ="<?php echo $id;?>">

     
      
      


  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>

<?php
}else 
{echo "verifier le numero de licence";
	}}

 ?>

  </body>
</html>