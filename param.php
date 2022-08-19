<?php
session_start();
	include('connect.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Ajout Poid</TITLE>
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
<script language="JavaScript" src="verif.js" type="text/javascript"></script> 

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

function verif()
{
var nom = document.forms[0].nom.value;
var prenom= document.forms[0].prenom.value;
var nom_e = document.forms[0].nom-e.value;
var prenom_e = document.forms[0].prenom_e.value;
var sexe = document.forms[0].sexe.value;
var date_naissance = document.forms[0].date_naissance.value;
var res = document.forms[0].res.value;
var nat = document.forms[0].nat.value;
var passport = document.forms[0].passport.value;
var date_livr = document.forms[0].date_livr.value;
var date_exp = document.forms[0].date_exp.value;
var qualite = document.forms[0].qualite.value;
var pay = document.forms[0].pay.value;
var photo = document.forms[0].photo.value;
var ppass = document.forms[0].ppass.value;


if (document.forms[0].nom.value == ''){ alert ('hghg')  ;
return false;}

else
  {
document.forms[0].method = "get";
document.forms[0].action = "addathlete.php";
document.forms[0].submit();
  }


}

//-->
</script>
<link href="Calendar.css" rel="stylesheet" type="text/css" />
<link href="../../styles/default.css" rel="stylesheet" type="text/css" />
<meta name="Keywords" content="Popup Date Picker, Softricks Javascript Calendar" />
<meta name="Description" content="Softricks Javascript Popup date picker calendar. The most versatile and feature-packed popup calendar for taking date inputs on the web." />
<style>
.ml-1 {
  margin-left: 17% !important;
}</style>
</HEAD>

<body id="page-top">
<div id="wrapper">
<div class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
            <div class="container ">
            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 ml-1">
            <div class="row">
                       
            <div class="col-lg-12">
                        <div class="p-5">
<?php

$query ="SELECT cat FROM age group by cat order by cat";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);


?>



  <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajouter un poid</h1>
                            </div>
 <form action="addparam.php" method="post" enctype="multipart/form-data" name="MForm" onSubmit="return verif_formulaire()" class="user">
 <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label>Age</label>
                                        <select name="age" size="1" id="sport" tabindex="6" class="custom-select">
                        <option>Choisir age</option>
                      <?php
					   do { 
                                     $res=$row['cat'];
                                      echo "<option >$res</option>";
                       } while ($row = mysql_fetch_assoc($result));
					  ?>
                  </select>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label>Type</label>
                                        <select name="type" size="1" id="type2" tabindex="5" class="custom-select">
        <option>Sélectionner type</option>
        <option>كطا</option>
        <option>فردي</option>
      </select>
                                    </div> 
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Sexe </label><select name="sexe" size="1" id="sexe" tabindex="3" class="custom-select">
        <option> </option>        <option>ذكر</option>
        <option>أنثى</option>
</select>
                                    </div> 
                                 
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label>Ordre</label>
                                        <input name="ord" type="text" id="ord" tabindex="7" class="form-control ">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label>Poids</label>
                                        <input name="poids" type="text" id="poids" tabindex="8" class="form-control ">
                                    </div> 
                                    <div class="col-sm-4 mb-9 mb-sm-4 text-center">
                                   <br>
                                    <input class="btn btn-danger" type="submit" name="valider" id="valider" value="Valider">
                                    </div> 
                                 
                                </div>

</form> </div></div> </div></div></div></div>
<!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="template.js"></script>
</body>

</html>
