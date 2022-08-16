<?php
session_start();
$login = $_SESSION['login'];
 if ($login == null) {
?>	 
<script type="text/javascript">
window.location.href="index.html";
</script>

<?php	 }
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="rtl">
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
.bleu {
	color: #00F;
}
</style>
</HEAD>
<script language="javascript" type="text/javascript">
function somme(theForm)
{
var quantite = document.forms[1].quantite.value;
var punit = document.forms[1].punit.value;
var tva = document.forms[1].tva.value;
var remise = document.forms[1].remise.value;


if (document.forms[1].quantite.value == ''){ quantite = '0';}
if (document.forms[1].punit.value == ''){ punit = '0';}
if (document.forms[1].tva.value == ''){ tva = '0';}
if (document.forms[1].remise.value == ''){ remise = '0';}

document.forms[1].totht.value = (parseFloat(quantite) * parseFloat(punit) * (1- parseFloat(remise)/100)) ;
document.forms[1].totalttc.value = (parseFloat(document.forms[1].totht.value) * (1 + parseFloat(tva)/100)) ;

}
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


$date1 = date('Y-m-d');
$date = " ";
if (isset($_POST['date'])) {
  $date = (get_magic_quotes_gpc()) ? $_POST['date'] : addslashes($_POST['date']);
  $date1 = (get_magic_quotes_gpc()) ? $_POST['date'] : addslashes($_POST['date']);
  }
 if (isset($_POST['num'])) {$num = (get_magic_quotes_gpc()) ? $_POST['num'] : addslashes($_POST['num']);}
 if (isset($_POST['exp'])) {$exp = (get_magic_quotes_gpc()) ? $_POST['exp'] : addslashes($_POST['exp']);}
 if (isset($_POST['obj'])) {$obj = (get_magic_quotes_gpc()) ? $_POST['obj'] : addslashes($_POST['obj']);}
 if (isset($_POST['date1'])) {$date1 = (get_magic_quotes_gpc()) ? $_POST['date1'] : addslashes($_POST['date1']);}




$annee = substr("$date1", 0, 4);	

$query = "SELECT max(num_arrivee)as num from arrivee WHERE annee = '$annee'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$num=$row['num']+1;

?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="7" class="text">

        <tr>
          <td>
              <table border="0" width="100%"  cellspacing="1" cellpadding="4" class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
    <tr>
	    <td ><div align="center"><strong>التاريخ</strong></div></td>
	    <td ><div align="center"><strong>العدد</strong></div></td>
	    <td ><div align="center"><strong>المرسل</strong></div></td>
		<td ><div align="center"><strong>الموضوع</strong></div></td>
	    <td ><div align="center"><strong>الملف</strong></div></td>
     </tr>
    <tr>
    	<form name="refr" method="post" action="" ><td ><input name="date1" type="date" id="article1" value="<?php echo $date1; ?>" onChange="document.refr.submit();"></td></form><form name="stat" method="post" action="arrivee.php" enctype="multipart/form-data" >
    	<td ><input name="date" type="hidden" id="article" size="5" value="<?php echo $date1; ?>">
             <input name="num" type="text" id="article" size="10" value="<?php echo $num; ?>" ></td>
    	<td ><input name="exp" type="text" id="article" size="30"></td>
        <td ><input name="obj" type="text" id="famille" size="30"></td>
        <td ><input name="photo" type="file" id="photo" size="1" tabindex="15"></td>


                </tr>
                <tr>
                  <td colspan="5" ><div align="center">
<input name="ok" type="submit" class="Style4" value="إضافة"></div>
                  </td>
                </tr>
              </table>
          </form></td>
        </tr>
</table>

<?php
 if (($date <> ' ')){
 if (($date == '')){$date = date('Y-m-d');}
$query1 = "insert into arrivee  (`annee` ,`date` ,`expediteur` ,`objet`  ,`num_arrivee` ) values  ('$annee','$date','$exp','$obj','$num')";
$resultat1 = mysql_query($query1, $connexion) or die(mysql_error());

$photo ='';
$extension = strrchr($_FILES['photo']['name'], ".") ;
if ((($extension == '.pdf')or($extension == ".PDF"))) {
$photo = $annee.$num.'.pdf';
$uploaddir ='./arrivee/';
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}

?>
  <script type="text/javascript">
window.location.href="arrivee.php?login<?php echo "=$login"; ?>";
  </script>
<?php }

?>


<p align="center"><strong>الواردات</strong></p>

  <table width="100%" border="1">
    <tr>
	    <td ><div align="center"><strong>التاريخ</strong></div></td>
	    <td ><div align="center"><strong>العدد</strong></div></td>
	    <td ><div align="center"><strong>المرسل</strong></div></td>
		<td ><div align="center"><strong>الموضوع</strong></div></td>
		<td ><div align="center"><strong>الإدارة المعنية</strong></div></td>
		<td ><div align="center"><strong>الحالة</strong></div></td>
    </tr>
<?php 
$query11 ="SELECT * FROM arrivee  order by date DESC";
$result11 = mysql_query($query11,$connexion);
$row11 = mysql_fetch_assoc($result11);
do {

?>
   <tr>
	  <td><div align="center"><?php echo $row11['date'];?></div></td>
	  <td><div align="center"><?php echo $row11['num_arrivee'];?></div></td>
	  <td><div align="center"><?php echo $row11['expediteur'];?></div></td>
	  <td><div align="center"><?php echo $row11['objet'];?></div></td>
	  <td><div align="center"><?php echo $row11['direction'];?></div></td>
	  <td><div align="center"><?php echo $row11['etat'];?></div></td>
   </tr>
<?php
					}while	 ($row11=mysql_fetch_assoc($result11)); 
 ?>
</table>

  </body>
</html>