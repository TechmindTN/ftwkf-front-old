
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
<a class="nav-link" href="affprogramme.php">
<i class="fas fa-fw fa-table"></i>
<span>Competitions</span></a>
</li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-user"></i>
<span>Photos</span>
</a>
<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="listeph.php">Photos</a>  
 <a class="collapse-item" href="listephs.php">Photos Staff</a>
</div>
</div>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-user"></i>
<span>Paiement</span>
</a>
<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="affpaiement.php">Paiement</a>  
 <a class="collapse-item" href="affpaiementt.php">Paiement a valider    </a>
</div>
</div>
</li>
<hr class="sidebar-divider">

<div class="sidebar-heading">
Licences
</div>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-fw fa-user"></i>
<span>athletes</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="affathlete.php">Déja affiliés</a>  
 <a class="collapse-item" href="affathletes.php">Demandes</a>
<a class="collapse-item" href="affathletedel.php">Refusées</a>
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
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
aria-expanded="true" aria-controls="collapsePages">
<i class="fas fa-fw fa-folder"></i>
<span>Entraineurs</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="affentraineur.php">Entraineurs</a>
<a class="collapse-item" href="affentraineurs.php">Entraineurs a valider</a>

<div class="collapse-divider"></div>
</div>
</div>
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