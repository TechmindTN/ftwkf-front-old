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
</style><BODY>

<?php
	   	include('connect.php');

$query ="SELECT saison from athletes group by saison order by saison";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

$queryc ="SELECT club from athletes group by club order by club";
$resultc = mysql_query($queryc,$connexion);
$rowc = mysql_fetch_assoc($resultc);
$queryl ="SELECT ligue from athletes group by ligue order by ligue";
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);

$saison = "";
if (isset($_POST['saison'])) {
  $saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);
}
$crit = "";
if (isset($_POST['crit'])) {
  $crit = (get_magic_quotes_gpc()) ? $_POST['crit'] : addslashes($_POST['crit']);
}

?>
    <form name="stat" method="post" action="">
<table width="100%" border="0" align="center"  class="text">
      <tr>
        <td align="center"><select name="crit" size="1" id="Discipline" tabindex="9">
          <option><?php echo $crit;?></option>
          <option></option>
          <option>جهات</option>
          <option>نوادي</option>
        </select></td>
         <td align="center">Critère</td>
        <td align="center"><select name="saison" size="1" id="saison" tabindex="9">
          <option><?php echo $saison;?></option>
          <?php
					   do { 
                                     $res=$row['saison'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
?>
        </select></td>
        <td align="center">Saison</td>
      </tr>
      <tr>
        <td colspan="8" align="center"><input name="ok" type="submit" class="Style4" value = "Rechercher"></td>
      </tr>

</table>
    </form>
<?php 
$query0 ="delete from entraineurt";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into entraineurt select * from entraineur where saison = '$saison'";


if ($crit == "جهات"){$critere = "ligue";}
if ($crit == "نوادي"){$critere = "club";}







?>
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>
<p style="page-break-before:always">
<table width="100%" border="0">
  <tr>
    <td align="right" valign="middle" width="40%">الجامعة التونسية للوشو كونغ فو</td>
    <td align="center" width="20%"><img src="image/fond.png" alt="" width="60" height="60"></td>
    <td align="left" valign="middle" width="40%">FEDERATION TUNISIENNE DE WUSHU KUNG FU</td>
  </tr>
</table>
  
  
  
<div align="center" class="style2">الإحصائيات</div><br>
<div align="center"><?php echo $saison;?></div></p>
<table border="1" width="100%" id="table1">
	<tr>
	    <td ><div align="center"><strong>الموسم</strong></div></td>
	    <td ><div align="center"><strong>/النادي</strong></div></td>
	    <td ><div align="center"><strong>ممرنين</strong></div></td>
	    <td ><div align="center"><strong>منشطين</strong></div></td>
	    <td ><div align="center"><strong>حكام</strong></div></td>
	    <td ><div align="center"><strong>مسيرين</strong></div></td>
	    <td ><div align="center"><strong>مرافقين</strong></div></td>
	    <td ><div align="center"><strong>المجموع العام</strong></div></td>
	</tr>
<?php 

if ($crit == "جهات"){$query0 ="select ligue from entraineur where saison = '$saison' group by ligue order by ligue";}
if ($crit == "نوادي"){$query0 ="select club from entraineur where saison = '$saison' group by club order by club";}


$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {

if ($crit == "جهات"){$test = $row0['ligue'];}
if ($crit == "نوادي"){$test = $row0['club'];}



?>
	<tr>
	  <td><div align="center"><?php echo $saison;?></div></td>
	  <td><div align="center"><?php echo $test;?></div></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'ممرن'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'ممرن'";}


$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'منشط'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'منشط'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>


                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'حكم'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'حكم'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'مسير'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'مسير'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test' and type = 'مرافق'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test' and type = 'مرافق'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>
                      <?php
if ($crit == "جهات"){$query ="SELECT * FROM entraineur where saison = '$saison' and ligue = '$test'";}
if ($crit == "نوادي"){$query ="SELECT * FROM entraineur where saison = '$saison' and club = '$test'";}
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>








  </tr>
<?php					}while	 ($row0=mysql_fetch_assoc($result0)); 
?>
	<tr>
	  <td colspan="2"><div align="center"><strong>المجموع العام</strong></div></div></td>




                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'ممرن'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'منشط'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>


                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'حكم'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'مسير'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>



                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison' and type = 'مرافق'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>
                      <?php
$query ="SELECT * FROM entraineur where saison = '$saison'";
$result = mysql_query($query,$connexion);
$nb = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $nb;?></strong></td>








  </tr>



</table>
<?php 
?>
<p style="page-break-before:always">
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>
<p align="center">&nbsp;</p>

</body>

</html>