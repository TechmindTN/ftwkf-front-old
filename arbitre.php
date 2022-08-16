<?php
session_start();
	include('connect.php');
$club = $_SESSION['club'];
$cin = $_SESSION['cin'];
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



 <form action="addarbitre.php" method="post" enctype="multipart/form-data" name="MForm" onSubmit="return verif_formulaire()">
  <table width="100%" border="0">
    <tr>
      <td width="16%" align="left">Nom</td>
      <td width="19%" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25"></td>
      <td width="13%" align="left">Prénom </td>
      <td width="18%" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25"></td>
      <td width="15%" align="left">Sexe</td>
      <td width="19%" align="left"><select name="sexe" size="1" id="sexe" tabindex="13">
        <option> </option>        <option>ذكر</option>
        <option>أنثى</option>
</select></td>
    </tr>
    <tr>
      <td align="left">Discipline</td>
      <td align="left"><select name="sport" size="1" id="sport" tabindex="6">
        <option></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
      <td align="left">Grade</td>
      <td align="left"><select name="grade" size="1" id="grade" tabindex="12">
                <option>-</option>
       <option>DAN1</option>
        <option>DAN2</option>
        <option>DAN3</option>
        <option>DAN4</option>
        <option>DAN5</option>
        <option>DAN6</option>
        <option>DAN7</option>
      </select></td>
      <td align="left">Degre</td>
      <td align="left"><select name="degre" size="1" id="degre" tabindex="9">
        <option>-</option>
        <option>مدرب فدرالي</option>
        <option>درجة اولى</option>
        <option>درجة ثانية</option>
        <option>درجة ثالثه</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Grade Arbitrage</td>
      <td align="left"><select name="gradear" size="1" id="degre2" tabindex="9">
        <option>-</option>
        <option>درجة اولى</option>
        <option>درجة ثانية</option>
        <option>درجة ثالثه</option>
        <option>جهوي</option>
        <option>مغاربي</option>
        <option>قاري</option>
        <option>إفريقي</option>
        <option>دولي</option>
      </select></td>
      <td align="left">Type </td>
      <td align="left"><select name="type" size="1" id="type" tabindex="14">
        <option>حكم</option>
      </select></td>
      <td align="left">Date Naissance</td>
      <td align="left"><input name="naiss" type="date" id="naiss" tabindex="1" size="15"></td>
    </tr>
    <tr>
      <td align="left">CIN</td>
      <td align="left"><input name="cin" type="text" id="nom2" tabindex="1" size="25" value="<?php echo $cin;?>"></td>
      <td align="left">Photo</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="15"></td>
      <td align="left">Diplome</td>
      <td align="left"><input name="photo2" type="file" id="diplome" size="1" tabindex="15"></td>
    </tr>
       </table>
<table width="100%" border="0">
    </table>
<p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
 
</body>

</html>
