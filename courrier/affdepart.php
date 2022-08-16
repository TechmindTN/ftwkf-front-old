<?php
session_start();
$login = $_SESSION['login'];
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
.test {
	color: #F00;
	font-weight: bold;
	font-size: 12px;
}
-->
</style><BODY>
<div align="center" class="style2">الصادرات</div>
<?php
if  ($login == "ADMINSG"){ 
?>
<p align="center"><a href="depart.php">إضافة</a></p>
<?php
}
	function diff_date($day , $month , $year , $day2 , $month2 , $year2){
  $timestamp = mktime(0, 0, 0, $month, $day, $year);
  $timestamp2 = mktime(0, 0, 0, $month2, $day2, $year2);
  $diff_date = floor(($timestamp - $timestamp2) / (3600 * 24));
  return $diff_date; 
}
   	include('connect.php');



$du = " ";
$au = " ";
$article = "_";
$fournisseur = "_";
if (isset($_POST['du'])) {$du = (get_magic_quotes_gpc()) ? $_POST['du'] : addslashes($_POST['du']);}else{$du ="";}
if (isset($_POST['au'])) {$au = (get_magic_quotes_gpc()) ? $_POST['au'] : addslashes($_POST['au']);}else{$au ="";}
if (isset($_POST['dest'])) {$dest = (get_magic_quotes_gpc()) ? $_POST['dest'] : addslashes($_POST['dest']);}else{$dest ="";}
if (isset($_POST['obj'])) {$obj = (get_magic_quotes_gpc()) ? $_POST['obj'] : addslashes($_POST['obj']);}else{$obj ="";}

$i=1;
do {
if (isset($_POST['codd'.$i])) {  $codd = (get_magic_quotes_gpc()) ? $_POST['codd'.$i] : addslashes($_POST['codd'.$i]);}
else {$codd ="_";}
$champ1 = $_POST['champ'];

			if (($codd <> "_")){
				$champ = "";
       			foreach($champ1 as $selectValue){ $champ = $selectValue ."/". $champ;}
				$ln = strlen($champ);
				$champ =  substr("$champ", 0, $ln-1);
				$query_resultat1 = "UPDATE depart SET direction = '$champ' where code = '$codd'";
				$resultat1 = mysql_query($query_resultat1, $connexion) or die(mysql_error());
				}
$i = $i+1;
}while ($i<1000);
$querydep = "SELECT nom FROM utilisateurc group by nom order by nom";
$resultdep = mysql_query($querydep,$connexion);
$rowdep = mysql_fetch_assoc($resultdep);


$query0 = "SELECT destinateur FROM depart group by destinateur order by destinateur";
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);
?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="7" class="text">
        <tr>
          <td><form name="stat" method="post" action="">
              <table border="0" width="100%"  cellspacing="1" cellpadding="4" class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
    <tr>
	    <td ><div align="center"><strong>من</strong></div></td>
    	<td ><input name="du" type="date" id="du" size="10" value="<?php echo $du;?>"></td>
		<td ><div align="center"><strong>إلى</strong></div></td>
    	<td ><input name="au" type="date" id="au" size="10" value="<?php echo $au;?>"></td>
	    <td ><div align="center"><strong>المرسل إليه</strong></div></td>
    	<td ><select name="dest" size="1" id="article" tabindex="9">
        <option><?php echo $dest;?> </option>
        <option> </option>
            <?php do { 
                                     $res=$row0['destinateur'];
                                      echo "<option >$res</option>";
                       } while ($row0 = mysql_fetch_assoc($result0));
?> </select></td>
	    <td ><div align="center"><strong>الموضوع</strong></div></td>
    	<td ><input name="obj" type="text" id="au" size="50" value="<?php echo $obj;?>"></td>



                </tr>
                <tr>
                  <td colspan="8" ><div align="center">
<input name="ok" type="submit" class="Style4" value="مشاهدة"></div>
                  </td>
                </tr>
              </table>
          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>



<?php
$query1 = "delete from departt";
$resultat1 = mysql_query($query1, $connexion) or die(mysql_error());

if ($du == ""){
 if (($login == "Technique")or($login == "Finance")){
   $query1 = "insert into departt select * from depart where destinateur like '%$dest' and objet like '%$obj' and direction like '%$login%'";}else{
   $query1 = "insert into departt select * from depart where destinateur like '%$dest' and objet like '%$obj'";}}
else{
 if (($login == "Technique")or($login == "Finance")){
   $query1 = "insert into departt select * from depart where destinateur like '%$dest' and objet like '%$obj' and date >= '$du' and date <= '$au' and direction like '%$login%'";}else{
   $query1 = "insert into departt select * from depart where destinateur like '%$desr' and objet like '%$obj' and date >= '$du' and date <= '$au'";} }
$resultat1 = mysql_query($query1, $connexion) or die(mysql_error()); 

$query ="SELECT * FROM departt order by date desc, num_depart desc";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);
?>
<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>التاريخ</strong></div></td>
	    <td ><div align="center"><strong>العدد </strong></div></td>
	    <td ><div align="center"><strong>المرسل إليه</strong></div></td>
		<td ><div align="center"><strong>الموضوع</strong></div></td>
		<td ><div align="center"><strong>الإدارة</strong></div></td>
		<td ><div align="center"><strong></strong></div></td>
		<td ><div align="center"><strong></strong></div></td>
	</tr>
<?php


$i=0;
do {
$i=$i+1;
?>
	<tr>
	  <td><div align="center" ><?php echo $row['date'];?></div></td>
	  <td><div align="center" ><?php echo $row['num_depart'];?></div></td>
	  <td><div align="center" ><?php echo $row['destinateur'];?></div></td>
	  <td><div align="center" ><?php echo $row['objet'];?></div></td>
	  <td><div align="center" ><?php echo $row['direction'];?></div></td>
	  <td>
<?php
if  ($login == "ADMINSG"){ 
?>
      <form name="refr" method="post" action="affdepart.php" >
  	  <input name="<?php echo "codd".$i; ?>" type="hidden" id="<?php echo "codd".$i; ?>" value = "<?php echo $row['code']; ?>">
      <select name="champ[]" size="4" multiple id="champ" tabindex="15" >
            <?php do { 
                                     $res=$rowdep['nom'];
                                      echo "<option >$res</option>";
                       } while ($rowdep = mysql_fetch_assoc($resultdep));
?>       </select>
      <input name="ok" type="submit" class="Style4" value=">>">
      </form>
<?php
}?>
      </td>

     <td width="23"><a href ='./depart/<?php echo $row['annee'].$row['num_depart'].".pdf";?> ' target="new" ><img src="image/pdf.jpg" width="32" height="42"></a></td>
  </tr>
<?php
  
  
					}while	 ($row=mysql_fetch_assoc($result)); 


?>


</table>
<p>&nbsp;</p>

<?php
?>
<?php
if  ($login == "ADMINSG"){ 
?>
<p align="center"><a href="depart.php">إضافة</a></p>
<?php
}
?>
<?php
//}else{
?>
<?php
//} 
?>

</body>

</html>