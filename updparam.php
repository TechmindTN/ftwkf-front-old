
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
	include('connect.php');
	
$code=$_GET['code'];
$query ="select * FROM `param` where `id` = '$code'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

?>
<div align="center" class="style2">Modification Poids</div>

 <form action="addparam.php" method="post" enctype="multipart/form-data" name="MForm">
  <table width="100%" border="0">

    <tr>
      <td width="16%" align="left">Age</td>
      <td width="19%" align="left"><input name="age" type="text" id="age" tabindex="2" size="25" value ="<?php echo $row['cat'];?>"></td>
    </tr>

    <tr>
      <td align="left">Type</td>
      <td  align="left"><select name="type" size="1" id="type2" tabindex="5">
        <option><?php echo $row['type'];?> </option><option>كطا</option>
        <option>فردي</option>
      </select></td>
    </tr>


    <tr>
      <td align="left">Sexe</td>
      <td align="left"><select name="sexe" size="1" id="sexe" tabindex="3">
        <option><?php echo $row['sexe'];?> </option>        <option>ذكر</option>
        <option>أنثى</option>
</select></td>
    </tr>
    <tr>
      <td align="left">Ordre</td>
      <td align="left"><input name="ord" type="text" id="ord" tabindex="7" size="25" value="<?php echo $row['ordre'];?>"></td>
    </tr>
    <tr>
      <td align="left">Poids</td>
      <td align="left"><input name="poids" type="text" id="poids" tabindex="8" size="25" value="<?php echo $row['poids'];?>"></td>
    </tr>



    </table>
  <p align="center">
      <input name="id" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['id'];?>">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
</body>

</html>
