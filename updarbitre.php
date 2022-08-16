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

<?php	 } ?>
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
$saison=$_GET['saison'];
$fonct=$_GET['fonct'];

$query ="select * FROM `entraineur` where `n_lic` = '$code' and saison = '$saison' and type = '$fonct'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$type = $row['type'];
if ($type == "ممرن"){ $uploaddirp ='./photoentr/' ; }
if ($type == "مسير"){ $uploaddirp ='./photodir/' ; }
if ($type == "حكم"){ $uploaddirp ='./photoarb/' ; }
if ($type == "منشط"){ $uploaddirp ='./photoanim/' ; }
if ($type == "مرافق"){ $uploaddirp ='./photoacc/' ; }

if ($type == "ممرن"){ $uploaddird ='./diplomeentr/' ; }
if ($type == "مسير"){ $uploaddird ='./diplomedir/' ; }
if ($type == "حكم"){ $uploaddird ='./diplomearb/' ; }
if ($type == "منشط"){ $uploaddird ='./diplomeanim/' ; }
if ($type == "مرافق"){ $uploaddird ='./diplomeacc/' ; }

?>


 <form action="addarbitre.php" method="post" enctype="multipart/form-data" name="MForm">
  <table width="100%" border="0">
    <tr>
      <td width="11%" align="left">Nom</td>
      <td width="14%" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $row['nom'];?>"></td>
      <td width="7%" align="left">Prénom </td>
      <td width="19%" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $row['prenom'];?>"></td>
      <td width="4%" align="left">Sexe</td>
      <td width="4%" align="left"><select name="sexe" size="1" id="sexe" tabindex="13">
        <option><?php echo $row['sexe'];?></option>        <option>ذكر</option>
        <option>أنثى</option>
</select></td>
    </tr>
    <tr>
      <td align="left">Discipline</td>
      <td align="left"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $row['sport'];?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
      <td align="left">Grade</td>
      <td align="left"><select name="grade" size="1" id="grade" tabindex="12">
        <option> <?php echo $row['grade'];?></option>        <option>DAN1</option>
        <option>DAN2</option>
        <option>DAN3</option>
        <option>DAN4</option>
        <option>DAN5</option>
        <option>DAN6</option>
      </select></td>
      <td align="left">Degre</td>
      <td align="left"><select name="degre" size="1" id="degre" tabindex="9">
        <option><?php echo $row['degre'];?> </option>
        <option>مدرب فدرالي</option>
        <option>درجة اولى</option>
        <option>درجة ثانية</option>
        <option>درجة ثالثه</option>
      </select></td>
    </tr>
    <tr>
      <td align="left">Grade Arbitrage</td>
      <td align="left"><select name="gradear" size="1" id="degre2" tabindex="9">
        <option><?php echo $row['arbitrage'];?></option>
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
      <td align="left">Type</td>
      <td align="left"><select name="type" size="1" id="type" tabindex="9">
        <option><?php echo $row['type'];?></option>
      </select></td>
      <td align="left">Date Naissance</td>
      <td align="left"><input name="naiss" type="date" id="naiss" tabindex="1" size="15" value="<?php echo $row['naiss'];?>"></td>
    </tr>
    <tr>
      <td align="left">CIN</td>
      <td align="left"><input name="cin" type="text" id="cin" tabindex="1" size="25" value ="<?php echo $row['cin'];?>"></td>
      <td align="left">Photo</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="15"></td>
      <td align="left">Diplome</td>
      <td align="left"><input name="diplome" type="file" id="diplome" size="1" tabindex="15"></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="<?php echo $uploaddirp . $row['photo'];?>" width="33" height="50"></td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="<?php echo $uploaddird .$row['photo'];?>" width="33" height="50"></td>
    </tr>
       </table>
<table width="100%" border="0">
    </table>

  <p align="center">
      <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['n_lic'];?>">
      <input name="aphoto" type="hidden" id="aphoto" tabindex="100" size="0" value ="<?php echo $row['photo'];?>">
      <input name="adiplome" type="hidden" id="adiplome" tabindex="100" size="0" value ="<?php echo $row['photo'];?>">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
</body>

</html>
