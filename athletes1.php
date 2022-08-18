


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" >
<HEAD>
<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
</HEAD>
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


$query1 ="SELECT club from clubb group by club order by club";	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$queryl ="SELECT ligue from clubb group by ligue order by ligue";	 
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);
$querys ="SELECT saison from clubb group by saison order by saison";	 
$results = mysql_query($querys,$connexion);
$rows = mysql_fetch_assoc($results);

?>
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
</HEAD>

<BODY>
<div id="wrapper">

            <!-- Sidebar -->
            <div id='side'></div>
            <div class="row">
            <div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>

<div class="style2">إضافة رياضيين</div>
<form action="addathlete1.php" method="post" enctype="multipart/form-data" name="MForm">

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
        <option>هابكيدو</option>
        <option>الكيسندو</option></select></td>
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
      <td align="left">النادي</td>
      <td align="left"><select name="club2" size="1" id="club" tabindex="9">
        <option><?php echo $club1;?></option>
        <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>
      <td align="left">الرابطة</td>
      <td align="left"><select name="ligue" size="1" id="ligue" tabindex="9" >
        <option><?php echo $ligue;?></option>
        <option> </option>
        <?php
					   do { 
                                     $res=$rowl['ligue'];
                                      echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
      </select></td>
	  <td>الموسم</td>
      <td align="left"><select name="sais" size="1" id="sais" tabindex="9" onChange="document.stat.submit();">
        <option><?php echo $saison1;?></option>
        <?php
					   do { 
                                     $res=$rows['saison'];
                                      echo "<option >$res</option>";
                       } while ($rows = mysql_fetch_assoc($results));
?>
      </select></td>
	  <td>رقم الإجازة</td>
      <td align="left"><input name="lic" type="text" id="prenom2" tabindex="2" size="25" value =""></td>
    </tr>
  </table>

<input name="club" type="hidden" id="cin" tabindex="10" size="25" value ="<?php echo $club ; ?> ">
  <p align="center">
      <input type="submit" name="valider" id="valider" value="تسجيل">
  </p>
</form>
</div>
</div>

<!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <script src="template.js"></script>
</body>

</html>
