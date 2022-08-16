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
<BODY>

<body>

<?php 
	   	include('connect.php');
$id = $_GET['code'];
$query ="SELECT cat FROM param group by cat order by cat";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$query1 ="SELECT * FROM programme where id = '$id'";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

if ($row1['qualif'] == 0) { $niveau ="Final Directe";}
if ($row1['qualif'] == 1) { $niveau ="Eliminatoire";}
if ($row1['qualif'] == 2) { $niveau ="Final Après Eliminatoire";}

?>


<form action="addprogramme.php" method="post" enctype="multipart/form-data" name="MForm">
  <table width="100%" border="0">
     <tr>
      <td width="95"  align="left">Competition</td>
      <td colspan="3"  align="left"><input name="action" type="text" id="action" tabindex="1" size="70" value="<?php echo$row1['action'];?>"></td>
      <td align="left">Discipline</td>
      <td align="left"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $row1['sport'];?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option><option>الدفاع عن النفس بودو</option><option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
      <td width="55" align="left">Lieu</td>
      <td width="150" align="left"><input name="lieu" type="text" id="lieu" tabindex="3" size="25" value="<?php echo$row1['lieu'];?>"></td>
    </tr>
    <tr>
      <td  align="left">Années</td>
     
      
      <td width="131"  align="left"><input name="annee" type="text" id="annee" tabindex="12" size="15"  value="<?php echo $row1['saison'];?>"></td>
      <td width="60"  align="left">Niveau</td>
      <td width="194"  align="left"><select name="niveau" size="1" id="niveau" tabindex="5" >
        <option selected><?php echo $niveau;?></option>
        <option>Eliminatoire</option>
        <option>Final Directe</option>
        <option>Final Après Eliminatoire</option>
      </select></td>
      <td width="36" align="left">Date</td>
      <td width="105" align="left"><input name="date" type="date" id="date" tabindex="6" size="15"  value="<?php echo  $row1['date_debut'];?>"></td>
      <td align="left">Deadline</td>
      <td align="left"><input name="delais" type="date" id="delais" tabindex="12" size="15"  value="<?php echo $row1['delais'];?>"></td>
    </tr>
    <tr>
      <td  align="left">Type</td>
      <td  align="left"><select name="type" size="1" id="type2" tabindex="5"  value="">
        <option selected><?php echo $row1['type'];?></option>
<option>كطا</option>
        <option>فردي</option>
      </select></td>
      <td  align="left">Age</td>
      <td  align="left"><select name="cat" size="1" id="type" tabindex="2">
        <option selected> <?php echo $row1['age'];?></option>
        <?php     do { 
                                     $res=$row['cat'];
                                      echo "<option >$res</option>";
 }while	 ($row=mysql_fetch_assoc($result));?>
      </select></td>
      <td align="left">Min</td>
      <td align="left"><input name="min" type="text" id="min" tabindex="12" size="15"  value="<?php echo $row1['min'];?>"></td>
      <td align="left">Max</td>
      <td align="left"><input name="max" type="text" id="max" tabindex="12" size="15"  value="<?php echo $row1['max'];?>"></td>
    </tr>
    </table>
  <input name="id" type="hidden" id="id" tabindex="12" size="15"  value="<?php echo $id;?>">
  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
</body>

</html>
