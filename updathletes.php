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

<?php	 }?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
function TryCallFunction() {
	var sd = document.MForm.txt_mydate.value.split("\/");
	document.MForm.txt_mymonth.value = sd[0];
	document.MForm.txt_myday.value = sd[1];
	document.MForm.txt_myyear.value = sd[2];
}

function submitdnld() {
	document.form1.submit();
}
</script>
<script language="JavaScript" type="text/javascript">
<!--


function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<link href="Calendar.css" rel="stylesheet" type="text/css" />
<link href="../../styles/default.css" rel="stylesheet" type="text/css" />
<meta name="Keywords" content="Popup Date Picker, Softricks Javascript Calendar" />
<meta name="Description" content="Softricks Javascript Popup date picker calendar. The most versatile and feature-packed popup calendar for taking date inputs on the web." />
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
</style></HEAD>

<BODY>
<?php
	include('connect.php');
$code=$_GET['code'];
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];

$query ="select * FROM `athletes` where `n_lic` = '$code' and saison = '$saison'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$date_naiss = $row['date_naiss'];
$jour=substr("$date_naiss", 8, 2);
$mois=substr("$date_naiss", 5, 2);
$annee= substr("$date_naiss", 0, 4);

?>

<div align="center" class="style2">Modification des Athlètes </div>

 <form action="addathletes.php" method="post" enctype="multipart/form-data" name="MForm">
  <p align="center">
  
  <table width="100%" border="0">
    <tr>
      <td width="" rowspan="2" align="left">Nom</td>
      <td width="" rowspan="2" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $row['nom'];?>"></td>
      <td width="" rowspan="2" align="left">Prénom </td>
      <td width="" rowspan="2" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $row['prenom'];?>"></td>
      <td width="12%" rowspan="2" align="left">Date de Naissance</td>
      <td width="4%" align="center">Jours</td>
      <td width="4%" align="center">Mois</td>
      <td width="6%" align="center">Années</td>
      <td width="8%" rowspan="2" align="left">Discipline</td>
      <td width="4%" rowspan="2" align="center"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $row['sport'];?></option>        <option></option>
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
      <td width="" align="left"><input name="cin" type="text" id="cin" tabindex="7" size="25" value ="<?php echo $row['cin'];?>"></td>
      <td width="" align="left">Sexe</td>
      <td width="" align="left"><select name="sexe" size="1" id="sexe" tabindex="9">
        <option><?php echo $row['sexe'];?></option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select></td>
      <td width="" align="left">Nationalité</td>
      <td align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value ="<?php echo $row['nationalite'];?>"></td>
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
      <td align="left"><input name="photobor" type="file" id="photobor" size="1" tabindex="11"></td>
	  <td>Eng Parentale</td>
      <td align="left"><input name="photoeng" type="file" id="photobor" size="1" tabindex="11"></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photot/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photoidt/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" alt="" width="33" height="50"></td>

    </tr>
  </table>


<p align="center">
      <input name="club" type="hidden" id="clubb" size="1" value ="<?php echo $club;?>">
      <input name="clubb" type="hidden" id="clubb" size="1" value ="<?php echo $row['club'];?>">
      <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['n_lic'];?>">
      <input name="aphotoid" type="hidden" id="aphotoid" size="1" value ="<?php echo $row['photoid'];?>">
      <input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $row['photo'];?>">
      <input name="aphotobor" type="hidden" id="aphoto" size="1" value ="<?php echo $code. ".jpg";?>">
      <input name="aphotoeng" type="hidden" id="aphoto" size="1" value ="<?php echo $code. ".jpg";?>">

      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
</body>

</html>
