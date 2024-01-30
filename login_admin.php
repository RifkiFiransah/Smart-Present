<?php
require_once "config.php";
require_once "./functions/Auth.php";
session_start();

if (isset($_POST['signin'])) {
  if (login_admin($_POST)) {
    $_SESSION['message'] = "Login Berhasil";
    echo "<script>
    // alert('Login Berhasil');
    document.location.href = 'dashboard/dashboard.php';
    </script>";
  } else {
    $_SESSION['message'] = "Login Gagal";
    echo "<script>
    // alert('Login Gagal');
    document.location.href = 'login.php';
    </script>";
  }
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
  <title>Login</title>

  <!-- Fontfaces CSS-->
  <?php include('./layouts/partials/link.php'); ?>

</head>

<body class="animsition" style="overflow-y: hidden;">
  <div class="page-wrapper">
    <div class="page-content--bge5">
      <div class="container">
        <div class="login-wrap">
          <div class="login-content">
            <div class="login-logo">
              <img src="<?= BASEURL; ?>assets/images/icon/logosp.png" alt="CoolAdmin">

              <!-- <h2>
                Smart Present
              </h2> -->
            </div>
            <?php if (isset($_SESSION['message'])) : ?>
              <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                <!-- <span class="badge badge-pill badge-primary">Success</span> -->
                <?= $_SESSION["message"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php
              session_unset($_SESSION['message']);
            endif; ?>
            <div class="login-form">
              <form action="" method="post">
                <div class="form-group">
                  <label>Email Address</label>
                  <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                </div>
                <button class="au-btn au-btn--block au-btn--blue m-t-20 m-b-20" type="submit" name="signin">sign in</button>
              </form>
              <!-- <div class="register-link">
                <p>
                  Don't you have account?
                  <a href="./register.php">Sign Up Here</a>
                </p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Jquery JS-->
  <?php include('./layouts/partials/script.php'); ?>

</body>

</html>
<!-- end document-->