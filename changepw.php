<?php
session_start();
$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];

if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="index.html";
</script>

<?php	 }
?>
<html>
<!-- Date de cr�ation: 26/05/02 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title></title>
<meta name="Author" content="Usager non enregistr�">
<meta name="Generator" content="WebExpert 2000">
<base target="_self">
</head>
<body>
<p>
  <script language="JavaScript1.2" >
function Verification(theForm)
{
	if((document.forms[0].club.value == null) || (document.forms[0].club.value == ''))
	{
		alert("Veuillez remplir votre club S.V.P.");
		document.forms[0].club.focus();
		return false;
	}
	else
	{
		if((document.forms[0].Password.value == null) || (document.forms[0].Password.value == ''))
		{
			alert("Veuillez remplir votre Password S.V.P.");
			document.forms[0].Password.focus();
			return false;
		}
	}
	return true;
}

</script>

  

</p>
<form  name="form1" method="post" action= "changepw.php" onSubmit= "writecookie()"  >

<p align="center">
<p align="center"><b>Change PW</b>
<table align="center">
	<tr>
		<td><p align="left" dir="ltr"><b>New PW</b><br>
		<td><input type="password" name="pw"></td>
		<td><p align="left" dir="ltr">(4 Characters Minimum)</p></td>
	</tr>

 <p>&nbsp;</p>
 <tr><input type="hidden" name="club" value="<?php echo $club;?>">
	<td colspan="3">
	  <div align="center">
	    <input type="Submit" name="Submit" value="Valider"  > 
      </div></td>
  </tr>
</table>
</form>
<?php
	include('connect.php');
//$federation = $_SESSION['federation'];
//$pers = $_SESSION['pers'];
//$tache = $_SESSION['tache'];
//$sexe = $_SESSION['sexe'];
//$age = $_SESSION['age'];
//$code = $_SESSION['code'];
//$club = $_SESSION['club'];
//$club = $_SESSION['club'];
//$club = $_GET['club'];
$pw = "1";
if (isset($_POST['pw'])) {
  $pw = (get_magic_quotes_gpc()) ? $_POST['pw'] : addslashes($_POST['pw']);
}
$test = substr("$pw", 3, 1);

if (($pw != "1") and ($test != "")) {

//if ($code == null){
$query =sprintf("UPDATE `club` SET `pw` = '%s' where club = '$club'", $pw);//}
//else {
//$query =sprintf("UPDATE `staff` SET `pw` = '%s' where `code` ='$code'", $pw);}


$result = mysql_query($query,$connexion)or die(mysql_error());
?> 
<script type="text/javascript">
window.location.href="corp.php";
</script>

<?PHP
}else{if ($pw != "1"){
echo "Mot de Passe Incorrect";}}
?> 

</body>