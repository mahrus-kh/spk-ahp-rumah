<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="assets/image/admin-logo.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['nama'];?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="data-rumah.php"><i class="fa fa-home"></i> <span>Data Rumah</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-fire"></i> <span>SPK AHP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="prioritas-kriteria.php"><i class="fa fa-circle-o"></i> <span>Matriks Prioritas Kriteria</span></a></li>
          <li><a href="proses-ahp-hasil.php"><i class="fa fa-circle-o"></i> <span>Proses AHP & Hasil</span></a></li>
        </ul>
      </li>
      <li><a href="zona-alamat.php"><i class="fa fa-map-marker"></i> <span>Zona Alamat</span></a></li>
      <li><a href="admin.php"><i class="fa fa-users"></i> <span>Admin</span></a></li>
      <li><a href="logout.php"><i class="fa fa-close"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
