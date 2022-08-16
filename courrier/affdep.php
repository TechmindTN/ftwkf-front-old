<?php
session_start();
include('connect.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Un document bilingue</TITLE>
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
</style>
<BODY>
<div align="center" class="style2">المتداخلين</div>
<p align="center"><a href="dep.php">إضافة</a></p>
<?php


?>
<table border="1" width="100%" id="table1">
	<tr>
		<td><div align="center"><strong>الإدارة</strong></div></td>
		<td><div align="center"><strong>إسم الدخول</strong></div></td>
		<td><div align="center"><strong>كلمة الدخول</strong></div></td>
		<td><div align="center"><strong></strong></div></td>
		<td><div align="center"><strong></strong></div></td>
	</tr>
<?php
$query ="SELECT * FROM utilisateurc" ;
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
do {?>
	<tr>
	  <td><div align="center"><?php echo $row['nom'];?></div></td>
	  <td><div align="center"><?php echo $row['login'];?></div></td>
	  <td><div align="center"><?php echo $row['pass_word'];?></div></td>
      <td><div align="center"><a href ='deldep.php?code<?php echo "=$row[id]";?>'><b>فسخ</b></a> </td>
      <td><div align="center"><a href ='upddep.php?code<?php echo "=$row[id]";?>'><b>تعديل</b></a></td>
   </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
<p align="center"><a href="dep.php">إضافة</a></p>
<?php
//}else{ 
?>
<?php
} 
?>

</body>

</html>
