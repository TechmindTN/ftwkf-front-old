<?php
session_start();
	include('connect.php');
//$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="index.html";
</script>

<?php	 }

$query ="SELECT club FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$club = $row['club'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="rtl">
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
<script language="JavaScript" src="verif.js" type="text/javascript"></script> 

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

function verif()
{
var nom = document.forms[0].nom.value;
var prenom= document.forms[0].prenom.value;
var nom_e = document.forms[0].nom-e.value;
var prenom_e = document.forms[0].prenom_e.value;
var sexe = document.forms[0].sexe.value;
var date_naissance = document.forms[0].date_naissance.value;
var res = document.forms[0].res.value;
var nat = document.forms[0].nat.value;
var passport = document.forms[0].passport.value;
var date_livr = document.forms[0].date_livr.value;
var date_exp = document.forms[0].date_exp.value;
var qualite = document.forms[0].qualite.value;
var pay = document.forms[0].pay.value;
var photo = document.forms[0].photo.value;
var ppass = document.forms[0].ppass.value;


if (document.forms[0].nom.value == ''){ alert ('hghg')  ;
return false;}

else
  {
document.forms[0].method = "get";
document.forms[0].action = "addathlete.php";
document.forms[0].submit();
  }


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


<div align="center" class="style2">إضافة رياضيين</div>
<form action="addathlete.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="" rowspan="2" align="left">اللقب</td>
      <td width="" rowspan="2" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value =""></td>
      <td width="" rowspan="2" align="left">الاسم </td>
      <td width="" rowspan="2" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value =""></td>
      <td width="12%" rowspan="2" align="left">تاريخ الولادة</td>
      <td width="4%" align="center">يوم</td>
      <td width="4%" align="center">شهر</td>
      <td width="6%" align="center">سنة</td>
      <td width="8%" rowspan="2" align="left">الرياضة</td>
      <td width="4%" rowspan="2" align="center"><select name="sport" size="1" id="sport" tabindex="6">
        <option></option>        
        <option></option>
        <option>وشوكونغ فو</option>
        <option>كمبو</option>
        <option>ديكايتو ريو</option>
        <option>الدفاع عن النفس بودو</option>
        <option>فوفينام فيات فوداو</option>
        <option>فوت وات فان فوداوو و الأنشطة التابعة</option>
        <option>هابكيدو</option><option>الكيسندو</option></select></td>
    </tr>

    <tr>
      <td align="center"><input name="jour" type="text" id="jour" tabindex="3" size="4" maxlength="2" value =""></td>
      <td align="center"><input name="mois" type="text" id="mois" tabindex="4" size="4" maxlength="2" value =""></td>
      <td align="left"><input name="annee" type="text" id="annee" tabindex="5" size="8" maxlength="4" value =""></td>
    </tr>
       </table>
<table width="100%" border="0">
    <tr>
      <td width="" align="left">ب ت و</td>
      <td width="" align="left"><input name="cin" type="text" id="cin" tabindex="7" size="25" value =""></td>
      <td width="" align="left">الجنس</td>
      <td width="" align="left"><select name="sexe" size="1" id="sexe" tabindex="10">
        <option> </option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select></td>
      <td width="" align="left">الجنسية</td>
      <td align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value =""></td>
    </tr>
    </table>
    <table width="100%" border="0">
    <tr>
      <td align="left">الصورة</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="15"></td>
      <td align="left">الهوية</td>
      <td align="left"><input name="photoid" type="file" id="photoid" size="1" tabindex="15"></td>
	  <td>شهادة الطبيب</td>
      <td align="left"><input name="photobor" type="file" id="photobor" size="1" tabindex="15"></td>
	  <td>ترخيص ابوي</td>
      <td align="left"><input name="photoeng" type="file" id="photobor" size="1" tabindex="15"></td>
    </tr>
  </table>

<input name="club" type="hidden" id="cin" tabindex="10" size="25" value ="<?php echo $club ; ?> ">
  <p align="center">
      <input type="submit" name="valider" id="valider" value="تسجيل">
  </p>
</form>
</body>

</html>
