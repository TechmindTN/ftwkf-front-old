
let side=`
<?php 
session_start(); 
	include('connect.php');
////$club = $_SESSION['club'];
$club = $_SESSION['club'];
//$club = $_GET['club'];
 if ($club == null) {
?>	 
<script type="text/javascript">
window.location.href="index.html";;
</script>
<?php	 }
$query01 ="SELECT saison FROM saison where actif = 1";
$result01 = mysql_query($query01,$connexion);
$row01 = mysql_fetch_row($result01);
$saison = $row01[0];

                                                    $query ="SELECT count(*) as total from clubb";
        
                                                    $result = mysql_query($query,$connexion);
                                                    $row = mysql_fetch_assoc($result);

                                                    $query1 ="SELECT count(*) as total1 from athletes1";
        
                                                    $result1 = mysql_query($query1,$connexion);
                                                    $row1 = mysql_fetch_assoc($result1);

                                                    $query2 ="SELECT count(*) as total2 from entraineur1";
        
                                                    $result2 = mysql_query($query2,$connexion);
                                                    $row2 = mysql_fetch_assoc($result2);
                                                    $query3 ="SELECT count(*) as total3 from athletes";
        
                                                    $result3 = mysql_query($query3,$connexion);
                                                    $row3 = mysql_fetch_assoc($result3);

                                                ?>
                                                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion "  id="accordionSidebar" style="position:fixed; z-index:1">
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="corp.php" >
<div class="sidebar-brand-icon rotate-n-15">
<i class="fas fa-user"></i>
</div>
<div class="sidebar-brand-text mx-3"><?php echo $club; ?> &nbsp;<?php echo $saison;?><sup>2</sup></div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
<a class="nav-link" href="corp.php">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
</div>
<li class="nav-item">
<a class="nav-link" href="affarchive.php">
<i class="fas fa-fw fa-table"></i>
<span>Historique</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="affsaison.php">
<i class="fas fa-fw fa-table"></i>
<span>Saison</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="affparam.php">
<i class="fas fa-fw fa-table"></i>
<span>Poids</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="affage.php">
<i class="fas fa-fw fa-table"></i>
<span>Age</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="listeph.php">
<i class="fas fa-fw fa-table"></i>
<span>Photo</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="listephs.php">
<i class="fas fa-fw fa-table"></i>
<span>Photo Staff</span></a>
</li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-user"></i>
<span>athletes</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="affathlete.php">Déja affiliés</a>  
 <a class="collapse-item" href="buttons.html">Demandes</a>
<a class="collapse-item" href="cards.html">Refusées</a>
</div>
</div>
</li>


<li class="nav-item">
<a class="nav-link collapsed" href="# " data-toggle="collapse" data-target="#collapseUtilities"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-wrench"></i>
<span>Clubs</span>
</a>
<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="affclub.php">Club</a>
<a class="collapse-item" href="affclubs.php">Club Saison</a>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess"
aria-expanded="true" aria-controls="collapseUtilitiess">
<i class="fas fa-fw fa-wrench"></i>
<span>Arbitres</span>
</a>
<div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilitiess" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="utilities-color.html">Déja affiliés</a>
<a class="collapse-item" href="utilities-border.html">Demandes</a>
<a class="collapse-item" href="utilities-animation.html">Refusées</a>
</div>
</div>
</li>
<hr class="sidebar-divider">

<div class="sidebar-heading">
Arbitres
</div>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
aria-expanded="true" aria-controls="collapsePages">
<i class="fas fa-fw fa-folder"></i>
<span>Entraineurs</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Login Screens:</h6>
<a class="collapse-item" href="login.html">Login</a>
<a class="collapse-item" href="register.html">Register</a>
<a class="collapse-item" href="forgot-password.html">Forgot Password</a>
<div class="collapse-divider"></div>
<h6 class="collapse-header">Other Pages:</h6>
<a class="collapse-item" href="404.html">404 Page</a>
<a class="collapse-item" href="blank.html">Blank Page</a>
</div>
</div>
</li>

<li class="nav-item">
<a class="nav-link" href="tables.html">
<i class="fas fa-fw fa-table"></i>
<span>Licences</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="charts.html">
<i class="fas fa-fw fa-chart-area"></i>
<span>Statistiques</span></a>
</li>



<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
</div>



</ul>




<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div>
        <div class="col-xs-1 col-lg-3 col-md-4 col-sm-3 col-xl-2 ">
 </div>`;


 document.getElementById('side').innerHTML=side;