
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

<script language="JavaScript" src="Calendar1-903.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
function TryCallFunction() {
	var sd = document.MForm.txt_mydate.value.split("\/");
	document.MForm.txt_mymonth.value = sd[0];
	document.MForm.txt_myday.value = sd[1];
	document.MForm.txt_myyear.value = sd[2];
}

function submitdnld() {
	document.form1.submit();
}
</script>
<script language="JavaScript" type="text/javascript">
<!--


function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>


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

</style>
</HEAD>

<BODY>

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
	include('connect.php');
	
$code=$_GET['code'];
$query ="select * FROM `saison` where `code` = '$code'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

?>

 <form action="addsaison.php" method="post" enctype="multipart/form-data" name="MForm">
  <table width="100%" border="0">
    <tr>
      <td width="114" align="right">Saison</td>
      <td width="153" align="right"><input name="saison" type="text" id="club" tabindex="3" size="25" value ="<?php echo $row['saison'];?>"></td>
      <td width="120" align="right">Date Début</td>
      <td width="202" align="right"><input name="datedebut" type="date" id="ligue" tabindex="2" size="25" value ="<?php echo $row['datedebut'];?>"></td>
      <td width="116" align="right">Date Fin</td>
      <td width="150" align="right"><input name="datefin" type="date" id="pw" tabindex="1" size="25" value ="<?php echo $row['datefin'];?>"></td>
    </tr>
    </table>
  <p align="center">
      <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['code'];?>">
      <input type="submit" name="valider" id="valider" value="Valider">
  </p>
</form>
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier saison</h1>
                            </div>
                            <form action="addsaison.php" method="post" enctype="multipart/form-data" name="MForm">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <label>Saison : </label>
                                        <input type="text" class="form-control form-control-user" id="club"
                                        value ="<?php echo $row['saison'];?>" name="club"> 
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="ligue" 
                                        id="ligue" tabindex="2"  value ="<?php echo $row['ligue'];?>">
                                    </div>
                                </div>
                             
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input  class="form-control form-control-user"
                                        name="pw" type="text" id="pw" tabindex="1" size="25" value ="<?php echo $row['pw'];?>">
                                    </div>
                                    <div class="col-sm-6 ">
                                      <div class="form-group row" >
                                      <label for="inputPassword" class="col-sm-2 col-form-label">Actif</label>
                                         <div class="col-10"><input class="form-control form-control-user"
                                        name="actif" type="text" id="pw" tabindex="1" value ="<?php echo $row['actif'];?>"></div>
                                        </div> 
                                    </div>
                                          
                                        <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['id'];?>">
                                    
                                </div>
                               
                                <div class="container my-3 ">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-danger">Modifier</button>
        </div>
    </div>
                            </form>
               
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>
