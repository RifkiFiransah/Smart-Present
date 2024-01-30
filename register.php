<?php
require_once "config.php";
require_once "./functions/Auth.php";

if (isset($_POST['signup'])) {
  if (register($_POST) > 0) {
    echo "<script>
    alert('Registrasi Berhasil');
    document.location.href = 'login_admin.php';
    </script>";
  } else {
    echo "<script>
    alert('Registrasi Gagal');
    document.location.href = 'register.php';
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
  <title>Registrasi</title>

  <!-- Fontfaces CSS-->
  <?php include('./layouts/partials/link.php'); ?>

</head>

<body class="animsition">
  <div class="page-wrapper">
    <div class="page-content--bge5">
      <div class="container">
        <div class="login-wrap">
          <div class="login-content">
            <div class="login-logo">
              <h2 class="text-dark">
                <!-- <img src="assets/images/icon/logo.png" alt="CoolAdmin"> -->
                Smart Present
              </h2>
            </div>
            <div class="login-form">
              <form action="" method="post">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input id="nama" class="au-input au-input--full" type="text" name="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" class="au-input au-input--full" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input id="email" class="au-input au-input--full" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" class="au-input au-input--full" type="password" name="password" placeholder="Password">
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="signup">register</button>
              </form>
              <div class="register-link">
                <p>
                  Already have account?
                  <a href="<?= BASEURL; ?>login_admin.php">Sign In</a>
                </p>
              </div>
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