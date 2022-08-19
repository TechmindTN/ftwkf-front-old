
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="ltr">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>Modifier poids</TITLE>
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

</script>
<link href="Calendar.css" rel="stylesheet" type="text/css" />
<link href="../../styles/default.css" rel="stylesheet" type="text/css" />
<meta name="Keywords" content="Popup Date Picker, Softricks Javascript Calendar" />
<meta name="Description" content="Softricks Javascript Popup date picker calendar. The most versatile and feature-packed popup calendar for taking date inputs on the web." />
<style>
.ml-1 {
  margin-left: 25% !important;
}</style>
</HEAD>

<body>

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
$query ="select * FROM `param` where `id` = '$code'";
$result = mysql_query($query,$connexion);
$row = mysql_fetch_assoc($result);

?>

<div id="wrapper">
<div class="navbar-nav  sidebar sidebar-dark accordion">
            <!-- Sidebar -->
            <div id='side'></div></div>
 
<div class="container ">

        <div class="card o-hidden border-0 shadow-lg my-5 ml-1">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier Poids</h1>
                            </div>
                            <form action="addparam.php" method="post" enctype="multipart/form-data" name="MForm">
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label>Age : </label>
                                      <input name="age" type="text" id="age" tabindex="2" size="25" value ="<?php echo $row['cat'];?>" class="form-control form-control-user">
                                    </div>
                                    <div class="col-sm-4 col-sm-4 mb-3 mb-sm-0">
                                    <label>Type </label>
                                    <select name="type" size="1" id="type2" tabindex="5" class="custom-select">
        <option><?php echo $row['type'];?> </option><option>كطا</option>
        <option>فردي</option>
      </select>
                                    </div>
                                
                               
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Sexe</label>
                                    <select name="sexe" size="1" id="sexe" tabindex="3" class="custom-select">
        <option><?php echo $row['sexe'];?> </option>        <option>ذكر</option>
        <option>أنثى</option>
</select>
                                    </div>
                                  
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Ordre</label>
                                    <input class="form-control form-control-user" name="ord" type="text" id="ord" tabindex="7" size="25" value="<?php echo $row['ordre'];?>">
                                    </div><div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Poids</label>
                                    <input  class="form-control form-control-user" name="poids" type="text" id="poids" tabindex="8" size="25" value="<?php echo $row['poids'];?>">
                                    </div>
                                    </div>

                                          
                                        <input name="cod" type="hidden" id="cod" tabindex="100" size="0" value ="<?php echo $row['id'];?>">
                                    
                               
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

    </div></div></div>

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
