<?php
require_once "../config.php";
session_start();

if ($_SESSION['login'] == false) {
  header('Location: ../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title><?= $title; ?></title>

  <!-- link.php -->
  <?php include('../layouts/partials/link.php') ?>
</head>

<body class="animsition">
  <div class="page-wrapper">
    <?= include('../layouts/sidebar.php'); ?>

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <form class="form-header" action="" method="POST">
                <input class="au-input au-input--xl" type="text" disabled name="search" placeholder="Coming soon..." />
                <button class="au-btn--submit" type="submit" disabled>
                  <i class="zmdi zmdi-search"></i>
                </button>
              </form>
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">
                    <div class="image">
                      <!-- <img src="assets/images/icon/avatar-01.jpg" alt="John Doe" /> -->
                      <img style="border-radius: 50%;" src="https://ui-avatars.com/api/?length=1&background=random&name=<?= $_SESSION['nama']; ?>" alt="">
                    </div>
                    <div class="content">
                      <a class="js-acc-btn" href="#"><?= $_SESSION['nama']; ?></a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                      <div class="info clearfix">
                        <div class="image">
                          <a href="#">
                            <!-- <img src="./assets/images/icon/avatar-01.jpg" alt="John Doe" /> -->
                            <img style="border-radius: 50%;" src="https://ui-avatars.com/api/?length=1&background=random&name=<?= $_SESSION['nama']; ?>" alt="">
                          </a>
                        </div>
                        <div class="content">
                          <h5 class="name">
                            <a href="#"><?= $_SESSION['nama']; ?></a>
                          </h5>
                          <span class="email"><?= $_SESSION['email']; ?></span>
                        </div>
                      </div>
                      <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                          <?php if ($_SESSION['role'] ==  'siswa') { ?>
                            <a href="<?= BASEURL; ?>siswa/profile.php">
                              <i class="zmdi zmdi-account"></i>Profile</a>
                          <?php } else if ($_SESSION['role'] ==  'guru') { ?>
                            <a href="<?= BASEURL; ?>guru/profile.php">
                              <i class="zmdi zmdi-account"></i>Profile</a>
                          <?php } else if ($_SESSION['role'] ==  'admin') { ?>
                            <a href="<?= BASEURL; ?>admin/profile.php">
                              <i class="zmdi zmdi-account"></i>Profile</a>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="account-dropdown__footer">
                        <a href="<?= BASEURL; ?>logout.php">
                          <i class="zmdi zmdi-power"></i>Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">