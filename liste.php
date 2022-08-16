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
<html lang="ar" dir="rtl">
<HEAD>
  
  <!-- Custom fonts for this template -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
	color: #0000A0;
}
</style>
</HEAD>
<script language="javascript" type="text/javascript">
// You can place JavaScript like this
</script>
<body>
<div id="wrapper">
<div id='side'></div>

<div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>
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

$query2 ="SELECT saison from athletes Group By saison order by saison";
$result2 = mysql_query($query2,$connexion);
$row2 = mysql_fetch_assoc($result2);


?>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="7" class="text">

        <tr>
          <td><form name="stat" method="post" action="expliste.php">
              <table border="0" width="44%"  cellspacing="1" cellpadding="4" class="text" style="BORDER-LEFT: #EEEEEE 7px solid; BORDER-RIGHT: #EEEEEE 7px solid; BORDER-TOP: #EEEEEE 7px solid; BORDER-BOTTOM: #EEEEEE 7px solid">
    <tr>
      <td  ><div align="center"><strong>Saison</strong></div></td>
    </tr>
                <tr>
    <td align="center">
                    <select name="saison" class="head">
                      <option>-</option>
                      <?php
					   do { 
                                     $res=$row2['saison'];
                                      echo "<option >$res</option>";
                       } while ($row2 = mysql_fetch_assoc($result2));
?>    
    </td>
                <tr>
                  <td colspan="3" valign="center"><div align="center">
<input name="ok" type="submit" class="Style4" value="Exporter">
                  </td>
                </tr>
              </table>
          </form></td>
        </tr>
</table>
      </td>
  </tr>
</table>
                      </div>
                      </div>
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="template.js"></script>
  </body>
</html>