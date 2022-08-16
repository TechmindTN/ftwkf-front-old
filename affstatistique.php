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
$club11 = "";
if (isset($_POST['club11'])) {
  $club11 = (get_magic_quotes_gpc()) ? $_POST['club11'] : addslashes($_POST['club11']);
}
$sport = "";
if (isset($_POST['sport'])) {
  $sport = (get_magic_quotes_gpc()) ? $_POST['sport'] : addslashes($_POST['sport']);
}
$ligue = "";
if (isset($_POST['ligue'])) {
  $ligue = (get_magic_quotes_gpc()) ? $_POST['ligue'] : addslashes($_POST['ligue']);
}

?>
    <form name="stat" method="post" action="">
<table width="100%" border="0" align="center"  class="text">
      <tr>
        <td align="center"><select name="sport" size="1" id="Discipline" tabindex="9">
          <option><?php echo $sport;?></option>
          <option></option>
        <option>وشوكونغ فو</option>
        <option>كمبو</option>
        <option>ديكايتو ريو</option>
        <option>الدفاع عن النفس بودو</option>
        <option>فوفينام فيات فوداو</option>
        <option>فوت وات فان فوداوو و الأنشطة التابعة</option>
        <option>هابكيدو</option>
        <option>الكيسندو</option></select></td>
         <td align="center">Discipline</td>
        <td align="center"><select name="ligue" size="1" id="club" tabindex="9">
          <option><?php echo $ligue;?></option>
          <?php
					   do { 
                                     $res=$rowl['ligue'];
                                      echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
        </select></td>
       <td align="center">Ligue</td>
        <td align="center"><select name="club11" size="1" id="club11" tabindex="9">
          <option></option>
          <option><?php echo $club11;?></option>
          <?php
					   do { 
                                     $res=$rowc['club'];
                                      echo "<option >$res</option>";
                       } while ($rowc = mysql_fetch_assoc($resultc));
?>
        </select></td>
        <td align="center">Club</td>
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
$query0 ="delete from athletest";
$result0 = mysql_query($query0,$connexion);
$query0 ="insert into athletest select * from athletes where saison = '$saison' and club = '$club' and sport = '$sport'";

if ($club == "ADMIN"){

if ($sport <> ""){$query0 ="insert into athletest select * from athletes where saison = '$saison' and club like '%$club11%' and ligue like '%$ligue%' and sport = '$sport'";}
if ($sport == ""){$query0 ="insert into athletest select * from athletes where saison = '$saison' and club like '%$club11%' and ligue like '%$ligue%'";}

}


$result0 = mysql_query($query0,$connexion);
$query0 ="Update athletest set n = 1";
$result0 = mysql_query($query0,$connexion);

$query ="SELECT * FROM age where sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result)+1;
$query ="SELECT * FROM age where sexe = 'أنثى'";
$result = mysql_query($query,$connexion);
$female = mysql_num_rows($result)+1;



$queryagem ="SELECT * FROM age where sexe = 'ذكر' order by min";
$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$queryagef ="SELECT * FROM age where sexe = 'أنثى' order by min";
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);


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
<div align="center" class="style2"><?php echo $sport;?></div><br>
<div align="center"><?php echo $saison;?></div></p>
<table border="1" width="100%" id="table1">
	<tr>
	    <td rowspan="2" ><div align="center"><strong>الموسم</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>النادي</strong></div></td>
	    <td rowspan="2" ><div align="center"><strong>الرابطة</strong></div></td>
	    <td colspan="<?php echo $male;?>" align="center" ><strong>ذكور</strong></td>
	    <td colspan="<?php echo $female;?>" align="center" ><strong>إناث</strong></td>
	    <td rowspan="2" ><div align="center"><strong>المجموع العام</strong></div></td>
	</tr>
	<tr>
                      <?php
					   do { 
                                     $res=$rowagem['cat'];?>
	  <td align="center"><strong><?php echo $res;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));
?>
	  <td align="center"><strong>م ذكور</strong></td>

                      <?php
					   do { 
                                     $res=$rowagef['cat'];?>
	  <td align="center"><strong><?php echo $res;?></strong></td>

                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
?>
	  <td align="center"><strong>م إناث</strong></td>
  </tr>
<?php 

if ($sport == ""){
$query0 ="select club, ligue from athletest where saison = '$saison' group by club, ligue order by ligue, club";}
else {
$query0 ="select club, ligue from athletest where saison = '$saison' group by club, ligue order by ligue, club";}
$result0 = mysql_query($query0,$connexion);
$row0 = mysql_fetch_assoc($result0);


do {
$club0 = $row0['club'];
$ligue0 = $row0['ligue'];

$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);

?>
	<tr>
	  <td><div align="center"><?php echo $saison;?></div></td>
	  <td><div align="center"><?php echo $row0['club'];?></div></td>
	  <td><div align="center"><?php echo $row0['ligue'];?></div></td>



                      <?php
					   do { 
                                     $res=$rowagem['cat'];
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and age = '$res' and club = '$club0' and ligue = '$ligue0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));

$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                      <?php
					   do { 
                                     $res=$rowagef['cat'];
									 
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and age = '$res' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

<?php 
$query ="SELECT * FROM athletest where sport like '%$sport%' and club = '$club0'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>




  </tr>
<?php					}while	 ($row0=mysql_fetch_assoc($result0)); 
?>
<tr>	  <td colspan="3"><div align="center">المجموع</div></td>

                      <?php
$resultagem = mysql_query($queryagem,$connexion);
$rowagem = mysql_fetch_assoc($resultagem);
$resultagef = mysql_query($queryagef,$connexion);
$rowagef = mysql_fetch_assoc($resultagef);
					   do { 
                                     $res=$rowagem['cat'];
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر' and age = '$res'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

                    <?php   } while ($rowagem = mysql_fetch_assoc($resultagem));

$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'ذكر'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                      <?php
					   do { 
                                     $res=$rowagef['cat'];
									 
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى' and age = '$res'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
									 ?>
	  <td align="center"><strong><?php echo $male;?></strong></td>
                    <?php   } while ($rowagef = mysql_fetch_assoc($resultagef));
$query ="SELECT * FROM athletest where sport like '%$sport%' and sexe = 'أنثى'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>


<?php 
$query ="SELECT * FROM athletest where sport like '%$sport%'";
$result = mysql_query($query,$connexion);
$male = mysql_num_rows($result);
?>
	  <td align="center"><strong><?php echo $male;?></strong></td>

  </tr>




</table>
<?php 
?>
<p style="page-break-before:always">
<p align="center"><input type=button value="Imprimer" onClick="window.print()"></p>
<p align="center">&nbsp;</p>

</body>

</html>