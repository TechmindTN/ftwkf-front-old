<?php
session_start();
//$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
<style type="text/css">
.style2 {	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
.style2 {	color: #0000FF;
	font-weight: bold;
	font-size: 36px;
}
</style>
</HEAD>
<BODY>
<style type="text/css">
<!--
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

<body>
<?php
$club = $_POST['club'];

include('connect.php');
$query ="SELECT club,ligue FROM club where club = '$club'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
$ligue=$row['ligue'];
$club = $row['club'];

$code1 = 0;

if (isset($_POST['cod'])) {
  $code1 = (get_magic_quotes_gpc()) ? $_POST['cod'] : addslashes($_POST['cod']);
}
if ($code1 == 0) {
$query ="select max(n_lic) from `athletess`";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;
}
else {
$code = $code1;
}
$dat1 = date("Y/m/d H:i:s") ;
$query1 ="SELECT saison FROM saison where actif = 1";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_row($result1);
$saison = $row1[0];






$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$date_naissance = $_POST['annee']. "-".$_POST['mois']. "-".$_POST['jour'];
$sport = $_POST['sport'];
$cin = $_POST['cin'];

$nationalite = $_POST['nationalite'];

$query1 ="SELECT * FROM age";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);
$age = "_";

$jours1= substr("$saison", 5, 4) - $annee;
$prix = 0;

do {
	$dsup = $row1['sup'];
	$dinf = $row1['min'];

if (($jours1>=$dinf) and ($jours1<=$dsup)) {
	$age=$row1['cat'];
	
	}
	
	}while	 ($row1=mysql_fetch_assoc($result1)); 

$aphoto ='';
$aphotoid ='';
$aphotobor ='';
$aphotoeng ='';

if (isset($_POST['aphoto'])) {
  $aphoto = (get_magic_quotes_gpc()) ? $_POST['aphoto'] : addslashes($_POST['aphoto']);
}
if (isset($_POST['aphotoid'])) {
  $aphotoid = (get_magic_quotes_gpc()) ? $_POST['aphotoid'] : addslashes($_POST['aphotoid']);
}
if (isset($_POST['aphotobor'])) {
  $aphotobor = (get_magic_quotes_gpc()) ? $_POST['aphotobor'] : addslashes($_POST['aphotobor']);
}
if (isset($_POST['aphotoeng'])) {
  $aphotoeng = (get_magic_quotes_gpc()) ? $_POST['aphotoeng'] : addslashes($_POST['aphotoeng']);
}

$photo ='';
$photoid ='';
$photobor ='';
$photoeng ='';

$extension = strrchr($_FILES['photo']['name'], ".") ;
$extensionid = strrchr($_FILES['photoid']['name'], ".") ;
$extensionbor = strrchr($_FILES['photobor']['name'], ".") ;
$extensioneng = strrchr($_FILES['photoeng']['name'], ".") ;
$size1 = $_FILES['photo']['size'];
$size2 = $_FILES['photoid']['size'];
$size3 = $_FILES['photobor']['size'];
$size4 = $_FILES['photoeng']['size'];

if ((($extension == '.jpg')or($extension == ".JPG"))and ($size1<524288)) {
$photo = $code.'.jpg';
$uploaddir ='./photot/';
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;
$extension = '.jpg';
$size1=1;
}}

if ((($extensionid == '.jpg')or($extensionid == ".JPG"))and ($size2<1024000)) {
$photoid = $code.'.jpg';
$uploaddir ='./photoidt/';
move_uploaded_file($_FILES['photoid']['tmp_name'], $uploaddir.$photoid);
}
else {
if (isset($_POST['aphotoid'])) {
$photoid = $aphotoid;
$extensionid = '.jpg';
$size2=1;}
}

if ((($extensionbor == '.jpg')or($extensionbor == ".JPG"))and ($size3<1024000)) {
$photobor = $code.'.jpg';
$uploaddir ='./photobor/'.$saison . '/';
move_uploaded_file($_FILES['photobor']['tmp_name'], $uploaddir.$photobor);
}
else {
if (isset($_POST['aphotobor'])) {
$photobor = $aphotobor;
$extensionbor = '.jpg';
$size3=1;
}
}
if ((($extensioneng == '.jpg')or($extensioneng == ".JPG"))and ($size4<1024000)) {
$photoeng = $code.'.jpg';
$uploaddir ='./photoeng/'.$saison . '/';
move_uploaded_file($_FILES['photoeng']['tmp_name'], $uploaddir.$photoeng);
}
else {
if (isset($_POST['aphotoeng'])) {
$photoeng = $aphotoeng;
$extensioneng = '.jpg';
$size4=1;
}
}



