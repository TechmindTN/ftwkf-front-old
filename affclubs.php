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
<div align="center" class="style2">CLUB PAR SAISON</div>
<p align="center"><a href="clubs.php">Ajout</a></p>
<?php
include('connect.php');


 $club1 = "";
 $ligue = "";
 $saison = "";
if (isset($_POST['club'])) {$club1 = (get_magic_quotes_gpc()) ? $_POST['club'] : addslashes($_POST['club']);}

if (isset($_POST['ligue'])) {$ligue = (get_magic_quotes_gpc()) ? $_POST['ligue'] : addslashes($_POST['ligue']);}

if (isset($_POST['saison'])) {$saison = (get_magic_quotes_gpc()) ? $_POST['saison'] : addslashes($_POST['saison']);}



if (($club=="admin")or($club=="ADMIN")or($club=="Admin")) {
$query1 ="SELECT club from clubb group by club order by club";	 
$result1 = mysql_query($query1,$connexion);
$row1 = mysql_fetch_assoc($result1);

$queryl ="SELECT ligue from clubb group by ligue order by ligue";	 
$resultl = mysql_query($queryl,$connexion);
$rowl = mysql_fetch_assoc($resultl);
$querys ="SELECT saison from clubb group by saison order by saison";	 
$results = mysql_query($querys,$connexion);
$rows = mysql_fetch_assoc($results);

}


?>

 <table width="100%" border="0" align="center"  class="text">

        <tr>
          <td><form name="stat" method="post" action="">

              <table border="0" width="100%"  class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
                <tr>

                   <td align="right" width="25%"> Saison </td>

   <td align="left" width="25%"><select name="saison" size="1" id="club" tabindex="9" >
        <option><?php echo $saison;?> </option>
        <option> </option>
                      <?php
					   do { 
                                     $res=$rows['saison'];
                                      echo "<option >$res</option>";
                       } while ($rows = mysql_fetch_assoc($results));
?>
      </select></td>

                   <td align="right" width="25%"> Ligue </td>

   <td align="left" width="25%"><select name="ligue" size="1" id="club" tabindex="9" >
        <option><?php echo $ligue;?> </option>
        <option> </option>
                      <?php
					   do { 
                                     $res=$rowl['ligue'];
                                      echo "<option >$res</option>";
                       } while ($rowl = mysql_fetch_assoc($resultl));
?>
      </select></td>


                   <td align="right" width="25%"> Club </td>

   <td align="left" width="25%"><select name="club" size="1" id="club" tabindex="9" >
        <option><?php echo $club1;?> </option>
        <option> </option>
                      <?php
					   do { 
                                     $res=$row1['club'];
                                      echo "<option >$res</option>";
                       } while ($row1 = mysql_fetch_assoc($result1));
?>
      </select></td>

                   <td align="left" width="50%">
<input name="ok" type="submit" class="Style4" value = "Rechercher">
                  </td>


                </tr>


              </table>

          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>




<table border="1" width="100%" id="table1">
	<tr>
		<td><div align="center"><strong>Club</strong></div></td>
		<td><div align="center"><strong>Ligue</strong></div></td>
		<td><div align="center"><strong>Saison</strong></div></td>
	</tr>
<?php
if ($saison<>""){$query ="SELECT * FROM clubb where club like '%$club1%' and saison like '%$saison%' and ligue like '%$ligue%' ";}
if ($saison==""){$query ="SELECT * FROM clubb order club";}

$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

do {?>
	<tr>
	  <td><div align="center"><?php echo $row['club'];?></div></td>
	  <td><div align="center"><?php echo $row['ligue'];?></div></td>
	  <td><div align="center"><?php echo $row['saison'];?></div></td>
    
    
   </tr>
<?php					}while	 ($row=mysql_fetch_assoc($result)); 


?> 
</table>
<p>&nbsp;</p>

<?php
if (($club == "ADMIN")or($club == "Admin")or($club == "admin")){ 
?>
<p align="center"><a href="clubs.php">Ajout</a></p>
<?php
//}else{ 
?>
<?php
} 
?>

</body>

</html>
