
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pr-Admin V1</span>
    </a>

    <!-- Sidebar -->
    <?php include('includes/dbcon.php');

    $result=mysqli_query($con, "select * from prespecteur where ID_P='$session_id'")or die('Error In Session');
    $row=mysqli_fetch_array($result);?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['Nom_P'].' '.$row['Prenom_P'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="home.php" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                 Home
                
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Prospection.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospections</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Entreprises.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entreprises</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Prospecteur.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospecteurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="DomaineActivite.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Domaine d'activité</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                 Ajouter
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AddProspection.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouvelle Prospection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="AddEntreprise.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouvelle Entreprise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="AddProspecteur.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouveau Prospecteur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="AddDomainActivite.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouveau Domaine</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Recherche
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="RechercheProspection.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prospection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="RechercheEntreprise.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entreprise</p>
                </a>
              </li>
              
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>