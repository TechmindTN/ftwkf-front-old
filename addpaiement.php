<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
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
$adecharge ='';
if (isset($_POST['adecharge'])) {
  $adecharge = (get_magic_quotes_gpc()) ? $_POST['adecharge'] : addslashes($_POST['adecharge']);
}

$query ="select max(id) from `paiement`";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_row($result);
$code = $row[0]+1;

$query1 ="SELECT club from athletes group by club order by club";
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$query2 ="SELECT saison from saison order by saison";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);

//$club = $_POST['club'];
$date = $_POST['date'];
$montant = $_POST['montant'];
$saison = $_POST['saison'];

$decharge ='';

$extension = strrchr($_FILES['decharge']['name'], ".") ;

if ((($extension == '.jpg')or($extension == ".JPG"))) {
$extension = '.jpg';
$decharge = $code.'.jpg';
$uploaddir ='./decharge/';
move_uploaded_file($_FILES['photo']['tmp_name'], $uploaddir.$photo);
}
else {
if (isset($_POST['aphoto'])) {
$photo = $aphoto;
$extension = '.jpg';
$size1=1;
}}


if (($club <> '')and($date <> '')and($montant <> '')and($saison <> '')and($extension == '.jpg'))
{
$query ="INSERT INTO `paiement` ( `code` ,`club` ,`saison`,`montant` , `date`, `etat`) VALUES ('$club','$saison','$montant','$date',0 )";
$result = mysql_query($query,$connexion);
?>
<script type="text/javascript">
window.location.href="affpaiement.php";
</script>
<?php 
}
else 
{
?>
 <div align="center" class="style2">Add des Paiement </div>
<form action="addpaiement.php" method="post" enctype="multipart/form-data" name="MForm">
<table width="100%" border="0">
    <tr>
      <td width="11%" align="left">Club</td>
      <td width="14%" align="left"><select name="club" size="1" id="club" tabindex="9">
        <option><?php echo $club ; ?> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>
      <td width="9%" align="left">Saison</td>
      <td width="20%" align="left"><select name="saison" size="1" id="saison" tabindex="12">
        <option><?php echo $saison ; ?> </option>
                       <?php
					   do { 
                                     $res=$row2['saison'];
                                      echo "<option >$res</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>
      </select></td>
      <td width="13%" align="center">Montant</td>
      <td width="13%" align="center"><input name="montant" type="text" id="montant" tabindex="10" size="25" value="<?php echo $montant ; ?>"></td>
      <td width="13%" align="center">Date</td>
      <td width="13%" align="center"><input name="date" type="text" id="date" tabindex="10" size="25" value="<?php echo $date ; ?>"></td>
        <td width="13%" align="center">Decharge</td>
      <td width="13%" align="center"><input name="decharge" type="file" id="photoid" size="1" tabindex="15"></td>
      <input name="aphoto" type="hidden" id="aphoto" size="1" value ="<?php echo $decharge;?>">
  </tr>
    </table>

  <p align="center">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
<div align="center" class="style2">SVP remplir tous les Champs </div>
	
	<?php }
?>

</body>
</html>