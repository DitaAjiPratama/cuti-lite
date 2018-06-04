<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.html">Aplikasi Cuti</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Daftar Cuti Bersama">
        <a class="nav-link" href="?page=cuti-bersama">
          <i class="fa fa-fw fa-calendar"></i>
          <span class="nav-link-text">Daftar Cuti Bersama</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Status Cuti">
        <a class="nav-link" href="?page=status-cuti">
          <i class="fa fa-fw fa-calendar-check-o"></i>
          <span class="nav-link-text">Status Cuti</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ajukan Cuti">
        <a class="nav-link" href="?page=ajukan-cuti">
          <i class="fa fa-fw fa-calendar-plus-o"></i>
          <span class="nav-link-text">Ajukan Cuti</span>
        </a>
      </li>

      <?php if ($_SESSION["level"]=="admin") { ?>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pending Approval">
        <a class="nav-link" href="?page=pending-approval">
          <i class="fa fa-fw fa-clock-o"></i>
          <span class="nav-link-text">Pending Approval</span>
        </a>
      </li>
      <?php } ?>

    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link">
          <i class="fa fa-fw fa-user"></i> <?php echo $_SESSION["username"]; ?>
        </a>
      </li>
      <li class="nav-item">
        <a href="module/logout.php" class="nav-link">
          <i class="fa fa-fw fa-sign-out"></i>Logout
        </a>
      </li>
    </ul>
  </div>
</nav>
