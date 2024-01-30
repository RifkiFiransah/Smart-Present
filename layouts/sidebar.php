<?php
// require_once './config.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segment = explode('/', $path);
?>

<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
  <div class="header-mobile__bar">
    <div class="container-fluid">
      <div class="header-mobile-inner">
        <a class="logo" href="index.html">
          <!-- <img src="images/icon/logo.png" alt="CoolAdmin" /> -->
        </a>
        <button class="hamburger hamburger--slider" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </div>
  <nav class="navbar-mobile">
    <div class="container-fluid">
      <ul class="navbar-mobile__list list-unstyled">
        <li class="has-sub">
          <a class="js-arrow" href="#">
            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li>
          <a href="chart.html">
            <i class="fas fa-chart-bar"></i>Motor</a>
        </li>
        <li>
          <a href="table.html">
            <i class="fas fa-table"></i>Invoice</a>
        </li>
        <li>
          <a href="form.html">
            <i class="far fa-check-square"></i>Setting</a>
        </li>
        <li>
          <a href="calendar.html">
            <i class="fas fa-calendar-alt"></i>Calendar</a>
        </li>
        <li>
          <a href="map.html">
            <i class="fas fa-map-marker-alt"></i>Maps</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo py-3" style=" background-color: white;">
    <img src="<?= BASEURL; ?>assets/images/icon/logo-v1.png" alt="Cool Admin" width="140" />
    <!-- <h2 class="text-dark fs-bold">
      Smart Present
    </h2> -->
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
      <ul class="list-unstyled navbar__list">
        <li class="has-sub <?= $segment[2] == 'dashboard' ? 'active' : ''; ?>">
          <a class="js-arrow" href="<?= BASEURL; ?>dashboard/dashboard.php">
            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <?php if ($_SESSION['role'] == 'siswa') : ?>
          <li class="has-sub <?= $segment[2] == 'siswa' ? 'active' : ''; ?>">
            <a class="js-arrow" href="<?= BASEURL; ?>siswa/rekap_absen.php">
              <i class="fas fa-edit"></i>Rekap Absen</a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['role'] == 'guru') : ?>
          <li class="has-sub <?= $segment[2] == 'guru' ? 'active' : ''; ?>">
            <a class="js-arrow" href="<?= BASEURL; ?>guru/rekap_absen.php">
              <i class="fas fa-edit"></i>Rekap Absen</a>
          </li>
        <?php endif; ?>
        <?php
        if ($_SESSION['role'] == 'admin') :
        ?>
          <li class="has-sub <?= $segment[2] == 'siswa' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>siswa/index.php">
              <i class="fas fa-users"></i>Siswa</a>
          </li>
          <li class="has-sub <?= $segment[2] == 'guru' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>guru/index.php">
              <i class="fas fa-user"></i>Guru</a>
          </li>
          <li class="has-sub <?= $segment[2] == 'kelas' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>kelas/index.php">
              <i class="far fa-building"></i>Kelas</a>
          </li>
          <li class="has-sub <?= $segment[2] == 'pelajaran' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>pelajaran/index.php">
              <i class="fa fa-book"></i>Pelajaran</a>
          </li>
          <li class="has-sub <?= $segment[2] == 'jadwal' ? 'active' : ''; ?>">
            <a href="<?= BASEURL; ?>jadwal/index.php">
              <i class="fas fa-table"></i>Jadwal</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</aside>
<!-- END MENU SIDEBAR-->