if (($club <> '')and($nom <> '')and($prenom <> '')and($nationalite <> '')and($jour <> '')and($mois <> '')and($sport <> '')and($sexe <> '')and($annee <> '')and($cin <> '')and($photo <> '')and($photoid <> '')and($photobor <> '')and (($extension == ".jpg") or ($extension == ".JPG"))and (($extensionid == ".jpg") or ($extensionid == ".JPG"))and (($extensionbor == ".jpg") or ($extensionbor == ".JPG")))
{
	if ($code1 == 0) {

$query ="INSERT INTO `athletess` ( `saison` ,`n_lic`, `cin`, `nom`, `prenom` , `sexe` , `date_naiss` , `club` , `ligue`, `age` , `sport`  ,  `photo`,  `photoid` , `date_saisie`, `nationalite` ) 
VALUES ('$saison','$code','$cin','$nom','$prenom', '$sexe', '$date_naissance', '$club', '$ligue', '$age', '$sport',   '$photo', '$photoid', '$dat1', '$nationalite')";
}
else {
$query ="UPDATE `athletess` SET `nom`='$nom', `prenom`='$prenom', `cin`='$cin', `sexe` ='$sexe', `date_naiss`='$date_naissance' , `club`= '$club', `ligue`='$ligue', `age`='$age' , `sport`='$sport'  ,  `photo`='$photo',  `photoid`='$photoid',  `nationalite`='$nationalite'  WHERE (`n_lic`='$code1' and `saison`='$saison')";
}

$result = mysql_query($query,$connexion);
?>
 
<script type="text/javascript">
window.location.href="affathlete.php?club<?php echo "=$club";?>";
</script>

<?php 
}
else 
{
?>
 <div align="center" class="style2">إضافة رياضيين</div>
<form action="addathlete.php" method="post" enctype="multipart/form-data" name="MForm">

  <table width="100%" border="0">
    <tr>
      <td width="" rowspan="2" align="left">الإسم</td>
      <td width="" rowspan="2" align="left"><input name="nom" type="text" id="nom" tabindex="1" size="25" value ="<?php echo $nom;?>"></td>
      <td width="" rowspan="2" align="left">اللقب </td>
      <td width="" rowspan="2" align="left"><input name="prenom" type="text" id="prenom" tabindex="2" size="25" value ="<?php echo $prenom;?>"></td>
      <td width="12%" rowspan="2" align="left">تاريخ الولادة</td>
      <td width="4%" align="center">يوم</td>
      <td width="4%" align="center">شهر</td>
      <td width="6%" align="center">سنة</td>
      <td width="8%" rowspan="2" align="left">الرياضة</td>
      <td width="4%" rowspan="2" align="center"><select name="sport" size="1" id="sport" tabindex="6">
        <option><?php echo $sport;?></option>        <option></option>
        <option>وشوكونغ فو</option><option>كمبو</option><option>ديكايتو ريو</option> <option>فوفينام فيات فوداو</option><option>فوت وات فان فوداوو و الأنشطة التابعة</option><option>هابكيدو</option><option>الكيسندو</option></select></td>
    </tr>

    <tr>
      <td align="center"><input name="jour" type="text" id="jour" tabindex="3" size="4" maxlength="2" value ="<?php echo $jour;?>"></td>
      <td align="center"><input name="mois" type="text" id="mois" tabindex="4" size="4" maxlength="2" value ="<?php echo $mois;?>"></td>
      <td align="left"><input name="annee" type="text" id="annee" tabindex="5" size="8" maxlength="4" value ="<?php echo $annee;?>"></td>
    </tr>
       </table>
<table width="100%" border="0">
    <tr>
      <td width="" align="left">رقم ب ت و</td>
      <td width="" align="left"><input name="cin" type="text" id="cin" tabindex="7" size="25" value ="<?php echo $cin;?>"></td>
      <td width="" align="left">الجنس</td>
      <td width="" align="left"><select name="sexe" size="1" id="sexe" tabindex="9">
        <option><?php echo $sexe;?></option>
        <option>ذكر</option>
        <option>أنثى</option>
      </select></td>
      <td width="" align="left">الجنسية</td>
      <td align="left"><input name="nationalite" type="text" id="nationalite" tabindex="10" size="25" value ="<?php echo $nationalite;?>"></td>
      
    </tr>
     </table>
    <table width="100%" border="0">
   <tr>
      <td align="left">الصورة</td>
      <td align="left"><input name="photo" type="file" id="photo" size="1" tabindex="10"></td>
      <td align="left">الهوية</td>
      <td align="left"><input name="photoid" type="file" id="photoid" size="1" tabindex="11"></td>
	  <td>الالتزام</td>
      <td align="left"><input name="photobor" type="file" id="photobor" size="1" tabindex="15"></td>
	  <td>ترخيص ابوي</td>
      <td align="left"><input name="photoeng" type="file" id="photobor" size="1" tabindex="15"></td>
      
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photo/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td align="left">&nbsp;</td>
      <td align="left"><img src="./photoid/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photobor/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
      <td>&nbsp;</td>
      <td align="left"><img src="./photoeng/<?php echo $saison;?>/<?php echo $code. ".jpg";?>" width="33" height="50"></td>
    </tr>
  </table>
<input name="club" type="hidden" id="cin" tabindex="10" size="25" value ="<?php echo $club ; ?> ">

      <input name="clubb" type="hidden" id="clubb" size="1" value ="<?php echo $club;?>"></td>
      <input name="aphotoid" type="hidden" id="aphotoid" size="1" value ="<?php echo $photoid;?>"></td>
      <input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $photo;?>">
      <input name="aphotobor" type="hidden" id="aphoto" size="1" value ="<?php echo $photobor;?>"></td>

  <p align="center">
      <input type="submit" name="valider" id="valider" value="مشاهدة">
  </p>
</form>
<div align="center" class="style2">الرجاء ملئ جميع البيانات</div>
	
	<?php 
	
	if (($extension <> ".jpg") and ($extension <> ".JPG")){echo "Format d'Image Invalide";?> <br> <?php }
	if (($extensionid <> ".jpg") and ($extensionid <> ".JPG")){echo "Format d'Identité Invalide";?> <br> <?php }
	if (($extensionbor <> ".jpg") and ($extensionbor <> ".JPG")){echo "Format de bordereau Invalide";?> <br> <?php }
	if ($size1 >= '524288') {echo "Taille d'Image Invalide";?> <br> <?php }
	if ($size2 >= '1024000') {echo "Taille d'Identité Invalide";?> <br> <?php }
	if ($size3 >= '1024000') {echo "Taille de Bordereau Invalide";?> <br> <?php }
	if ($sport == ''){echo "Please choose a Sport";?> <br> <?php }

	}
?>

</body>
</html>